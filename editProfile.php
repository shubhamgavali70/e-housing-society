<?php
        session_start();
        ob_start();
?>
<?php
        
        if(empty($_SESSION['id'])){
            include 'error.html';
        }else{
            if($_SESSION['id'] == "admin"){
                header("location:admin.php");
            }
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>USER</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
  
   <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="logo3.png" alt="" width="30%"> 
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">


                                           
                                            <li><a href="member.php">Communication</a>
                                                
                                            </li>
                                            
                                            <li><a href="editProfile.php">Edit profile</a>
                                                
                                            </li>
                                            <li><a href="notificationForMember.php">Notifications</a></li>
                                            <li><a class="boxed-btn4 p-2" href="logout.php">Logout</a></li>
                                        </ul>
                                    </nav>
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
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                         <h3>Edit profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="blog_area single-post-area section-padding">
    <div class="section-top-border">
		<div class="row">
            <div class="container">
		    <div class="col-lg-8 col-md-8 justify-content-center align-items-center">
                <form action="" method="POST">
                    <label for="" class="mt-10">Name</label>
                    <div class="mt-10">
                        <input type="text" name="full_name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" class="single-input">
                    </div>
                    <label for="" class="mt-10">Email</label>
                    <div class="mt-10">
                        <input type="text" name="email_id" placeholder="Email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'"
                                        class="single-input">
                    </div>
                    <label for="" class="mt-10">Phone</label>
                    <div class="mt-10">
                        <input type="text" name="contact" placeholder="Phone"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'"
                                        class="single-input">
                    </div>
                    <label for="" class="mt-10">Change password</label>
                    <div class="mt-10">
                        <input type="text" name="pass" placeholder="New password"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'New password'"
                                        class="single-input">
                    </div>
                    <div class="mt-10">
                    <button type="submit" name="editProfile" class="mt-10 genric-btn success-border circle" data-wow-duration="1.3s" data-wow-delay=".5s">Upload</button>
                    </div>
                </form>
            </div>
            </div>
        </div>      
    </div>
</section>
<?php
    include("connection.php");
    if(isset($_POST["editProfile"])){
        $fullname = $_POST["full_name"];
        $email = $_POST["email_id"];
        $contact=$_POST["contact"];
        $pass = $_POST["pass"];
        if(!empty($fullname)){
            $sql = "UPDATE members SET Name = '$fullname' WHERE Uid = '".$_SESSION['id']."'";
            mysqli_query($connect, $sql);
            $sql3 = "UPDATE complaints SET name = '$fullname' WHERE Uid = '".$_SESSION['id']."'";
            mysqli_query($connect, $sql3);
        }
        if(!empty($email)){
            $sql = "UPDATE members SET Email_Id = '$email' WHERE Uid = '".$_SESSION["id"]."'";
            mysqli_query($connect, $sql);
        }
        if(!empty($contact)){
            $sql = "UPDATE members SET Phone = '$contact' WHERE Uid = '".$_SESSION["id"]."'";
            mysqli_query($connect, $sql);
        }
        if(!empty($pass)){
            $sql = "UPDATE login SET Password = '$pass' WHERE Uid = '".$_SESSION["id"]."'";
            mysqli_query($connect, $sql);
        }
        header("Location:member.php");
    }
?>
              

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



    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>
</body>

</html>
<?php
    }
    ob_end_flush();
?>