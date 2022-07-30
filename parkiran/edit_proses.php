<?php
    include('koneksi.php');
    $i=0; $j=0;
    $temp = $_POST['id'];
    $temp1 = "";
    $temp2 = "";
    $temp3 = "";
    for($i=0;$i<strlen($temp);$i++){
        if($temp[$i] == " ") $j++;
        if($j == 0) $temp1 .= $temp[$i];
        else if($j == 1) $temp2 .= $temp[$i];
        else $temp3 .= $temp[$i];
    }
    $query = mysqli_query($koneksi,"select * from $temp1 where $temp2 = '$temp3';");
    foreach($query as $key => $var){
            if($key===0) {
                $i=0;
                foreach($var as $col => $val) {
                    $x[$i] = $col;
                    $i++;
                }
            }
        }
    $output = "UPDATE $temp1 SET";
    for($j=0;$j<$i;$j++){
        $temp = $_POST[''.$x[$j]];
        $output .= " $x[$j] = '$temp'";
        if($j<$i-1) $output .= ", ";
    }
    $output .= " WHERE $temp2 = '$temp3';";
    $query = mysqli_query($koneksi, $output);
    if($query){
            echo "<div style='margin-left:38%; margin-top:15%;  text-align:center; width:300px; height:200px; border:solid; border-radius:10px;'>";
            echo "<form action='daftar2.php' method='post'  >";
            echo "<h3 style='margin-top:15%;  text-align:center;'>Data berhasil diubah</h3> <br/>";
            echo "<button type='submit' value='$temp1' name='daftar' id='daftar' style='margin-top:15%;  text-align:center; background-color: #21689C; font-size:18px; border-radius:5px;'>Kembali</script>";
            echo "<form>";
            echo "</div>";
    }
    else{
            echo "<script>alert('Gagal diubah')</script>";
            echo "<script>window.location='daftar2.php'</script>";
    }
?>