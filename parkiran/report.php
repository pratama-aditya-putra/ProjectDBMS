<?php
    include('koneksi.php');
    $jenis = $_POST['jenis'];
    $tanggal = $_POST['tanggal'];
    echo "<p style='text-align:center; font-size:40px;'><u>Laporan Transaksi Parkiran</u></p>";
    echo "<div style='margin-left:60px;'> Jenis transaksi : ".$jenis."
          <br/> Tanggal : ".$tanggal."<br/><br/>";
        $temp=$_POST['jenis'];
        $i = 0;
        $data = mysqli_query($koneksi, "SELECT * FROM transaksi_biasa WHERE waktuMasuk between '".$tanggal." 00:00:01' and '".$tanggal." 23:59:59';");
        $output = "<table style='margin-left:30px; font-size:19px; text-align:center;background-color:black;'>";
        foreach($data as $key => $var) {
            $j = 0;
            //$output .= '<tr>';border:solid;
            if($key===0) {
                $output .= "<tr style='padding:10px;'>";
                foreach($var as $col => $val) {
                    $output .= "<td style='padding:10px;background-color:white;'>" . $col . '</td>';
                    $j = $j+1;
                    if($temp == 'pengunjung_biasa'){
                        if($j == 3) $temp1 = $col;
                    }
                    else{
                        if($j == 1) $temp1 = $col;
                    }
                }
                $output .= '</tr>';
                $j=0;
                $output .= "<tr style='padding:10px;'>";
                foreach($var as $col => $val) {
                    $output .= "<td style='padding:10px;background-color:white;'>". $val ."</td>";
                    $j = $j+1;
                    
                    if($temp == 'pengunjung_biasa'){
                        if($j == 3) $temp2 = $val;
                    }
                    else{
                        if($j == 1) $temp2 = $val;
                    }
                }/*
                $output .= "<td style='padding:10px;'>
                                <table><tr><td style='padding:10px;'>
                                <form action='coba.php' method='post'>
                                    <button type='submit' name='temp' value='$temp $temp1 $temp2'>edit</button>
                                </form></td><td style='padding:10px;'>
                                <form action='hapus_proses.php' method='post'>
                                    <button type='submit' name='temp' value='$temp $temp1 $temp2' onclick = 'getConfirmation(\"$temp2\", \"$temp1\");'>hapus</button>
                                </form></td></tr>
                                </table>
                                </td>";*/
                $output .= '</tr>';
            }
            else {
                $output .= "<tr  style='padding:10px;'>";
                foreach($var as $col => $val) {
                    $output .= "<td style='padding:10px;background-color:white;'>".$val."</td>";
                    $j = $j+1;
                    if($temp == 'pengunjung_biasa'){
                        if($j == 3) $temp2 = $val;
                    }
                    else{
                        if($j == 1) $temp2 = $val;
                    }
                }
                /*$output .= "<td style='padding:10px;'>
                                <table><tr><td style='padding:10px;'>
                                <form action='coba.php' method='post'>
                                    <button type='submit' name='temp' value='$temp $temp1 $temp2'>edit</button>
                                </form></td><td style='padding:10px;'>
                                <form action='hapus_proses.php' method='post'>
                                    <button type='submit' name='temp' value='$temp $temp1 $temp2' onclick = 'getConfirmation(\"$temp2\", \"$temp1\");'>hapus</button>
                                </form></td></tr>
                                </table>
                                </td>";*/
                $output .= '</tr>';
            }
            $i = $i+1;
        }
        $output .= '</table>';
        echo $output;
        $query = mysqli_query($koneksi, "SELECT 
	SUM(biayaParkir)
FROM
	$temp
WHERE
	waktuMasuk between '".$tanggal." 00:00:01' and '".$tanggal." 23:59:59';");
    echo "<br/>Total Pendapatan : ";
    foreach($query as $d){
        echo $d["SUM(biayaParkir)"];
    }
        echo "</div>";
?>