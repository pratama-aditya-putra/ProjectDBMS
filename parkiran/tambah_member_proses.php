<?php
        include_once 'koneksi.php';
        $plat_nomor =$_POST['plat_nomor'];
        $nama      =$_POST['nama'];
        $jenis     =$_POST['jenis'];
        date_default_timezone_set("Asia/Jakarta");
        $startDate = time();
        $time = date('Y-m-d', strtotime('+30 day', $startDate));
        $startDate = date('Y-m-d');
        $input   = mysqli_query($koneksi, "insert into pengunjung_member values (NULL, '$nama', '$time', '$plat_nomor', '$jenis')");
        if($input)
        {
            echo "<script>window.location='masukadmin.php'</script>";
        }
        else
        {
            echo "<h2>Gagal menambahkan data</h2>";
            echo "<a href ='masukadmin.php'>Kembali</a>";
        }
?>