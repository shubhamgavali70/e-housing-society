<?php
    session_start();
    if(empty($_SESSION['id'])){
        include 'error.html';
    }else{
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
 
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Accounting</title>
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

    <link rel="stylesheet" href="css/style.css" />
    
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    
  </head>
  
<body>
    
    <?php
        include("connection.php");
        $query = "SELECT * FROM members";
        $loop = mysqli_query($connect, $query);
    ?>
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
                                         <img src="e-housing society.png" alt="" width="70%"> 
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">


                                            <!-- <li><a href="#">Generate receipts</a></li> -->

                                            <li><a href="admin.php">Communication</a>
                                                
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
              <h3>Accounting</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Modal comes here-->

    <!-- Modal -->
    <div
        class="modal fade"
        id="exampleModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
    >
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                          <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                          >&#10006;
                          </button>
                  </div>
                  <div class="modal-body" id="userDetail">
                         <!--User Details-->   
                  </div>
              </div>
          </div>
    </div>
    <div
        class="modal fade"
        id="editModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
    >
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                          <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                          >&#10006;
                          </button>
                  </div>
                  <div class="modal-body" id="editDetails">
                  
                      <form action="updateAccountingDetails.php" method="post" id="insert_details">
                          <table class="table table-borderless">
                              <thead>
                                <tr>
                                    <th><h3 class="memName"></h3></th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td><h5>&#10022; Email</h5></td>
                                    <td class="memEmail"></td>
                                  </tr>
                                  <tr>
                                    <td><h5>&#10022; Contact</h5></td>
                                    <td class="memContact"></td>
                                  </tr>
                                  <tr>
                                    <td><h5>&#10022; Flat Type</h5></td>
                                    <td class="memFlat"></td>
                                  </tr>
                                  <tr>
                                    <td><h5>&#10022; Total Maintenance Amount</h5></td>
                                    <td class="total_amount">Rs. 2500</td>
                                  </tr>
                                  <tr>
                                    <td><h5>&#10022; Amount Received</h5></td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="amt" id="amount_received" class="form-control"> 
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><h5>&#10022; Paid</h5></td>
                                    <td>
                                        <div class="confirm-checkbox">
                                            <input type="checkbox" id="confirm-checkbox" name="check_box">
                                            <label for="confirm-checkbox"></label>
                                          </div>
                                    </td>
                                  </tr>
                                  <tr>
                                      <td><h5>&#10022; Due</h5></td>
                                      <td class="due"></td>
                                  </tr>
                                  <tr>
                                      <input type="hidden" name="edit_id" id="edit_id"/>  
                                      <td><input type="submit" name="submit" class="abc button-group-area genric-btn info circle" value="Confirm"></td>
                                  </tr>
                              </tbody>
                          </table>
                      
                      <button type="button" name="genRec" id="genRec" class="rec button-group-area genric-btn success circle disable">Generate receipt</button>
                      <button type ="button" id="sendAlert" class="button-group-area genric-btn danger circle">Send alert</button> 
                      </form>  
                 
                  </div>
              </div>
          </div>
    </div>

    <!--/ bradcam_area  -->
    <div class="whole-wrap">
      <div class="container box_1170">
        <div class="section-top-border">
          <h3 class="mb-30">Table</h3>
          <div class="progress-table-wrap">
            <div class="progress-table">
              <div class="table-head">
                <div class="serial">Flat no.</div>
                <div class="country">Name</div>
                <div class="visit">Details</div>
                

              </div>
              <?php  while($row = mysqli_fetch_array($loop, MYSQLI_ASSOC))
              {  ?>
             <div class="table-row">
                            <div class="serial"><?php  echo $row["Uid"]; ?></div>
                            <div class="country">
                                <?php  echo $row["Name"]; ?>
                            </div>
                            <div
                              class="button-group-area m-40 align-center"
                              data-toggle="modal"
                              data-target="#editModal"
                            >
                                <a href="#" class="genric-btn info circle arrow edit_data" id="<?php echo $row["Uid"]; ?>"
                                  >Details<span class="lnr lnr-arrow-right"></span
                                ></a>
                            </div>
              </div>
              <?php
                }
              ?>   
           
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type= "text/javascript">
      $(document).on('click', '.edit_data', function(){  
           var edit_id = $(this).attr("id");  
           $.ajax({  
                url:"acc_details.php",  
                method:"POST",  
                data:{edit_id:edit_id},  
                dataType:"json",  
                success:function(data){ 
                     $('#edit_id').val(data.Uid);
                     $(".memName").text(data.Name);   
                     $(".memEmail").text(data.Email_Id);   
                     $(".memContact").text(data.Phone);   
                     $(".memFlat").text(data.Flat_type);   
                     $('#editModal').modal('show');
                }  
           });  
      });
 
      $('#insert_details').on("submit", function(){    
                $.ajax({  
                     url:"updateAccountingDetails.php",  
                     method:"POST",  
                     data:$('#insert_details').serialize(),    
                     success:function(data){  
                          //$('#insert_details')[0].reset();  
                          $('#editModal').modal('hide');  
                     }  
                });  
           
      });  
      $("#confirm-checkbox").click(function(){
                        var checked_status = this.checked;
                        if(checked_status == true){
                            $("#genRec").removeClass("disable");
                            $("#sendAlert").addClass("disable");
                            var total = 2500;
                            var amtRec = parseInt($("#amount_received").val());
                            if(amtRec > 0 && amtRec < 2501 && amtRec!= null){
                                var due = total - amtRec;
                                $(".due").text("Rs. "+due);
                                $(".rec").on("click",function(){
                                  var doc = new jsPDF();
                                  doc.text(75, 20, ' Maintenance Receipt ');
                                  doc.text(10, 40, 'Name: ');
                                  var name =  $(".memName").text();
                                  doc.text(name,35,40);
                                   doc.text(10, 60, 'Contact: ');
                                  var contact =  $(".memContact").text(); 
                                  doc.text(contact,35,60);
                                   doc.text(10, 80, 'Flat type: ');
                                  var flat_type =  $(".memFlat").text(); 
                                  doc.text(flat_type,35,80);
                                   doc.text(10, 100, 'Total amount: ');
                                  var total =  $(".total_amount").text(); 
                                  doc.text(total,50,100);
                                   doc.text(10, 120, 'Amount received: ');
                                  var amtrec = "Rs. " + $("#amount_received").val(); 
                                  doc.text(amtrec,55,120);
                                   doc.text(10, 140, 'Due: ');
                                  var due =  $(".due").text(); 
                                  doc.text(due,35,140);
                                  // doc.text(10, 160, 'Date: '); 
                                  // doc.text(Date.now(),35,140);
                                  doc.save(name);
                                  //window.location.href="accounting.php";
                                })
                            }
                            else{
                                $(".due").text("Invalid amount");
                            }
                        }else{
                            $("#genRec").addClass("disable");
                            $("#sendAlert").removeClass("disable");
                            $(".due").text("Null");
                        }
                    });
   
    </script>
    <!-- link that opens popup -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js" integrity="sha256-gJWdmuCRBovJMD9D/TVdo4TIK8u5Sti11764sZT1DhI=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>  </body>
</html>
<?php
    }
?>