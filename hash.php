<?php
$password = 'password';
$password = password_hash($password, PASSWORD_DEFAULT);
echo "$password";
?>
