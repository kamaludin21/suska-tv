<?php
// connect to database
$conn = mysqli_connect("localhost", "username", "password", "database");

// function query
function query ($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// *********************** Function Member **********************************
// **************************************************************************

//  1. Daftar
function registrasi ($data) {
	global $conn;

	$namalengkap = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars(strtolower(stripslashes($data["username"])));
	$email = htmlentities($data["email"]);
	$nohp = $data["nohp"];
	$jk = $data["jk"];
	$tgl = $data["tgl"];
	$password = mysqli_real_escape_string($conn, $data["password"]);

	// cek username
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('Username sudah terdaftar');
				</script>";
		return false;
	}

	 // enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($conn, "INSERT INTO user VALUES
		('', '$username', '$password', 'Y', 'kru','$namalengkap','$nohp','$email','$jk','$tgl','default.png')");
	return mysqli_affected_rows($conn);
}
// end daftar
	
// 2. Ubah data oleh admin
function ubah ($data) {
	global $conn;

	$id = $data["id"];
	$namalengkap = $data["nama"];
	$username = $data["username"];
	$divisi = htmlentities($data["divisi"]);
	$password = $data["password"];
	$status = $data["status"];
	$email = $data["email"];
	$nohp = $data["nohp"];
	$jk = $data["jk"];
	$tgl = $data["tgl"];
	$gambar = $data["gambar"];

	$query = "UPDATE user SET

		divisi = '$divisi',
		status = '$status'

		WHERE id = $id ";

		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
}

// end ubah

// 3. Ubah Profil
function ubahprofil ($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlentities($data["nama"]);
	$username = htmlentities($data["username"]);
	$password = $data["password"];
	$divisi = $data["divisi"];
	$status = $data["status"];
	$email = $data["email"];
	$nohp = $data["nohp"];
	$jk = $data["jk"];
	$tgl = $data["tgl"];
	$gambarlama = $data["gambarlama"];

	// cek pilih gambar baru atau tidak
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarlama;
	} else {
		$gambar = upload();
	}

	$query = "UPDATE user SET

		username = '$username',
		nama = '$nama',
		nohp = '$nohp',
		email = '$email',
		jk = '$jk',
		tgl = '$tgl',
		gambar = '$gambar'

	WHERE id = $id ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
	}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek ekstensi gambar
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('Ekstensi gambar harus jpeg/jpg/png');
			</script>";
			return false;
	}

	// cek ukuran gambar
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('Ukuran gambar harus dibawah 1 Mb');
			</script>";
			return false;
	}
	//cek

	//lolos cek
	//generate
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../../images/profil/' . $namaFileBaru);

	return $namaFileBaru;

}

// end ubah profil

// 4. Hapus
function hapus ($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM user WHERE id = $id");

	return mysqli_affected_rows($conn);
}

// end hapus

// 5. Ubah Password
function pass ($data) {
	global $conn;
	
	$id = $data["id"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $pwbaru = mysqli_real_escape_string($conn, $data["pwbaru"]);
    $pwkonf = $data["pwkonf"];

		$result = query ("SELECT * FROM user WHERE id='$id'")[0];
		$passwordlama = $result["password"];
				if (password_verify($password, $result["password"])) {
					// cek konfirm
					if($pwbaru !== $pwkonf ) {
						echo "<script>
								alert('Konfirmasi password tidak cocok');
							 </script>";
						return false;
					}
					$pwkonf = password_hash($pwkonf, PASSWORD_DEFAULT);
					$query = "UPDATE user SET
						password = '$pwkonf'
					WHERE id = $id ";

					mysqli_query($conn, $query);
					return mysqli_affected_rows($conn);
					die();
				}
				echo "<script>
						alert('Password lama anda salah');
					 </script>";
				return false;
}

// *********************** END Function Member ******************************
// **************************************************************************



// *********************** Function Kru - TUGAS *****************************
// **************************************************************************

// 1. Tambah Tugas
// a. Admin
function tugasadmin ($data) {
	global $conn;
	$name = $data["nama"];
	$ket = htmlspecialchars($data["ket"]);
	$tgl = $data["tgl"];

	mysqli_query($conn, "INSERT INTO tugas VALUES('','$name','admin','$tgl','$ket')");

	return mysqli_affected_rows($conn);
}
// end admin

// b. Produksi
function tugaspro ($data) {
	global $conn;
	$name = $data["nama"];
	$ket = htmlentities($data["ket"]);
	$tgl = $data["tgl"];

	mysqli_query($conn, "INSERT INTO tugas VALUES('','$name','produksi','$tgl','$ket')");

	return mysqli_affected_rows($conn);
}
// end produksi

// c. News
function tugasnews ($data) {
	global $conn;
	$name = $data["nama"];
	$ket = htmlentities($data["ket"]);
	$tgl = $data["tgl"];

	mysqli_query($conn, "INSERT INTO tugas VALUES('','$name','news','$tgl','$ket')");

	return mysqli_affected_rows($conn);
}
// end news

// d. Humas
function tugashumas ($data) {
	global $conn;
	$name = $data["nama"];
	$ket = htmlentities($data["ket"]);
	$tgl = $data["tgl"];

	mysqli_query($conn, "INSERT INTO tugas VALUES('','$name','humas','$tgl','$ket')");

	return mysqli_affected_rows($conn);
}
// end humas

// 2. Edit Tugas
function edittugas ($data) {
	global $conn;

	$id = $data["id"];
	$nama = $data["nama"];
	$divisi = $data["divisi"];
	$tgl = $data["tanggal"];
	$ket = htmlentities($data["ket"]);

	$query = "UPDATE tugas SET
		nama = '$nama',
		tanggal = '$tgl',
		ket = '$ket'

			WHERE id = $id ";

			mysqli_query($conn, $query);
			return mysqli_affected_rows($conn);
		}

// end edit tugas


// 3. Hapus Tugas
function hapust ($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM tugas WHERE id = $id");

	return mysqli_affected_rows($conn);
}

// end hapus tugas

// *********************** END Function Kru - TUGAS *************************
// **************************************************************************



// *********************** Function Kru - News ******************************
// **************************************************************************

// 1. Laporan Kegiatan
// a. Tambah
function liputan ($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlentities($data["acara"]);
	$tgl = $data["tanggal"];
	$rep = $data["reporter"];
	$kam = $data["kamper"];

	mysqli_query($conn, "INSERT INTO kegliputan VALUES('','$nama','$tgl','$rep','$kam')");

	return mysqli_affected_rows($conn);
}
// end laporan kegiatan

// b. Edit
function edlip ($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlentities($data["acara"]);
	$tgl = $data["tanggal"];
	$rep = $data["reporter"];
	$kam = $data["kamper"];

	$query = "UPDATE kegliputan SET

		acara = '$nama',
		tanggal = '$tgl',
		reporter = '$rep',
		kamper = '$kam'

			WHERE id = $id ";

			mysqli_query($conn, $query);
			return mysqli_affected_rows($conn);
		}

// end edit laporan kegiatan

// c. Hapus
function hapusl ($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM kegliputan WHERE id = $id");

	return mysqli_affected_rows($conn);
}

// end hapus laporan kegiatan

// *********************** END Function Kru - News **************************
// **************************************************************************



// *********************** Function Kru - Produksi **************************
// **************************************************************************

// 1. Program
// a. Tambah
function tambahprog ($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlentities($data["program"]);
	$kreatif = $data["pj"];
	$ket = htmlentities($data["ket"]);

	mysqli_query($conn, "INSERT INTO program VALUES('','$nama','$kreatif','$ket')");

	return mysqli_affected_rows($conn);
}

// b. Edit
function editprog ($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlentities($data["program"]);
	$pj = $data["pj"];
	$ket = htmlentities($data["ket"]);

	$query = "UPDATE program SET

		program = '$nama',
		pj = '$pj',
		ket = '$ket'

			WHERE id = $id ";

			mysqli_query($conn, $query);
			return mysqli_affected_rows($conn);
}

// end edit

// c. Hapus
function hapusprog ($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM program WHERE id = $id");

	return mysqli_affected_rows($conn);
}
// end hapus

// 2. Info program
// a. Tambah
function tambaheps ($data) {
	global $conn;

	$id = $data["id"];
	$program = $data["program"];
	$eps = $data["eps"];
	$tema = htmlentities($data["tema"]);
	$editor = $data["editor"];
	$kreatif = $data["kreatif"];

	// upload video
	$video = uploadvid();

	if (!$video) {
		return false;
	}

	mysqli_query($conn, "INSERT INTO infoprogram VALUES('','$program','$eps','$tema','$editor','$kreatif','$video')");

	return mysqli_affected_rows($conn);

	}

function uploadvid () {

	$namaFile = $_FILES['video']['name'];
	$ukuranFile = $_FILES['video']['size'];
	$error = $_FILES['video']['error'];
	$tmpName = $_FILES['video']['tmp_name'];

	// cek apakah tidak ada video yang diupload

	if ( $error === 4) {
		echo "<script>
				alert('Harap masukkan file video!');
			</script>";
			return false;
	}

	// cek ekstensi gambar
	$ekstensiVideoValid = ["mp4","mkv"];
	$ekstensiVideo = explode('.', $namaFile);
	$ekstensiVideo = strtolower(end($ekstensiVideo));
	if ( !in_array($ekstensiVideo, $ekstensiVideoValid)) {
		echo "<script>
				alert('Ekstensi File harus mp4/mkv/3gp');
			</script>";
			return false;
	}
	

	// cek ukuran gambar
	if ($ukuranFile > 200000000) {
		echo "<script>
				alert('Ukuran file harus dibawah 200 Mb');
			</script>";
			return false;
	}
	
	//cek

	//lolos cek
	//generate
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiVideo;

	move_uploaded_file($tmpName, "../../video/" . $namaFileBaru); 

	return $namaFileBaru;

}

// b. edit
function editeps ($data) {
	global $conn;

	$id = $data["id"];
	$program = $data["program"];
	$eps = $data["eps"];
	$tema = htmlentities($data["tema"]);
	$editor = $data["editor"];
	$kreatif = $data["kreatif"];
	$videolama = $data["videolama"];

	// cek pilih gambar baru atau tidak
	if ($_FILES['video']['error'] === 4) {
		$video = $videolama;
	} else {
		$video = ubahvid();
	}

	$query = "UPDATE infoprogram SET

		program = '$program',
		eps = '$eps',
		tema = '$tema',
		editor = '$editor',
		kreatif = '$kreatif',
		video = '$video'

	WHERE id = $id ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
	}

	function ubahvid () {

	$namaFile = $_FILES['video']['name'];
	$ukuranFile = $_FILES['video']['size'];
	$error = $_FILES['video']['error'];
	$tmpName = $_FILES['video']['tmp_name'];

	// cek ekstensi gambar
	$ekstensiVideoValid = ["mp4","mkv"];
	$ekstensiVideo = explode('.', $namaFile);
	$ekstensiVideo = strtolower(end($ekstensiVideo));
	if ( !in_array($ekstensiVideo, $ekstensiVideoValid)) {
		echo "<script>
				alert('Ekstensi File harus mp4/mkv/3gp');
			</script>";
			return false;
	}

	// cek ukuran gambar
	if ($ukuranFile > 200000000) {
		echo "<script>
				alert('Ukuran file harus dibawah 200 Mb');
			</script>";
			return false;
	}
	//cek

	//lolos cek
	//generate
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiVideo;

	move_uploaded_file($tmpName, "../../video/" . $namaFileBaru); 

	return $namaFileBaru;

}

// end edit

// c. hapus
function hapusinfo ($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM infoprogram WHERE id = $id");

	return mysqli_affected_rows($conn);
}
// end hapus 

// 2. Jadwal Produksi
// a. tambah
function jadwalproduksi ($data) {
	global $conn;

	$id = $data["id"];
	$program = $data["program"];
	$kreatif = $data["kreatif"];
	$editor = $data["editor"];
	$tglTap = $data["tglTap"];
	$ket = htmlentities($data["ket"]);

	// cek tanggal
	$result = mysqli_query($conn, "SELECT tglTap FROM jadwalproduksi WHERE tglTap = '$tglTap'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('Ups!, Tanggal yang anda pilih sudah terjadwal, Silahkan pilih hari lain!');
				</script>";
		return false;
	}

	// cek username
	// $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	// if (mysqli_fetch_assoc($result)) {
	// 	echo "<script>
	// 			alert('Username sudah terdaftar');
	// 			</script>";
	// 	return false;
	// }

	mysqli_query($conn, "INSERT INTO jadwalproduksi VALUES('','$program', '$kreatif', '$editor', '$tglTap','$ket')");

	return mysqli_affected_rows($conn);
}

// b. Edit
function editjadwal ($data) {
	global $conn;

	$id = $data["id"];
	$program = $data["program"];
	$kreatif = $data["kreatif"];
	$editor = $data["editor"];
	$tglTap = $data["tglTap"];
	$ket = htmlentities($data["ket"]);

	$query = "UPDATE jadwalproduksi SET

		program = '$program',
		kreatif = '$kreatif',
		editor = '$editor',
		tglTap = '$tglTap',
		ket = '$ket'

		WHERE id = $id ";

		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
}


// ***********************  END Function Kru - Produksi *********************
// **************************************************************************



// ***********************  Function Kru - Humas ****************************
// **************************************************************************

// 1. surat
// a. Tambah
function tambahsurat ($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlentities($data["nama"]);
	$nohp = $data["nohp"];
	$kegiatan = htmlentities($data["kegiatan"]);
	$tgl = $data["tgl"];
	$tempat = htmlentities($data["tempat"]);
	$ket = htmlentities($data["ket"]);

	mysqli_query($conn, "INSERT INTO surat VALUES('','$nama','$nohp','$kegiatan','$tgl','$tempat','$ket')");

	return mysqli_affected_rows($conn);
}

// b. Edit
function editsurat ($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlentities($data["nama"]);
	$nohp = $data["nohp"];
	$kegiatan = htmlentities($data["kegiatan"]);
	$tgl = $data["tgl"];
	$tempat = htmlentities($data["tempat"]);
	$ket = htmlentities($data["ket"]);

	$query = "UPDATE surat SET

		nama = '$nama',
		nohp = '$nohp',
		kegiatan = '$kegiatan',
		tgl = '$tgl',
		tempat = '$tempat',
		ket = '$ket'

			WHERE id = $id ";

			mysqli_query($conn, $query);
			return mysqli_affected_rows($conn);
}

// end edit

// c. Hapus
function hapussurat ($id) {
	global $conn;

	mysqli_query($conn, "DELETE FROM surat WHERE id = $id");

	return mysqli_affected_rows($conn);
}
// end hapus

// 2. Publikasi
// a. tambah
function tambahpub ($data) {
	global $conn;

	$id = $data["id"];
	$agenda = htmlentities($data["agenda"]);
	$isu = htmlentities($data["isu"]);
	$tgl = $data["tgl"];
	$tempat = htmlentities($data["tempat"]);
	
	// upload video
	$doc = uploaddoc();

	if (!$doc) {
		return false;
	}

	mysqli_query($conn, "INSERT INTO publikasi VALUES('','$agenda','$isu','$tgl','$tempat','$doc')");

	return mysqli_affected_rows($conn);

	}

function uploaddoc () {

	$namaFile = $_FILES['doc']['name'];
	$ukuranFile = $_FILES['doc']['size'];
	$error = $_FILES['doc']['error'];
	$tmpName = $_FILES['doc']['tmp_name'];

	if ( $error === 4) {
		echo "<script>
				alert('Harap masukkan file dokumen');
			</script>";
			return false;
	}

	// cek ekstensi gambar
	$ekstensidocValid = ["docx","pdf","word","ppt","txt"];
	$ekstensidoc = explode('.', $namaFile);
	$ekstensidoc = strtolower(end($ekstensidoc));
	if ( !in_array($ekstensidoc, $ekstensidocValid)) {
		echo "<script>
				alert('Ekstensi File harus word, pdf, atau docx');
			</script>";
			return false;
	}

	// cek ukuran gambar
	if ($ukuranFile > 2000000) {
		echo "<script>
				alert('Ukuran file harus dibawah 2 Mb');
			</script>";
			return false;
	}
	//cek

	//lolos cek
	//generate
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensidoc;

	move_uploaded_file($tmpName, "../../doc/" . $namaFileBaru); 

	return $namaFileBaru;

}

// b. edit
function editpub ($data) {
	global $conn;

	$id = $data["id"];
	$agenda = htmlentities($data["agenda"]);
	$isu = htmlentities($data["isu"]);
	$tgl = $data["tgl"];
	$tempat = htmlentities($data["tempat"]);
	$doclama = $data["doclama"];
	
	// cek pilih gambar baru atau tidak
	if ($_FILES['doc']['error'] === 4) {
		$doc = $doclama;
	} else {
		$doc = editdoc();
	}

	$query = "UPDATE publikasi SET

		agenda = '$agenda',
		isu = '$isu',
		tgl = '$tgl',
		tempat = '$tempat',
		file = '$doc'

	WHERE id = $id ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

	}


function editdoc () {

	$namaFile = $_FILES['doc']['name'];
	$ukuranFile = $_FILES['doc']['size'];
	$error = $_FILES['doc']['error'];
	$tmpName = $_FILES['doc']['tmp_name'];

	// cek ekstensi gambar
	$ekstensidocValid = ["docx","pdf","word","ppt"];
	$ekstensidoc = explode('.', $namaFile);
	$ekstensidoc = strtolower(end($ekstensidoc));
	if ( !in_array($ekstensidoc, $ekstensidocValid)) {
		echo "<script>
				alert('Ekstensi File harus word,pdf,docx,ppt');
			</script>";
			return false;
	}

	// cek ukuran gambar
	if ($ukuranFile > 2000000) {
		echo "<script>
				alert('Ukuran file harus dibawah 2 Mb');
			</script>";
			return false;
	}
	//cek

	//lolos cek
	//generate
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensidoc;

	move_uploaded_file($tmpName, "../../doc/" . $namaFileBaru); 

	return $namaFileBaru;

}

// c. hapus 
function hapuspublikasi ($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM publikasi WHERE id = $id");

	return mysqli_affected_rows($conn);
}


// ***********************  END Function Kru - Humas ************************
// **************************************************************************


// ***********************  Other Function **********************************
// **************************************************************************


// 1. Date Function
function indonesian_date ($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}


// 2. Captcha CODE
$site_key = '6Lc-Xz8UAAAAALk34NP0VKlidaKePPMi45JWMK0b'; 
$secret_key = '6Lc-Xz8UAAAAAO1bxvTAXyO4AUVLYaamUigG0D5E';

// 3. Reset Password


?>
