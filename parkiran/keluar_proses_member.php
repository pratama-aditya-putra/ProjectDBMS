<?php

if(isset($_POST['daftar']))
{
    include('koneksi.php');
    $no_member  =$_POST['no_member'];
    $plat_nomor =$_POST['plat_nomor'];
    $jam_keluar =$_POST['jam_keluar'];
    date_default_timezone_set("Asia/Jakarta");
    $time1 = strtotime($jam_keluar);
    $time1 = date("Y-m-d h:i:s", $time1);
    
    $query = mysqli_query($koneksi, "SELECT * FROM pengunjung_member WHERE noMember = '$no_member' and noPlat = '$plat_nomor';");
    if (mysqli_num_rows($query)==0){
        echo "<script> alert('Nomor member dan nomor plat tidak sesuai database!'); </script>";
        echo "<script>window.history.back()</script>";
        exit();
    }
    
    $query = mysqli_query($koneksi, "SELECT * FROM transaksi_member WHERE noMember = '$no_member' ORDER BY IDTransaksi DESC LIMIT 0,1;");
    while($d = mysqli_fetch_array($query)){
        $id = $d['IDTransaksi'];
    }
    
    
    $update     =mysqli_query($koneksi, "update transaksi_member set
    
    waktuKeluar='$time1'

    where IDTransaksi   ='$id'")
        
    or die(mysqli_error());
    
    if($update)
    {
        echo "<script> alert('Berhasil'); </script>";
        echo "<script>window.location='index.php'</script>";
    }
    else
    {
        echo "<h2>gagal menyimpan data</h2>";
        echo "<script>window.history.back()</script>";
    }
}
else
{
    echo "<script>window.history.back()</script>";
}

?>