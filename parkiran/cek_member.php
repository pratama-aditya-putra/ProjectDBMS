<?php
    if(isset($_POST['daftar']))
    {
        include_once 'koneksi.php';
        $plat_nomor =$_POST['plat_nomor'];
        $no_member  =$_POST['no_member'];
        $jenis      =$_POST['jenis'];
        $id         =$_POST['daftar'];
        $input   = mysqli_query($koneksi, "select * from pengunjung_member where noMember = '$no_member' and noPlat = '$plat_nomor'");
        if($input){}
        else
        {
            echo "<script type='text/javascript'> alert('Nomor Member atau Nomor Plat tidak sesuai dengan database')</script>";
            echo "<script>window.location='index.php'</script>";
        }
        date_default_timezone_set("Asia/Jakarta");
        $time = date("Y-m.d h:i:s");
        
        $input = mysqli_query($koneksi, "insert into transaksi_member values (NULL, '$time', NULL, '$no_member')");
        if($input)
        {
            echo "<script>alert('Data berhasil ditambahkan')</script>";
            echo "<script>window.location='index.php'</script>";
        }
        else
        {
            echo "<h2>Gagal menambahkan data</h2>";
            echo "<a href ='tambah.php'>Kembali</a>";
        }
    }
    else
    {
        echo "<script>window.history.back()</script>";
    }
?>