<?php
    session_start();
    include_once 'koneksi.php';
    $username = $_SESSION['username'];
    $query=mysqli_query($koneksi, "select * from operator where username = '$username';");
     while($d = mysqli_fetch_array($query)){
        $id = $d['IDPetugas'];
    }

    $query=mysqli_query($koneksi, "select * from gate where IDOperator = '$id';");
     while($d = mysqli_fetch_array($query)){
        $gate = $d['IDGate'];
    }
    if($id < 199){
        $gate = 1;
    }
    $query = mysqli_query($koneksi, "SELECT * FROM transaksi_biasa ORDER BY noKarcis DESC LIMIT 0,1");

    print "<div style='width:300px; height:300px; border:solid;'>";
    print "<div style='text-align:center; font-size:30px;'>Resi Parkir</div>";
    print "<br/>&ensp;Pantai Kuta<br/>&ensp;Kecamatan Kuta<br/>&ensp;Bali, Denpasar<br/><hr/>";
    while ($d = mysqli_fetch_array($query)){
        print"<p>&ensp;Nomor karcis &ensp;&ensp;: ".$d['noKarcis']."<br/> &ensp;Jam Masuk  &ensp;&ensp;&ensp;&ensp;: ".$d['waktuMasuk']."<br/>";
    }
    print "&ensp;ID Operator &emsp;&ensp; : $id<br/>";
    print "&ensp;Gate &emsp;&emsp;&emsp;&emsp;&ensp; : $gate<br/>";
    $query = mysqli_query($koneksi, "SELECT * FROM pengunjung_biasa ORDER BY noKarcis DESC LIMIT 0,1");
    while($d = mysqli_fetch_array($query)){
        print"&ensp;Nomor Plat &ensp;&ensp;&ensp;&ensp;: ".$d['noPlat']."</p>";
    }
    print "<div style='text-align:center;'><p style='font-size:11px;'><br/>*Barang-barang pribadi merupakan tanggungan sendiri*<br/>*Jaga barang anda jangan sampai hilang*</p></div>";
    print "</div>";
?>