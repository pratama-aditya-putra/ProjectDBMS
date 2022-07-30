<?php
session_start();
include ('koneksi.php');
$username=$_POST['username'];
$password=$_POST['password'];
$gate=$_POST['gate'];
$query=mysqli_query($koneksi, "select * from operator where username = '$username' and password = '$password'");

$xxx=mysqli_num_rows($query);
if($xxx==TRUE){
    $_SESSION['username']=$username;
    while($d = mysqli_fetch_array($query)){
        $id = $d['IDPetugas'];
    }
    $query=mysqli_query($koneksi, "UPDATE gate SET IDOperator = '$id' WHERE gate.IDGate = '$gate';");
    header ("location:index.php");
}
else{
    $query1=mysqli_query($koneksi, "select * from admin where username = '$username' and password = '$password'");
    $yyy=mysqli_num_rows($query1);
    if($yyy==TRUE){
        $_SESSION['username']=$username;
        header ("location:masukadmin.php");
    }
    else{
        echo "<script>alert('username atau password salah'); location = 'login.php';</script>";
    }
}
?>