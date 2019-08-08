<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tips & tricks - Take me anyware</title>

	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/flat-icon/font/flaticon.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-shape">

  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
            <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
                <li class="nav-item"><a class="nav-link" href="index.php">Acasa</a></li> 
                <?php
                  if ($_SESSION["user"]) {
                ?>
                <li class="nav-item"><a class="nav-link" href="reservations.php">Rezervari</a></li>     
                <?php
                  }
                ?>
                <li class="nav-item"><a class="nav-link" href="facilities.php">Facilitati</a></li>
                <li class="nav-item active"><a class="nav-link" href="tips-and-tricks.php">Tips & Tricks</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">Despre</a></li> 
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>

            <div class="nav-right text-center text-lg-right py-4 py-lg-0">
                <?php
                if ($_SESSION["user"]) {
                ?>
                    <a class="button" href="/php/logout.php">Paraseste cont</a>
                <?php
                } else {
                ?>
                    <a class="button" href="#" data-toggle="modal" data-target="#authModal">Intra in cont</a>
                <?php
                }
                ?>
            </div>
            </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->


  <section class="hero-banner-sm magic-ball magic-ball-banner">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <h3>Recomandarile noastre:</h3>
                <p>Pentru a fii pe deplin multumit de calatoria ta si pentru ca stim ce inseamna sa uiti aparatul foto acasa, ti-am pregatit o lista cu lucrurile esentiale de luat in bagaj pentru o vacanta reusita din toate punctele de vedere:<p>
                <ul class="pl-4 my-4">
                    <li><i class="fas fa-check mr-3"></i>Actele de indentitate</li>
                    <li><i class="fas fa-check mr-3"></i>Biletele</li>
                    <li><i class="fas fa-check mr-3"></i>Bani/Cardul de credit</li>
                    <li><i class="fas fa-check mr-3"></i>Telefonul</li>
                    <li><i class="fas fa-check mr-3"></i>Medicamente</li>
                    <li><i class="fas fa-check mr-3"></i>Periuta de dinti</li>
                    <li><i class="fas fa-check mr-3"></i>Carnetel pentru amintiri</li>
                </ul>
                <h6>
                    De asemenea, iti punem la dispozitie cateva aplicatii pentru iOS/Android pentru a calatorii inteligent:
                </h6><br/>
                <div>
                    <h6>iXchange RO</h6>
                    Nu conteaza tara in care calatoresti, ai acces in timp real la modificarile cursului valutar pentru a stii exact daca merita acea pereche de pantofi sa fie cumparata
                </div>
                <div>
                    <h6>TouristEye</h6>
                    Pentru ca stim ca vrei sa te intorci cu amintiri de neuitat, aceasta aplicatie iti ofera cele mai bune si interesante locuri de vizitat din tara respectiva.
                </div>
                <br/>
                <h6>
                    Acum ca bagajul este facut si ai totul pus la punct, nu mai ramane decat sa te bucuri de momentele de relaxare la care ai visat tot anul!
                </h6><br/>
                <h6>
                    Echipa #takemeanyware iti ureaza vacanta minunata!
                </h6>
            </div>
            <div class="col-5">
                <img class="w-100" src="img/stuffs.jpg" />
            </div>
            <div class="col-12 mt-4">
                <img class="w-100" src="img/take_me_anywhere.jpeg" />
            </div>
        </div>
    </div>
  </section>


  <!-- ================ start footer Area ================= -->
  <footer class="footer-area">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="single-footer-widget">
            <h6>Despre</h6>
            <p>
              Lumea a devenit atât de rapidă încât oamenii nu vor să stea în picioare citind o pagină de informații, ci mai degrabă s-ar uita la o prezentare pentru a intelege
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="single-footer-widget">
            <h6>Navigare</h6>
            <div class="row">
              <div class="col">
                <ul>
                  <li><a href="index.php">Acasa</a></li>
                  <li><a href="facilities.php">Facilitati</a></li>
                  <li><a href="tips-and-tricks.php">Tips & Tricks</a></li>
                </ul>
              </div>
              <div class="col">
                <ul>
                  <li><a href="reservations.php">Rezervari</a></li>
<li><a href="about.php">Despre</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>
              </div>										
            </div>							
          </div>
        </div>						
      </div>
    </div>
  </footer>
  <!-- ================ End footer Area ================= -->

  <div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
        

          <div class="tab-content clearfix">
            <div class="tab-pane active" id="login">
              <div class="search-wrapper">
              <h3>Intra in cont</h3>

              <form class="search-form" action="php/login.php" method="POST">
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="Parola" required>
                  </div>
                </div>
                <div class="form-group">
                  <button class="button border-0 mt-3" type="submit">Mai departe</button>
                </div>
              </form>
            </div>
            </div>
            <div class="tab-pane" id="signup">
              <div class="search-wrapper">
              <h3>Creeaza cont</h3>

              <form class="search-form" action="php/signup.php" method="POST">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="last_name" placeholder="Nume" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="first_name" placeholder="Prenume" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" id="password-field" class="form-control" name="password" placeholder="Parola" required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="float: right;margin-left: -25px;position: relative;z-index: 2000;line-height: 50px;cursor: pointer;"></span>
                  </div>
                </div>
                <div class="form-group">
                  <button class="button border-0 mt-3" type="submit">Mai departe</button>
                </div>
              </form>
            </div>
          </div>
          <ul  class="nav nav-pills">
            <li class="active">
              <a href="#login" data-toggle="tab">Intra in cont</a>
            </li>
            &nbsp;|&nbsp;
            <li><a href="#signup" data-toggle="tab">Creeaza cont</a>
            </li>
          </ul>
          
        </div>
      </div>
    </div>
  </div>




  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/bootstrap/bootstrap-notify.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    $(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }

    });
    <?php
      if ($_GET['login_success'] === 'true') {
    ?>
      $.notify({
        message: 'Autentificare efectuata cu succes.' 
      },{
        type: 'success'
      });
    <?php
      } else if ($_GET['login_error'] === 'true') {
    ?>
      $.notify({
        message: 'Nu s-a putut realiza autentificarea. Utilizator sau parola gresite.' 
      },{
        type: 'danger'
      });
    <?php
      }
    ?>
    <?php
      if ($_GET['sign_up_success'] === 'true') {
    ?>
      $.notify({
        message: 'Contul a fost creat cu succes. Va rugam sa va autentificati.' 
      },{
        type: 'success'
      });
    <?php
      } else if ($_GET['sign_up_error'] === 'true') {
    ?>
      $.notify({
        message: 'S-a intampinat o eroare in crearea contului. Va rugam sa incercati din nou.' 
      },{
        type: 'danger'
      });
    <?php
      }
    ?>
  </script>
</body>
</html>