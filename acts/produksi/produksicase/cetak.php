<?php

if (isset($_POST['kirim'])) {
    $dari = $_POST['dtanggal'];
    $sampai = $_POST['stanggal'];
    header('Content-Type: application/pdf');
    ob_start();
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Jadwal Program</title>
    <style type="text/css">
        th {
            text-align: center;
        }
    </style>
</head>
<body>
         <table border="0.5" cellspacing="0" style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Program</th>
                        <th>Kreatif</th>
                        <th>Editor</th>
                        <th>Tanggal Taping</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require '../../../config/function.php';
                    $jpro = query ("SELECT * FROM jadwalproduksi WHERE tglTap >= '$dari' AND tglTap<='$sampai'");

                    ?>
                    <?php $i = 1;
                    foreach ($jpro as $shows) :
                    ?>
                    <tr>
                        <td style="width: 5px;"><?= $i; ?>.</td>
                        <td><?= $shows["program"]; ?></td>
                        <td><?= $shows["kreatif"]; ?></td>
                        <td><?= $shows["editor"]; ?></td>
                        <td><?= indonesian_date($shows["tglTap"], true); ?></td>
                        <td><?= $shows["ket"]; ?></td>
                        
                    </tr>
                    <?php $i++;
                    endforeach;
                    ?>
                </tbody>
            </table>
</body>
<?php 
    $html = ob_get_contents();
    ob_end_clean();
    require_once '../../../plugins/html2pdf/html2pdf.class.php'; 
    $pdf = new HTML2PDF('p', 'A4', 'en');
    $pdf->setDefaultFont('Arial');
    $pdf->writeHTML($html);


    $pdf->Output('Laporan.PDF', 'I'); //I:open D:download 
}
?>
</html>