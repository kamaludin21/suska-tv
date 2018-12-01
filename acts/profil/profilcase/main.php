<?php
    $task = @$_GET['task'];
    switch ($task) {

      case 'profil':
        include 'profil.php';
        break;

      case 'edit':
        include 'edit.php';
        break;
        
      case 'password':
        include 'ubahpassword.php';
        break;

      default:
        include 'profil.php';
        break;
    }
    ?>