<?php 
  // Login Cek
  error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);  
  include "lib/config.php";
  include "eventinfo.php";
  session_start();
  if(empty ($_SESSION['user']) and empty($_SESSION['password']))
  {
    include "login.php";
  }
  else {      
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $glob_event_name." :: ".$glob_system_name; ?></title>


    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">
    <!-- Datatable css -->
    <link href="assets/css/jquery.dataTables.css" rel="stylesheet">
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/css/twitter-typeahead.css" rel="stylesheet">
    <link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet">

  </head>
  <body>
    <!-- JS placed on top, prevent fail load on included page -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery-1.12.0.min.js"></script>

    <!-- datatables js -->
    <script src="assets/js/dataTables.bootstrap.min.js"></script>    
    <script src="assets/js/jquery.dataTables.min.js"></script>
    
    <!-- BS-3 Type Ahead | AutoComplete -->
    <script src="assets/js/bootstrap3-typeahead.min.js"></script>    

    <!-- BS-3 JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!-- BS-3 Datepicker -->
    <script src="assets/js/moment-with-locales.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.js"></script>
    <script>
        function confirmHapus(message)
        {
          var x;
          var r = confirm('Hapus Data ini?');
          if(r == true)
          {
            window.location = message;            
          }
          else
          {
            //Pass
          }          
        }

        $( document ).ready(function() {
          <?php 
            if ( $_SESSION['status']=="admin") 
            {
              echo "";
            }
            elseif ($_SESSION['status']=="drower") 
            {
              echo "
                  $('.pr-admin').remove();
                  $('.pr-user').remove();
                  ";
            }
            else
            {
              echo "
                $('.pr-admin').remove();
                $('.pr-drower').remove();
                ";
            }
         ?>        
        }); // Close ready function

    </script>

    <style>
      <?php 
      if ($_SESSION['status'] != "admin")
      {
        echo "
          .pr-admin
          {
            visibility: hidden
          }
          .pr-user
          {
            visibility: visible
          } ";
        }
       ?>
      }
    </style>

    <?php
      
      // Encrypt Module || AES 
      include "modul/enkripsi/function.php";

      // Base Url
      $base_uri               = "http://localhost/solocup2/";

      // Modul View
      $link_overall           = paramEncrypt("uri=view/overall"); // default page
      $link_count_peserta     = paramEncrypt("uri=view/count_perkelas"); // Jumlah Peserta Per Kelas
      $link_count_kontingen   = paramEncrypt("uri=view/count_perkontingen"); // Jumlah Peserta Per Kontingen
      $link_info_event        = paramEncrypt("uri=view/info_event"); // Informasi Peserta event

      // Modul kontingen
      $link_manage_kontingen   = paramEncrypt("uri=kontingen/kontingen_view"); // Jumlah Peserta Per Kontingen    
      $link_search_kontingen   = paramEncrypt("uri=kontingen/kontingen_search"); // Jumlah Peserta Per Kontingen    

      // Modul Kelas
      $link_manage_kelas      = paramEncrypt("uri=kelas/kelas_view"); // Manajemen Kelas

      // Modul User
      $link_manage_user       = paramEncrypt("uri=user/user_view"); // Manajemen User

      // Modul Perguruan
      $link_manage_perguruan  = paramEncrypt("uri=perguruan/perguruan_view"); // Manajemen Perguruan      

      // Modul Event Info & Help
      $link_manage_event      = paramEncrypt("uri=event/event_view"); // Manajemen Event
      $link_manage_event_edit = paramEncrypt("uri=event/event_edit"); // Manajemen Event
      $link_system_help       = paramEncrypt("uri=view/syst_help"); // Manajemen Event

      // Modul Drowing
      $link_drowing           = paramEncrypt("uri=drowing/drowing_kelas"); // Drowing Per kelas > Manage
      $link_drowing_hasil     = paramEncrypt("uri=drowing/drowing_hasil"); // Drowing yang sudah jadi

      // Navigation Bar
      include("modul/view/navbar.php");
      ?>
      <div class="container-fluid">
        
      </div>      
      <?php 
      // Dinamic Page            
      $uriget = decode($_SERVER['REQUEST_URI']);            
      $uri    = $uriget[uri];
      if(isset($uri))
      {                
        include("modul/".$uri.".php");
      }
      else
      {
        // default page        
        include("modul/view/overall.php");
      }
    ?>
    
    <hr>
    <div class="container">
      <div align="center">
        <img src="assets/image/event_logo.png" alt="Event Logo" class="img-responsive">
      </div>
    </div>
    <div id="footer">
      <div class="container">
        <br>
        <p class="text-muted">&copy; 2016 <?php echo $glob_system_name ?>. 
        <span class="pull-right">Navigasi Sistem : 
          <a href="./?<?php echo $link_info_event ?>">Pusat Informasi</a> -
          <a href="./?<?php echo $link_system_help ?>">Bantuan</a>
        </span>
        <br>
          <small>Create By : 
                  <a href="https://github.com/axquired24">AxQuired24 (Albert S)</a> - 
                  <a href="https://github.com/tanyakenapa10">Bangkit S</a> - 
                  <a href="https://github.com/vanisaputra">Vani A.D.S</a>
          </small>
        </p>        
      </div>
    </div>

  </body>
</html>

<?php 
 } // Tutup Else Login
?>