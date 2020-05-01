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
                             <?php
                                    
                                    $con = mysqli_connect("localhost","root","root","society");
                                    $query = "SELECT * FROM members WHERE Uid='".$_SESSION['id']."'";
                                    $result = mysqli_query($con, $query);
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                         <h3>Notifications</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    //berkley algo for sync competition
    //start kinva bully algo to choose co-ordinator
    include("connection.php");
    $sql = "SELECT * FROM complaints";
    $result = mysqli_query($connect, $sql);
?>
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="comments-area">
                <?php while($row4 = mysqli_fetch_assoc($result)){ 
                        if($row["Name"] == $row4["name"]){
                            if($row4["status"] == "completed"){
                                    
                ?> 
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <!-- <div class="thumb">
                                <img src="img/comment/comment_1.png" alt="">
                            </div> -->
                            <div class="desc">
                                <p class="comment">
                                        Your complaint “<?php echo $row4["complaint_text"]; ?>” is successfully resolved.
                                </p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                            <h5>
                                            <a href="#">-Secretory</a>
                                            </h5>
                                            <!-- <p class="date">December 4, 2017 at 3:12 pm </p> -->
                                    </div>
                                    <div class="reply-btn float-right">
                                            <a href="#" class="btn-reply text-uppercase">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                    elseif($row4["status"] == "in_progress"){?>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <!-- <div class="thumb">
                                        <img src="img/comment/comment_1.png" alt="">
                                    </div> -->
                                    <div class="desc">
                                        <p class="comment">
                                            We are working on your complaint “<?php echo $row4["complaint_text"]; ?>”..we will inform you as soon as it get resolved.Thanks for your patience.
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                    <h5>
                                                    <a href="#">-Secretory</a>
                                                    </h5>
                                                    <!-- <p class="date">December 4, 2017 at 3:12 pm </p> -->
                                            </div>
                                            <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                } 
              }
            } 
            ?>
            </div>
        </div>
    </div>
</section>
<?php
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