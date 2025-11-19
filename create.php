<?php
$password = "223611056"; //passwors diisi disini

// proses enskipsi password
$password_hash  = password_hash($password, PASSWORD_DEFAULT);
//menampilkan password_hash
echo $password_hash;