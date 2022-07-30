<?php
    if(isset($_POST['daftar']))
    {
        include_once 'koneksi.php';
        $plat_nomor =$_POST['plat_nomor'];
        $jenis      =$_POST['jenis'];
        $id         =$_POST['daftar'];
        $input   = mysqli_query($koneksi, "insert into pengunjung_biasa values ('$plat_nomor', '$jenis', NULL)");
        
        
        $query = mysqli_query($koneksi, "SELECT * FROM pengunjung_biasa ORDER BY noKarcis DESC LIMIT 0,1");
        while($d = mysqli_fetch_array($query)){
            $karcis = $d['noKarcis'];
        }
        print "$id";
        date_default_timezone_set("Asia/Jakarta");
        $time = date("Y-m.d h:i:s");
        if($jenis == 'Roda4'){
            $tarif = '1000';
        }
        else{
            $tarif = '500';
        }
        $input = mysqli_query($koneksi, "insert into transaksi_biasa values (NULL, '$time', NULL, '$tarif', NULL, '$karcis', '$id')");
        if($input)
        {
            echo "<h3>Data berhasil ditambahkan</h3>";
            echo "<script type='text/javascript'> window.open('resi.php', '_blank'); </script>";
            if($id < 199){
                echo "<script>window.location='masukadmin.php'</script>";
            }else{
                echo "<script>window.location='index.php'</script>";
            }
        }
        else
        {
            echo "<h2>Gagal menambahkan data</h2>";
            echo "$plat_nomor <br/> $jenis  <br/> $id <br/> $karcis <br/> $time <br/> $tarif<br/>";
            echo "<a href ='tambah.php'>Kembali</a>";
        }
    }
    else
    {
        echo "<script>window.history.back()</script>";
    }
?>