<?php
    if(isset($_POST['daftar']))
    {
        include_once 'koneksi.php';
        $nama =$_POST['nama'];
        $alamat     =$_POST['alamat'];
        $nik       =$_POST['nik'];
        $username      =$_POST['username'];
        $password     =$_POST['password'];
        $input   = mysqli_query($koneksi, "insert into operator values (NULL, '$username', '$password', '$nama', '$alamat', '$nik')");
        if($input)
        {
            echo "<h3>Data berhasil ditambahkan</h3>";
            echo "<script>window.location='masukadmin.php'</script>";
        }
        else
        {
            echo "<h2>Gagal menambahkan data</h2>";
            echo "$username <br/> $password  <br/> $name <br/> $alamat <br/> $nik <br/>";
            echo "<a href ='tambah.php'>Kembali</a>";
        }
    }
    else
    {
        echo "<script>window.history.back()</script>";
    }
?>