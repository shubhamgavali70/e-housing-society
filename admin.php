<?php
    session_start();
    ob_start();
    if(empty($_SESSION['id'])){
        include 'error.html';
    }else{
?>
<?php
    include("connection.php");
    //Connection for images
    $msg="";
    if(isset($_POST['upload_event'])){
        $target = "images/".basename($_FILES['image']['name']);
        $image = $_FILES['image']['name'];
        if($image != NULL){
            $sql2 = "INSERT INTO images (image) VALUES ('$image')";
            $result = mysqli_query($connect, $sql2);
            if(isset($image)){
                if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                    $msg = "hahahha";
                }
                else{
                    $msg = "Unsuccesssful";
                    echo "<script>alert('Empty');</script>";
                }
            }
            header("Location:admin.php");
        }   
    }
    //Connection for notice text
    if(isset($_POST['upload_notice'])){
        $notice = $_POST["notices"];
        if($notice != NULL){
            $sql2 = "INSERT INTO notice (notice_text) VALUES ('$notice')";
            mysqli_query($connect, $sql2);
        }
    }
    //Conection for event text
    if(isset($_POST["upload_event"])){
        $eventtext = $_POST["eventtext"];
        if($eventtext != NULL){
            $sql3 = "INSERT INTO notice (notice_text) VALUES ('$eventtext')";
            mysqli_query($connect, $sql3);
        }
    }
    //Connection for complaint status
    if(isset($_POST["status"])){
        $opt = $_POST["opt"];
        $opt2 = $_POST["opt2"];
        $qry = "UPDATE complaints SET status = '$opt' WHERE id ='$opt2'";
        mysqli_query($connect, $qry);
    }
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ADMIN</title>
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
    
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
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
                                         <img src="e-housing society.png" alt="" width="70%"> 
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">


                                            <!-- <li><a href="#">Generate receipts</a></li> -->

                                            <li><a href="admin.html">Communication <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="#notice">Notice</a></li>
                                                    <li><a href="#events">Events</a></li>
                                                    <li><a href="#mom">Minutes of meeting</a></li>
                                                    <li><a href="#complaints">Complaints</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="accounting.php">Accounting</a></li>
                                            <li><a href="#">Edit members <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="#">Add member</a></li>
                                                    <li><a href="#">delete member</a></li>
                                                    <li><a href="#">edit commitee</a></li>

                                                </ul>
                                            </li>
                                            <li><a href="#">Notifications</a></li>
                                            <li><a class="boxed-btn4 p-2" href="logout.php">Logout</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="#"> <i class="fa fa-phone"></i> +10 673 567 367</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn4 w-100" href="logout.php">Logout</a>
                                    </div>
                                </div>
                            </div> -->
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
                        <h3>Admin</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- about_area_start  -->
    <div class="about_area plus_padding" id="notice">
        <form action="" method="post">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                        <textarea cols="60" rows="12" name="notices" placeholder="Enter notice here..."></textarea>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about_info pl-68">
                        <div class="section_title wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".3s">
                            <h3>Notice
                            </h3>
                        </div>
                        <p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s">"Get your updates here"</p>
                        <div class="about_btn wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".5s">
                            <button class="boxed-btn3" type="submit" name = "upload_notice">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- about_area_end  -->

    <div class="about_area plus_padding" id="events">
    <form method = "post" action ="" enctype="multipart/form-data">
        <div class="container">
            <div class="row align-items-center">
            
                <div class="col-lg-6 col-md-6">
               
                    <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                        <textarea name="eventtext" id="" cols="60" rows="12" placeholder="Enter notice here..."></textarea>
                        <input type="file" name="image" id="imageInput">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about_info pl-68">
                        <div class="section_title wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".3s">
                            <a href="#">
                                <h3>Events</h3>
                            </a>

                        </div>
                        <p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s">"Enjoyment and fun everything resides in a society."</p>
                        <div class="about_btn wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".5s">
                            <button class="boxed-btn3" type="submit" onclick="checkEvent()" id = "eventUpload" name = "upload_event">Upload</button>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        </form>
    </div>
     <!-- about_area_end  -->
   
<?php 
   include("mom.php");
?>
    <div class="accordion_area" id="mom">
       <form action="mom.php" method="post">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6">
                        <div class="faq_ask pl-68">
                            <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">Minutes Of Meeting</h3>
                            <div id="accordion needs-validation" novalidate>
                                                            
                                    <div class="form-group wow fadeInRight" id="sendNotice" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <label for="exampleTextarea">Send notice</label>
                                        <!-- <textarea class="form-control" id="momTextId" rows="3" name="momTextPost" value="abcd" required></textarea> -->
                                        <!-- <input type="textarea" class="form-control" id="momTextId" name="textarea" rows="3"> -->
                                        <input type="textarea" class="form-control" id="momTextId" name="abcd" rows="3">

                                    </div>
                                    <div class="form-group wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <div class="col-10">
                                            <!-- <input type="date" class="form-control" name="momDatePost" value="2020-04-16" id="dateInput" required> -->
                                            <input type="date" class="form-control" name="date" id="dateInput">
                                        </div>
                                    </div>
                            
                                    <!-- <button type="submit" id="momButton" class="boxed-btn3" name="upload_mom" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        Upload minutes of meetings
                                    </button>   -->
                                     <button type="submit" id = "b" onsubmit="addMom()" class="boxed-btn4" name="pqrs" data-wow-duration="1.3s" data-wow-delay=".5s">Upload</button>
                                    <!-- <input type="submit" class="boxed-btn4" id="momButton" name="upload_button" value="Upload"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
   <!-- testimonial_area  -->
                        <div class="whole-wrap">
		                    <div class="container box_1170">
                                <h1 class="mt-30">Complaints from society members</h1>
                                    <?php
                                            include("connection.php");
                                            $sql3 = "SELECT * FROM complaints";
                                            $result = mysqli_query($connect, $sql3);
                                            while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                <div class="section-top-border">
                                    <form action="" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <blockquote class="generic-blockquote">
                                                <p>“<?php echo $row["complaint_text"]; ?>”</p>
                                                <footer class="blockquote-footer" name = "username" ><?php echo $row["name"]; ?></footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <?php
                                    }    
                                     ?>
                                    <div class="input-group-icon mt-10">
								        <div class="icon"><i class="fa fa-sort" aria-hidden="true"></i></div>
								            <div class="form-select" id="default-select">
											    <select name = "opt" >
												        <option value="status">Status</option>
									                    <option value="in_progress">In-progress</option>
									                    <option value="completed">Completed</option>
									            </select>
								            </div>
						            	</div>
                                    </div>
                                    <div class="input-group-icon mt-10">
								        <div class="icon"><i class="fa fa-sort" aria-hidden="true"></i></div>
								            <div class="form-select" id="default-select2">
											    <select name ="opt2">
                                                        <?php
                                                        include("connection.php");
                                                        $sql3 = "SELECT * FROM complaints";
                                                        $result = mysqli_query($connect, $sql3);
                                                        while($row2 = mysqli_fetch_assoc($result)){ ?>
												        <option value="<?php echo $row2["id"];?>"><?php echo $row2["id"];?>.<?php echo $row2["name"];?></option>
									                    <?php } ?>
									            </select>
								            </div>
						            	</div>
                                    </div>

                                    <button type="submit" name="status" class="boxed-btn4 mb-30 send_Status" data-wow-duration="1.3s" data-wow-delay=".5s">Send</button>
                                    </form>
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
    <script src="myjs/minutesOfMeeting.js"></script>
    <script src="myjs/admin.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>
</body>

</html>
 <?php }
     ob_end_flush();
 ?>