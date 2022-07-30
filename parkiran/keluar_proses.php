<?php

if(isset($_POST['daftar']))
{
    include('koneksi.php');
    $no_karcis  =$_POST['no_karcis'];
    $plat_nomor =$_POST['plat_nomor'];
    $jam_keluar =$_POST['jam_keluar'];
    date_default_timezone_set("Asia/Jakarta");
    $time1 = strtotime($jam_keluar);
    $time1 = date("Y-m-d h:i:s", $time1);
    
    $query = mysqli_query($koneksi, "SELECT * FROM pengunjung_biasa WHERE noKarcis = '$no_karcis' and noPlat = '$plat_nomor';");
    if (mysqli_num_rows($query)==0){
        echo "<script> alert('Nomor karcis dan nomor plat tidak sesuai!'); </script>";
        echo "<script>window.history.back()</script>";
        exit();
    }
    $query = mysqli_query($koneksi, "SELECT * FROM transaksi_biasa WHERE noKarcis = '$no_karcis';");
        while($d = mysqli_fetch_array($query)){
            $tarif = $d['tarif'];
            $tarif = (int)$tarif;
            $time2 = $d['waktuMasuk'];
            $id = $d['IDTransaksi'];
        }
    $starttimestamp = strtotime($time2);
    $endtimestamp = strtotime($time1);
    if( abs($endtimestamp - $starttimestamp) < 5400){
        $biaya = 0;
    }
    else{
        $biaya = abs($endtimestamp - $starttimestamp) - 5400;
        $biaya = $biaya/1600;
        $biaya = (int)$biaya;
        if($tarif == 1000){
            $biaya = $biaya*$tarif + 2000;
        }
        else{
            $biaya = $biaya*$tarif + 1000;
        }
    }
    
    $update     =mysqli_query($koneksi, "update transaksi_biasa set
    
    waktuKeluar='$time1',
    biayaParkir='$biaya'

    where IDTransaksi   ='$id';")
        
    or die(mysqli_error());
    
    if($update)
    {
        echo "<script> alert('Biaya Parkir Total : $biaya'); </script>";
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