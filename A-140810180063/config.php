<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'mahasiswa';

    $conn = new mysqli($host, $user, $pass, $db);

    if($conn->connect_error){
        die("Koneksi error: ".$conn->connect_error);
    }
?>
