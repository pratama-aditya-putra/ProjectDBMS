<?php
    session_start();
    include('koneksi.php');
    $i=0; $j=0;
    $temp = $_POST['temp'];
    $temp1 = "";
    $temp2 = "";
    $temp3 = "";
    for($i=0;$i<strlen($temp);$i++){
        if($temp[$i] == " ") $j++;
        if($j == 0) $temp1 .= $temp[$i];
        else if($j == 1) $temp2 .= $temp[$i];
        else {
            if($temp[$i] != " ") $temp3 .= $temp[$i];
        }
    }
    $output = "DELETE FROM $temp1 WHERE $temp2 ='$temp3';";
    $query = mysqli_query($koneksi, $output);
    if($query){
            echo "<div style='margin-left:38%; margin-top:15%;  text-align:center; width:300px; height:200px; border:solid; border-radius:10px;'>";
            echo "<form action='daftar2.php' method='post'  >";
            echo "<h3 style='margin-top:15%;  text-align:center;'>Data berhasil dihapus</h3> <br/>";
            echo "<button type='submit' value='$temp1' name='daftar' id='daftar' style='margin-top:15%;  text-align:center; background-color: #21689C; font-size:18px; border-radius:5px;'>Kembali</script>";
            echo "<form>";
            echo "</div>";
    }
    else{
            echo "<script>alert('Gagal dihapus')</script>";
            echo "<script>window.location='daftar2.php'</script>";
    }
?>