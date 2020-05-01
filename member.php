<?php
        session_start();
        ob_start();   
        if(empty($_SESSION['id'])){
            include 'error.html';
        }else{
            if($_SESSION['id'] == "admin"){
                header("location:admin.php");
            }
?>
<?php
    //Connection for complaints
    include("connection.php");
        if(isset($_POST['send_complaint'])){
            $comp_text = $_POST['complaint_textarea'];
            $query2 = "SELECT Name FROM members WHERE Uid='".$_SESSION['id']."'";
            $res = mysqli_query($connect, $query2);
            while($r = mysqli_fetch_assoc($res)){
                $name = $r["Name"];
                if(!empty($comp_text)){
                    $sql = "INSERT INTO complaints (complaint_text, name, Uid) VALUES ('$comp_text','$name', '".$_SESSION['id']."')";
                    mysqli_query($connect, $sql);
                    header("Location:member.php");
                }   
            }   
        }
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome</title>
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


                                           
                                            <li><a href="">Communication <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="#image">Image gallery</a></li>
                                                    <li><a href="#mom">Minutes of meeting</a></li>
                                                    <li><a href="#complaints">Complaints</a></li>
                                                    <li><a href="#events">Notices</a></li>

                                                </ul>
                                            </li>
                                            
                                            <li><a href="editProfile.php">Edit profile</a></li>
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

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                             <?php
                                    include("connection.php");
                                    $query = "SELECT * FROM members WHERE Uid='".$_SESSION['id']."'";
                                    $result = mysqli_query($connect, $query);
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                         <h3><?php echo $row["Name"]; ?></h3>
                        <?php
                        }
                    
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->


    <!-- about_area_start  -->
   <div class="whole-wrap" id="image">
		<div class="container box_1170">
            <div class="section-top-border">
				<h3>Image Gallery</h3>
				<div class="row gallery-item">
                    <?php
                        include("connection.php");
                        $sql3 = "SELECT * FROM images";
                        $result = mysqli_query($connect, $sql3);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="col-md-4">
						<a href="images/<?php echo $row["image"]; ?>" class="img-pop-up">
							<div class="single-gallery-image" style="background: url(images/<?php echo $row["image"]; ?>);"></div>
						</a>
					</div>
                        <?php } ?>
				</div>
			</div>

        </div>
   </div>
    <!-- about_area_end  -->



    <!-- Minutes of meeting  -->
    
    <section class="blog_area section-padding" id="mom">
        
        <div class="container">
           
            <div class="row">
           
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div style="margin-bottom: 150px">
                        <h1>Minutes Of Meeting</h1>
                    </div>
                    <div class="blog_left_sidebar">
                        <?php
                            include("connection.php");
                            $sql4 = "SELECT * FROM mom";
                            $result = mysqli_query($connect, $sql4);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                  
                                <a href="#" class="blog_item_date">
                                    <h3><?php echo $row["dateInput"]; ?></h3>
                                    <p></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="">
                                    <h2><?php echo $row["textArea"]; ?></h2>
                                </a>
            
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <section class="blog_area section-padding">
        
        <div class="container">
           
            <div class="row noticeevents">
           
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div style="margin-bottom: 70px">
                        <h1>Notices And Events</h1>
                    </div>
                    <div class="blog_left_sidebar">
                        <?php
                            include("connection.php");
                            $sql4 = "SELECT * FROM notice";
                            $result = mysqli_query($connect, $sql4);
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="col-md-4 mt-sm-30">
                            <div class="">
                                <ul class="unordered-list">
                                    <li><?php echo $row["notice_text"]; ?></li>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- complaint area  -->
        
    <div class="testimonial_area" id="complaints">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                        <form action="" method="post" enctype="multipart/form-data">
                            <h1 style="margin-bottom:50px" class ="wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".5s">Complaints</h1>
                            <div class="mt-9 wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".5s">
                                    <textarea class="single-textarea" name="complaint_textarea" placeholder="Make your complaint here.." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"  required></textarea>
                            </div>
                            <button type="submit" name="send_complaint" class="boxed-btn4 mt-4" data-wow-duration="1.3s" data-wow-delay=".5s">Upload</button>                        
                        </form>
                </div>
            </div>
        </div>
    </div>


    
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