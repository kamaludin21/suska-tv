<iframe src="http://docs.google.com/viewer?
url=localhost/sweetpea/doc/1.docx&embedded=true" width="600"
height="780"
style="border: none;"></iframe>

<?php


    $site_key = '6Lc-Xz8UAAAAALk34NP0VKlidaKePPMi45JWMK0b'; // Diisi dengan site_key API Google reCapthca yang sobat miliki
    $secret_key = '6Lc-Xz8UAAAAAO1bxvTAXyO4AUVLYaamUigG0D5E'; // Diisi dengan secret_key API Google reCapthca yang sobat miliki
 
    if (isset($_POST['submit']))
    {
        if(isset($_POST['g-recaptcha-response']))
        {
            $api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response='.$_POST['g-recaptcha-response'];
            $response = @file_get_contents($api_url);
            $data = json_decode($response, true);
 
            if($data['success'])
            {
                $comment = $_POST['komentar'];
                // proses penyimpananan dan lain-lain disini
                $success = true;
            }
            else
            {
                $success = false;
            }
        }
        else
        {
            $success = false;
        }
    }
?>