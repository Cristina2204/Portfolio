<?php
  session_start();
  include_once('php/getFacilities.php');
  $facilities = getFacilities(
    $_GET['check_in_date'],
    $_GET['check_out_date'],
    isset($_GET['capacity']) ? $_GET['capacity'] : NULL,
    isset($_GET['country']) ? $_GET['country'] : NULL,
    isset($_GET['town']) ? $_GET['town'] : NULL
  );
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Facilitati - Take me anyware</title>
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
                <li class="nav-item active"><a class="nav-link" href="facilities.php">Facilitati</a></li>
                <li class="nav-item"><a class="nav-link" href="tips-and-tricks.php">Tips & Tricks</a></li>
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


  <!--================Hero Banner Area Start =================-->
  <section class="hero-banner magic-ball">
    <div class="container">

      <div class="row align-items-center text-center text-md-left">
        <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
          <h1>Oferim planuri de calatorie pentru intreg globul!</h1>
          <p>Un om nu poate descoperi noi oceane până când nu are curajul de a pierde pământul din vedere – Andre Gide</p>
          <a class="button button-hero mt-4" href="#" data-toggle="modal" data-target="#searchModal">Cauta vacanta</a>
          <p class="mt-5 text-black">Ofertele cautate de turisti</p>
          <p class="text-black">Vezi mai jos o lista cu cele mai cautate proprietati premium</p>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
          <img class="img-fluid" src="img/home/earth.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->

  <!--================Tour section Start =================-->
  <section class="section-margin pb-xl-5">
    <div class="container">
      
      <div class="row"> 
        
        <?php 
          for ($i = 0; $i < count($facilities); $i ++) {
        ?>
          <div class="col-md-6">
            <div class="tour-card">
              <img class="card-img rounded-0" src="img/hotels/<?php echo $facilities[$i]["image"][0] ?>" alt="">
              <div class="tour-card-overlay">
                <a href="/facility.php?hotel_id=<?php echo $facilities[$i]["hotel_id"];?>">
                  <div class="media">
                    <div class="media-body">
                      <h4 class="hotel_dummy"><?php echo $facilities[$i]["name"] ?></h4>
                      <p><?php echo $facilities[$i]["country"]?></p>
                      <p><?php echo $facilities[$i]["town"]?></p>
                      <small><?php echo $facilities[$i]["number_of_rooms"] ?> camere ramase</small>
                    </div>
                    <div class="media-price">
                      <h4 class="text-primary">
                        $<span id="price_dummy"><?php echo number_format((float)$facilities[$i]["min_price"], 2, '.', ''); ?></span>/zi
                      </h4>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        <?php    
          }
        ?>

      </div>
    </div>
  </section>
  <!--================Tour section End =================-->


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

  <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="search-wrapper">
          <h3>Cauta hoteluri</h3>

          <form id="searchFacilities" class="search-form" action="facilities.php" method="GET">
            <input type="hidden" id="check_in_date" />
            <input type="hidden" id="check_out_date" />
            <div class="form-group">
              <div class="input-group">
                <label class="w-100 text-left" for="check_in_date_dummy">Data sosirii</label>
                <input id="check_in_date_dummy" type="date" class="form-control w-100" placeholder="Data check-in" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <label class="w-100 text-left" for="check_out_date_dummy">Data plecarii</label>
                <input id="check_out_date_dummy" type="date" class="form-control w-100" placeholder="Data check-out" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <label class="w-100 text-left" for="capacity">Capacitate</label>
                <select id="capacity">
                  <option value=""></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control" id="country" name="country" placeholder="Tara" />
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control" id="town" name="town" placeholder="Oras" />
              </div>
            </div>
            <div class="form-group">
              <button class="button border-0 mt-3" type="submit">Mai departe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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
              <a  href="#login" data-toggle="tab">Intra in cont</a>
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
  <script src="vendors/bootstrap/bootstrap-notify.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    var check_in_date = $('#check_in_date');
    var check_in_date_dummy = $('#check_in_date_dummy');
    var check_out_date = $('#check_out_date');
    var check_out_date_dummy = $('#check_out_date_dummy');
    var searchFacilitiesForm = $('#searchFacilities');
    var capacity = $("#capacity");
    var country = $('#country');
    var town = $('#town');
    
    searchFacilitiesForm.submit(function(e) {
      e.preventDefault();

      check_in_date.val(new Date(check_in_date_dummy.val()).getTime() / 1000);
      check_out_date.val(new Date(check_out_date_dummy.val()).getTime() / 1000);

      var href = 'facilities.php?check_in_date=' + check_in_date.val() + '&check_out_date=' + check_out_date.val();
      if (capacity.val()) {
        href += '&capacity=' + capacity.val();
      }      
      if (country.val()) {
        href += '&country=' + country.val();
      }
      if (town.val()) {
        href += '&town=' + town.val();
      }

      window.location.href = href;
    });
  </script>
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


    <?php
      if ($_GET['reservationOk'] === 'true') {
    ?>
      $.notify({
        message: 'Felicitari! Esti mai aprope de vacanta mult dorita!' 
      },{
        type: 'success'
      });
    <?php
      } else if ($_GET['reservationOk'] === 'false') {
    ?>
      $.notify({
        message: 'S-a intampinat o eroare. Va rugam sa incercati din nou.' 
      },{
        type: 'danger'
      });
    <?php
      }
    ?>
  </script>
</body>
</html>