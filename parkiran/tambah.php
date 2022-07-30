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
        <h5>
            <a href="masukadmin.php">Kembali</a><br>
        </h5>
        <h5>Tambahkan Data : </h5>
        <form action="tambah_proses.php" method="post">
            <table>
                <tr>
                    <td>Nomor Karcis</td>
                    <td>:</td>
                    <td><input input="number" name="no_karcis" required> </td>
                </tr>
                <tr>
                    <td>Nomor Plat</td>
                    <td>:</td>
                    <td><input input="number" name="plat_nomor" required> </td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>:</td>
                    <td><input input="enum" name="jenis" required> </td>
                </tr>
                <tr>
                    <td>Merk</td>
                    <td>:</td>
                    <td><input input="text" name="merk" required> </td>
                </tr>
                <tr>
                    <td>Jam Masuk</td>
                    <td>:</td>
                    <td><input input="time" name="jam_masuk" required> </td>
                </tr>
                <tr>
                    <td>Jam Keluar</td>
                    <td>:</td>
                    <td><input input="time" name="jam_keluar" required> </td>
                </tr>
                 <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td><input type="submit" name="tambah" value="tambah"></td>
                </tr>
            </table>
        </form>
    </body>