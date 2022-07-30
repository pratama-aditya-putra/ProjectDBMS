<?php
session_start();
include('koneksi.php');
$username = $_SESSION['username'];
$query=mysqli_query($koneksi, "select * from operator where username = '$username';");
while($d = mysqli_fetch_array($query)){
    $id = $d['IDPetugas'];
}
$update     =mysqli_query($koneksi, "update gate set
    IDOperator=NULL
    where IDOperator='$id';")
or die(mysqli_error());
session_destroy();
header("location:login.php");
?>