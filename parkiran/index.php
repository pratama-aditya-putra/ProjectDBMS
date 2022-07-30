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
      background-color: #21689C;
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
    </style>

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
                         <li><a class="nav-link" href="logout.php">Keluar</a></li>
                    </ul>
               </div>

          </div>
     </section>

    <table style="width:100%;">
         <tr>
             <td style="width:85%;">
            <button class="btn btn-primary collapsible">Profil</button>
            <div class="content">
              <p>
                                <?php 
                                    include "koneksi.php";
                                    $username = $_SESSION['username'];
                                    $query=mysqli_query($koneksi, "select * from operator where username = '$username';");
                                    while($d = mysqli_fetch_array($query)){
                                        $nama = $d['namaPetugas'];
                                        $id = $d['IDPetugas'];
                                        $username = $d['username'];
                                    }
                                  $query=mysqli_query($koneksi, "select * from gate where IDOperator = '$id';");
                                     while($d = mysqli_fetch_array($query)){
                                        $gate = $d['IDGate'];
                                    }
                                    print "Nama &emsp;&emsp;&ensp;&ensp; : $nama<br/>";
                                    print "Username &ensp;&ensp; : $username<br/>";
                                    print "ID Operator &ensp; : $id<br/>";
                                    print "</p></div></td><td style='font-size:30px;'>GATE $gate</td>";
                                ?>
        </tr>
    </table>
<h2 style="text-align:center;">Pengunjung Biasa</h2>
    
<table style="width=100%; margin-left:50px; margin-top:20px;"><tr><td>  
     <!-- Kendaraan Masuk -->
     <section id="masuk" style="width:600px; border:solid; border-radius:10px;">
          <div class="container">
               <div class="col-md-8" style="margin-top: 30px;">
                  <div class="col-md-9 panel">
                      <div class="col-lg-12 text-center mt-5 mb-5">
                        <h2>Kendaraan Masuk</h2>
                      </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                      <div class="col-md-12">
                        <form class="cmxform" method="POST" action="tambah_proses.php">
                          <div class="col-md-6">
                              
                            <label>Plat Kendaraan : </label>
                            <div class="form-group form-animate-text" style="margin-top:15px !important;">
                              <input type="text" class="form-text" name="plat_nomor" id="plat_nomor" required>
                              <span class="bar"></span>
                            </div>

                          <div class="col-mt-6" style="padding-top: 12px">
                            <label>Jenis Kendaraan : </label>
                          </div>

                          <div class="col-md-6" style="padding:5px 20px 0 25px" name="jenis_kendaraan">
                
                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio1" type="radio" name="jenis" value="Roda2" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Roda 2
                              </label>
                            </div>

                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio2" type="radio" name="jenis" value="Roda4" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Roda 4
                              </label>
                            </div><div style="height:50px;"></div>
                              
                          </div>
                              </div>
                            <?php 
                                include "koneksi.php";
                                $username = $_SESSION['username'];
                                $query=mysqli_query($koneksi, "select * from operator where username = '$username';");
                                while($d = mysqli_fetch_array($query)){
                                    $id = $d['IDPetugas'];
                                }

                                print "<button class='submit btn btn-primary col-md-12' type='submit' value='$id' style='height: 40px' name='daftar'>Masuk</button>";
                            ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
         </div>
     </section>
     <!-- Kendaraan Masuk --></td><td>

     <!-- Kendaraan Keluar -->
     <section id="keluar"  style="width:600px; border:solid; border-radius:10px; margin-left:30px;">
          <div class="container" style="margin:0px;">
               <div class="col-md-8" style="margin-top: 30px;">
                  <div class="col-md-9 panel">
                      <div class="col-lg-12 text-center mt-5 mb-5">
                        <h2>Kendaraan Keluar</h2>
                      </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                      <div class="col-md-12">
                        <form class="cmxform" method="POST" action="keluar_proses.php">
                          <div class="col-md-6">
                              
                            <label>Nomor Karcis Parkir : </label>
                            <div class="form-group form-animate-text" style="margin-top:15px !important;">
                              <input type="text" class="form-text" name="no_karcis" id="no_karcis" required>
                              <span class="bar"></span>
                            </div>  
                              
                            <label>Plat Kendaraan : </label>
                            <div class="form-group form-animate-text" style="margin-top:15px !important;">
                              <input type="text" class="form-text" name="plat_nomor" id="plat_nomor" required>
                              <span class="bar"></span>
                            </div>

                            <label>Jam Keluar : </label>
                            <div class="form-group form-animate-text" style="margin-top:10px !important;">
                              <input type="text" class="form-text" name="jam_keluar" id="jam_keluar" required>
                              <span class="bar"></span>
                            </div>
                              </div>
                          <input class="submit btn btn-primary col-md-12" type="submit" value="Keluar" style="height: 40px" name="daftar">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
         </div>
     </section>
    <!-- Kendaraan Keluar --></td></tr>
        </table>

<h2 style="text-align:center;">Pengunjung Member</h2>
<table style="width=100%; margin-left:50px; margin-top:20px;">
        <tr><td>  
     <!-- Kendaraan Masuk -->
     <section id="masuk" style="width:600px; height:500px; border:solid; border-radius:10px;   margin-top:8px;">
          <div class="container">
               <div class="col-md-8" style="margin-top: 30px;">
                  <div class="col-md-9 panel">
                      <div class="col-lg-12 text-center mt-5 mb-5">
                        <h2>Kendaraan Masuk</h2>
                      </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                      <div class="col-md-12">
                        <form class="cmxform" method="POST" action="cek_member.php">
                          <div class="col-md-6">
                              
                            <label>Plat Kendaraan : </label>
                            <div class="form-group form-animate-text" style="margin-top:15px !important;">
                              <input type="text" class="form-text" name="plat_nomor" id="plat_nomor" required>
                              <span class="bar"></span>
                            </div>

                            <label>Nomor Member : </label>
                            <div class="form-group form-animate-text" style="margin-top:15px !important;">
                              <input type="text" class="form-text" name="no_member" id="no_member" required>
                              <span class="bar"></span>
                            </div>

                          <div class="col-mt-6" style="padding-top: 12px">
                            <label>Jenis Kendaraan : </label>
                          </div>

                          <div class="col-md-6" style="padding:5px 20px 0 25px" name="jenis_kendaraan">
                
                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio1" type="radio" name="jenis" value="Roda2" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Roda 2
                              </label>
                            </div>

                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio2" type="radio" name="jenis" value="Roda4" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Roda 4
                              </label>
                            </div>
                              
                          </div>
                              </div>
                            <?php 
                                include "koneksi.php";
                                $username = $_SESSION['username'];
                                $query=mysqli_query($koneksi, "select * from operator where username = '$username';");
                                while($d = mysqli_fetch_array($query)){
                                    $id = $d['IDPetugas'];
                                }

                                print "<button class='submit btn btn-primary col-md-12' type='submit' value='$id' style='height: 40px' name='daftar'>Masuk</button>";
                            ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
         </div>
     </section>
     <!-- Kendaraan Masuk --></td><td>

     <!-- Kendaraan Keluar -->
     <section id="keluar"  style="width:600px; border:solid; border-radius:10px; margin-left:30px;">
          <div class="container" style="margin:0px;">
               <div class="col-md-8" style="margin-top: 30px;">
                  <div class="col-md-9 panel">
                      <div class="col-lg-12 text-center mt-5 mb-5">
                        <h2>Kendaraan Keluar</h2>
                      </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                      <div class="col-md-12">
                        <form class="cmxform" method="POST" action="keluar_proses_member.php">
                          <div class="col-md-6">
                              
                            <label>Nomor Member : </label>
                            <div class="form-group form-animate-text" style="margin-top:15px !important;">
                              <input type="text" class="form-text" name="no_member" id="no_member" required>
                              <span class="bar"></span>
                            </div>  
                              
                            <label>Plat Kendaraan : </label>
                            <div class="form-group form-animate-text" style="margin-top:15px !important;">
                              <input type="text" class="form-text" name="plat_nomor" id="plat_nomor" required>
                              <span class="bar"></span>
                            </div>

                            <label>Jam Keluar : </label>
                            <div class="form-group form-animate-text" style="margin-top:10px !important;">
                              <input type="text" class="form-text" name="jam_keluar" id="jam_keluar" required>
                              <span class="bar"></span>
                            </div>
                              </div><div style="height:263px;"></div>
                          <input class="submit btn btn-primary col-md-12" type="submit" value="Keluar" style="height: 40px" name="daftar">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
         </div>
     </section>
    <!-- Kendaraan Keluar --></td>
    </tr></table>  
    
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