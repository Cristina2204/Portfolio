<?php
  session_start();
  include_once('php/getHotel.php');
  $hotel = getHotel($_GET['hotel_id']);
  error_log(json_encode($hotel));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $hotel["name"] ?> - Take me anyware</title>
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
        
      </div>
    </div>
  </section>
  <!--================Hero Banner Area End =================-->

  <!--================Tour section Start =================-->
  <section class="section-margin pb-xl-5">
    <div class="container">
      
      <div class="row">
        <h1 class="text-center w-100">
            <?php echo $hotel["name"] ?>
        </h1> 
        <h3 class="text-center w-100 mb-5"></h3>
        <div class="row justify-content-center w-100">
            <div class="col-9 row">
                <div class="col-12">
                  <img class="card-img rounded-0 w-100" src="img/hotels/<?php echo $hotel["image"][0] ?>" alt="">
                </div>
            </div>
        </div>
        <div class="row justify-content-center w-100 mt-4">
            <div class="col-9 row">
                <div class="col-4">
                  <img class="card-img rounded-0 w-100" src="img/hotels/<?php echo $hotel["image"][1] ?>" alt=""></div>
                <div class="col-4">
                  <img class="card-img rounded-0 w-100" src="img/hotels/<?php echo $hotel["image"][2] ?>" alt=""></div>
                <div class="col-4">
                  <img class="card-img rounded-0 w-100" src="img/hotels/<?php echo $hotel["image"][3] ?>" alt=""></div>
            </div>
        </div>
        <ul class="list-group mt-5 mx-auto">
            <?php 
                for ($i = 0; $i < count($hotel["rooms"]); $i ++) {
            ?>
                <li class="list-group-item">
                    <?php 
                    $room_description = $hotel["rooms"][$i]["description"];
                    $room_number = $hotel["rooms"][$i]["number"];
                    echo "$room_description ($room_number)"; 
                    ?>
                    <a onclick="fillInReservation(this)" class="button ml-3 py-1 px-3" href="#" data-toggle="modal" data-target="<?php if ($_SESSION["user"]) { echo "#addReservation"; } else { echo "#authModal"; } ?>">
                        <span>
                            $<span id="price_dummy"><?php echo $hotel["rooms"][$i]["price"] ?></span>
                            <input class="room_id" type="hidden" value="<?php echo $hotel["rooms"][$i]["id"] ?>" />
                            <span style="display: none" class="hotel_dummy"><?php echo $hotel["name"] ?></span>
                            <span style="display: none" class="room_description">1 x <?php echo $room_description ?></span>
                        </span>
                    </a>
                </li>
            <?php
                }
            ?>
        </ul>
        <div class="mt-5" style="white-space: pre-line">
            <?php echo $hotel["description"] ?>
        </div>

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


  <div class="modal fade" id="addReservation" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div>
              <div class="search-wrapper text-left">
              <h3>Adauga rezervare</h3>

              <h4 class="text-weight-bold" id="hotel"></h4>
              <h3 class="text-weight-bold" id="room_description"></h3>
              <h3 class="text-weight-bold"><span id="price"></span></h3>

              <form class="search-form" id="createReservation" action="php/createReservation.php" method="POST" onsubmit="createReservation">
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
                
                <input id="check_in_date" type="hidden" name="check_in_date" />
                <input id="check_out_date" type="hidden" name="check_out_date" />
                <input id="rooms_id" type="hidden" name="rooms_id" />
                <input type="hidden" name="users_id" value="<?php echo $_SESSION["user"] ?>" />

                <div class="form-group">
                  <button class="button border-0 mt-3" type="submit">Mai departe</button>
                </div>
              </form>
              </div>
            </div>
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

    var checkInDateDummy = $('#check_in_date_dummy');
    var checkOutDateDummy = $('#check_out_date_dummy');
    var checkInDate = $('#check_in_date');
    var checkOutDate = $('#check_out_date');
    var priceDummy = $('#price_dummy');
    var hotel = $('#hotel');
    var price = $('#price');
    var roomsId = $('#rooms_id');
    var room_description = $('#room_description');
    var readyToSubmit = false;
    
    function fillInReservation(elem) {
      hotel.text($(elem).find('.hotel_dummy').text());
      room_description.text($(elem).find('.room_description').text());
      roomsId.val($(elem).find('.room_id').val());
    }

    function createReservation(e) {
      e.preventDefault();

      if (readyToSubmit) {
        $('#createReservation').submit();
      }
    }

    function fillInDatesPrice(checkIn, checkOut) {
      checkIn = new Date(checkIn).getTime();
      checkOut = new Date(checkOut).getTime();
      checkInDate.val(checkIn);
      checkOutDate.val(checkOut);
      price.text('Total de plata: $' + (parseFloat(priceDummy.text()) * (checkOut - checkIn) / 1000 / 60 / 60 / 24).toFixed(2));
    }

    checkInDateDummy.change(function() {
      if (new Date($(this).val()).getTime() > new Date().getTime()) {
        if (checkOutDateDummy.val()) {
          if (new Date($(this).val()).getTime() < new Date(checkOutDateDummy.val()).getTime()) {
            readyToSubmit = true;
            fillInDatesPrice($(this).val(), checkOutDateDummy.val());
          } else {
            readyToSubmit = false;
            checkInDateDummy.val('');
            alert('Va rugam sa selectati un interval de timp corespunzator');    
          }
        }
      } else {
        readyToSubmit = false;
        checkInDateDummy.val('');
        alert('Va rugam sa selectati un interval de timp corespunzator');
      }
    })

    checkOutDateDummy.change(function() {
      if (new Date($(this).val()).getTime() > new Date().getTime()) {
        if (checkInDateDummy.val()) {
          if (new Date($(this).val()).getTime() > new Date(checkInDateDummy.val()).getTime()) {
            readyToSubmit = true;
            fillInDatesPrice(checkInDateDummy.val(), $(this).val());
          } else {
            readyToSubmit = false;
            checkOutDateDummy.val('');
            alert('Va rugam sa selectati un interval de timp corespunzator');    
          }
        }
      } else {
        readyToSubmit = false;
        checkOutDateDummy.val('');
        alert('Va rugam sa selectati un interval de timp corespunzator');
      }
    })
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
  </script>
</body>
</html>