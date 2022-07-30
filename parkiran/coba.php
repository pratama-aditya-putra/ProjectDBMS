<?php
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
        else $temp3 .= $temp[$i];
    }
    $output ="<div style='width:400px; border:solid; text-align:center; border-radius:10px; margin-left:35%;'>";
    $query = mysqli_query($koneksi,"select * from $temp1 where $temp2 = '$temp3';");
    $output .="<br/><form action='daftar2.php' method='post'  style='text-align:left; margin-left:5px;'>
            <button type='submit' name='daftar' value='$temp1'>Kembali</button>
            </form>";
    $output .= "<h3>Edit Tabel</h3> <hr/>";
    $output .= "<form action='edit_proses.php' method='post'>";
    foreach($query as $key => $var){
            if($key===0) {
                $i=0;
                foreach($var as $col => $val) {
                    $x[$i] = $col;
                    $i++;
                }
                $i=0;
                foreach($var as $col => $val) {
                    $output .= "<p> $x[$i]</p>";
                    $output .= "<input type='text' style='width:300px;' name='$x[$i]' value='$val'>";
                    $output .= '<br/>';
                    $i++;
                }
            }
        }
    $output .= "<br/><button type='submit' value = '$temp' name ='id' style='width:300px;'>Submit</button>";
    $output .= '</form>';
    $output .= '</div>';
    echo $output;
?>