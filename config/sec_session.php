<?php 
function sec_session_start() {
    $session_name = 'sec_session_id';   // Tentukan nama sesi khusus
    $secure = SECURE;
    // Hal ini akan menghentikan JavaScript saat mencoba mengakses identitas sesi.
    $httponly = true;
    // Memaksa sesi-sesi untuk hanya menggunakan kuki.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Mendapatkan param kuki saat ini.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Menentukan nama sesi sesuai set di atas.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // melakukan regenerasi sesi dan menghapus yang lama.

}
    
?>