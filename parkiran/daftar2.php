<?php
session_start();
include "koneksi.php";
if(!isset($_SESSION['username'])){
    header ("location:login.php");
}
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
?>


<!DOCTYPE html>
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
    <style>
    .collapsible {
      color: white;
      cursor: pointer;
      padding: 18px;
      width: 20%;
      border: none;
      text-align: center;
      outline: none;
      font-size: 15px;
       margin-top: 20px;
       margin-left: 80px;
        font-size: 20px;
    }

    .active, .collapsible:hover {
      background-color: #555;
    }

    .content {
      padding: 0 18px;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
      background-color: #f1f1f1;
       margin-left: 80px;
      width: 40%;
        font-size: 20px;
    }
        tr:first-child td {
    background-color: #62717C;
    } 
    </style>
    <script type = "text/javascript">
         <!--
             
            function getConfirmation(temp, temp1) {
               var retVal = confirm("Apakah anda masih ingin menghapus data "+temp1+" dengan value "+temp+" ?");
               if( retVal == true ) {
                  location.reload();
                  return true;
               } else {
                  document.write ("");
                  location.reload();
                  return false;
               }
            }
         //-->
      </script> 
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">     
                    <div class="col-md-13 col-sm-12 text-align-right">
                         <span>Sistem Manajemen Database</span>
                         <span>Universitas Sumatera Utara</span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i>Kelompok7KomB@gmail.com</span>
                    </div>

               </div>
          </div>
     </header>


     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>
                    <h4>DatabaseParkiran</h4>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a class="nav-link" href="daftar.php">Kembali</a></li>
                    </ul>
               </div>

          </div>
     </section>

<section>
    <div>
    <?php
        include('koneksi.php');
        $temp=$_POST['daftar'];
        $i = 0;
        $data = mysqli_query($koneksi,"select * from $temp;");
        print "<h3 style='margin-left:10px;'>Tabel : $temp</h3>";
        $output = "<table style='margin-left:30px; font-size:19px; text-align:center; padding:10px;'>";
        foreach($data as $key => $var) {
            $j = 0;
            //$output .= '<tr>';
            if($key===0) {
                $output .= "<tr style='padding:10px;'>";
                foreach($var as $col => $val) {
                    $output .= "<td style='padding:10px;'>" . $col . '</td>';
                    $j = $j+1;
                    if($temp == 'pengunjung_biasa'){
                        if($j == 3) $temp1 = $col;
                    }
                    else{
                        if($j == 1) $temp1 = $col;
                    }
                }
                $output .= '<td>Operasi</td>';
                $output .= '</tr>';
                $j=0;
                $output .= "<tr style='padding:10px;'>";
                foreach($var as $col => $val) {
                    $output .= "<td style='padding:10px;'>". $val ."</td>";
                    $j = $j+1;
                    
                    if($temp == 'pengunjung_biasa'){
                        if($j == 3) $temp2 = $val;
                    }
                    else{
                        if($j == 1) $temp2 = $val;
                    }
                }
                $output .= "<td style='padding:10px;'>
                                <table><tr><td style='padding:10px;'>
                                <form action='coba.php' method='post'>
                                    <button type='submit' name='temp' value='$temp $temp1 $temp2'>edit</button>
                                </form></td><td style='padding:10px;'>
                                <form action='hapus_proses.php' method='post'>
                                    <button type='submit' name='temp' value='$temp $temp1 $temp2' onclick = 'getConfirmation(\"$temp2\", \"$temp1\");'>hapus</button>
                                </form></td></tr>
                                </table>
                                </td>";
                $output .= '</tr>';
            }
            else {
                $output .= "<tr  style='padding:10px;'>";
                foreach($var as $col => $val) {
                    $output .= "<td style='padding:10px;'>".$val."</td>";
                    $j = $j+1;
                    if($temp == 'pengunjung_biasa'){
                        if($j == 3) $temp2 = $val;
                    }
                    else{
                        if($j == 1) $temp2 = $val;
                    }
                }
                $output .= "<td style='padding:10px;'>
                                <table><tr><td style='padding:10px;'>
                                <form action='coba.php' method='post'>
                                    <button type='submit' name='temp' value='$temp $temp1 $temp2'>edit</button>
                                </form></td><td style='padding:10px;'>
                                <form action='hapus_proses.php' method='post'>
                                    <button type='submit' name='temp' value='$temp $temp1 $temp2' onclick = 'getConfirmation(\"$temp2\", \"$temp1\");'>hapus</button>
                                </form></td></tr>
                                </table>
                                </td>";
                $output .= '</tr>';
            }
            $i = $i+1;
        }
        $output .= '</table>';
        echo $output;
    ?>
    </div>

</section>
    
     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i>+62 853 6123 4567</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">ilmukomputer@gmail.com</a></p>
                              </div>
                         </div>
                    </div>


                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Sosial Media</h4>
                              </div> 

                              <ul class="social-icon">
                                  <p><a class="fa fa-facebook-square" attr="facebook icon"> Kelompok 7</a></p>
                                  <p><a class="fa fa-twitter"> keltujuhkomB</a></p>
                                  <p><a class="fa fa-instagram"> keltujuhkomB</a></p>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2020 | Kelompok7SMDB</p>
                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
              content.style.maxHeight = null;
            } else {
              content.style.maxHeight = content.scrollHeight + "px";
            } 
          });
        }
    </script>

</body>
</html>