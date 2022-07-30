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
            include('koneksi.php');
            $plat_nomor = $_GET['plat_nomor'];
            $show = mysqli_query($koneksi, "select * from daftar where plat_nomor = '$plat_nomor'");
            if(mysqli_num_rows($show) == 0)
            {
                echo '<script>window.history.back()</script>';
            }
            else
            {
                $d = mysqli_fetch_assoc($show);
            }  
        ?>
        
        <form action="edit_proses.php" method="post">
            <input type="hidden" name="plat_nomor" value="<?php echo $plat_nomor; ?>">
            <table>
                <tr>
                    <td>Nomor Karcis </td>
                    <td>: </td>
                    <td>
                        <input type="text" name="no_karcis" size="15" value="<?php echo $d['no_karcis']; ?>" required> 
                    </td>
                </tr>
                <tr>
                    <td>Nomor Plat </td>
                    <td>: </td>
                    <td>
                        <input type="text" name="plat_nomor" size="15" value="<?php echo $d['plat_nomor']; ?>" required> 
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kendaraan </td>
                    <td>: </td>
                    <td>
                        <input type="enum" name="jenis" size="15" value="<?php echo $d['jenis']; ?>" required> 
                    </td>
                </tr>
                <tr>
                    <td>Merk Kendaraan </td>
                    <td>: </td>
                    <td>
                        <input type="text" name="merk" size="15" value="<?php echo $d['merk']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Jam Masuk </td>
                    <td>: </td>
                    <td>
                        <input type="time" name="jam_masuk" value="<?php echo $d['jam_masuk']; ?>" required>
                    </td>
                </tr>
                 <tr>
                    <td>Jam Keluar </td>
                    <td>: </td>
                    <td>
                        <input type="time" name="jam_keluar" value="<?php echo $d['jam_keluar']; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td><input type="submit" name="simpan" value="simpan"></td>
                </tr>
            </table> 
        </form>
    </body>