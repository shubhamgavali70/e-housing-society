<?php
    session_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>E - Housing Society</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link
      href="https://fonts.googleapis.com/css?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/gijgo.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/slicknav.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css" integrity="sha256-c+C87jupO1otD1I5uyxV68WmSLCqtIoNlcHLXtzLCT0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    
  </head>

  <body>
    
    <!-- header-start -->
    <header>
      <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
          <div class="container-fluid ">
            <div class="header_bottom_border">
              <div class="row align-items-center">
                <div class="col-xl-3 col-lg-2">
                  <div class="logo">
                    <a href="index.html">
                      <!-- <img src="img/logo.png" alt=""> -->
                    </a>
                  </div>
                </div>

                <div class="col-12">
                  <div class="mobile_menu d-block d-lg-none"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
      <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-md-6">
              <div class="slider_text">
                <h3
                  class="wow fadeInRight"
                  data-wow-duration="1s"
                  data-wow-delay=".1s"
                >
                  E-Housing Society
                </h3>
                <h4 class="wow fadeInRight"
                  data-wow-duration="1s"
                  data-wow-delay=".1s"
                  style="color: white;font-family:sans-serif ; font-style: italic; font-size: 25px;"
                >
                  " Society is where love resides, memories are created, friends
                  and family belong and laughter never ends "
                </h4>
              </div>
            </div>

            <div class="col-lg-5 col-md-6">
              <div
                class="payment_form white-bg wow fadeInDown hvr-bounce-in"
                data-wow-duration="1.2s"
                data-wow-delay=".2s"
              >
                <div class="info text-center">
                  <h4>LOGIN</h4>
                </div>
                <form action="" class="needs-validation" id="loginForm" method="POST" novalidate>
                  <div class="form">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="single_input">
                          <label for="">Username</label>
                          <input
                            type="text"
                            class="wide ml-3 form-control"
                            placeholder="Enter ID"
                            name="Uid"
                            id="uname"
                            required
                          />
                        </div>
                      </div>
                      <div class="col-lg-12 mt-2">
                        <div class="single_input">
                          <label for="">Password</label>
                          <input
                            type="password"
                            class="wide ml-3 form-control"
                            placeholder="Enter Password"
                            name="Password"
                            id="pass"
                            required
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="submit_btn mt-3">
                    <button class="boxed-btn3" type="button" name="submit" id = "login">
                      Continue
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<script type= "text/javascript">
  $(document).ready(function(){
    $("#login").click(function(){
      var uid = $("#uname").val();
      var pass = $("#pass").val();
      if(uid == "" || pass == ""){
        alert("Enter details");
      }else{
        $.ajax({
          url: "validation.php",
          type: "post",
          data: $("#loginForm").serialize(),
          success: function(result){
               if(result.trim() == "success"){
                    window.location.href = "member.php";
               }
               else{
                 alert("Incorrect ID and password..please enter correct details");
               }
          }
        });
      }
    });
  });

</script>
    <!-- link that opens popup -->
    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/validation.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>
