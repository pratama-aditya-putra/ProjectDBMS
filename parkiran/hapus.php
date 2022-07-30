<html lang="en">
<head>

     <title>Parkir Area</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="icon" type="image/png" href="images/icons/logo.png"/>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body>
    <?php
        if(isset($_GET['plat_nomor']))
        {
            include('koneksi.php');
            $plat_nomor = $_GET['plat_nomor'];
            $cek        = mysqli_query($koneksi,"select plat_nomor from daftar where plat_nomor = '$plat_nomor'") or die(mysqli_error());
            
            if(mysqli_num_rows($cek)==0)
            {
                echo "<script>window.history.back()</script>";
            }
            else
            {
                $del = mysqli_query($koneksi, "delete from daftar where plat_nomor = '$plat_nomor'");
                if ($del)
                {
                    echo "<h3>Data berhasil dihapus</h3>";
                    echo "<script>window.location = 'masukadmin.php';</script>";
                }
                else
                {       
                    echo "<h2>Gagal menghapus data</h2>";
                    echo "<a href ='masukadmin.php'>Kembali</a>";
                }
            }
        }
        else
        {
            echo "<script>window.history.back()</script>";
        }
    ?>
</body>
</html>