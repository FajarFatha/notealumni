<?php
include"koneksi.php";
global $koneksi;

$nama=$_POST["nama"];
$username=$_POST["username"];
$password=$_POST["password"];

$query="INSERT INTO user (nama, username,password, level) VALUES ('$nama', '$username', '$password', 'siswa');";
$reg=mysqli_query($koneksi, $query);


if($reg){
    echo"<script>
        alert('Anda berhasil mendaftar, silahkan login')
        document.location.href='index.php'
    </script>";
}else{
    echo"<script>
        alert('Anda gagal mendaftar')
        document.location.href='index.php'
    </script>";
}
?>