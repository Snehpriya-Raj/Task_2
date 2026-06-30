<?php
session_start();

session_unset();      // Session ke sabhi variables hata deta hai
session_destroy();    // Session ko completely destroy kar deta hai

header("Location: login.php");
exit();
?>