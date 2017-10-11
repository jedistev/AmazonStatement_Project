<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amazon";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} 
//sku model list   
$skuResult = mysqli_query($conn, 'SELECT DISTINCT sku FROM settlements');  

//total Cost and Settlement Date list
$totalResult = mysqli_query($conn, 'SELECT `settlement_start_date`, `settlement_end_date`, `total_amount`, currency FROM settlements LIMIT 1');

//for upload CSV
include('upload-functions.php');

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Amazon Settlement Project</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Amazon Settlement Project</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Database</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <img class="img-fluid" src="img/profile.png" alt="">
        <div class="intro-text">
          <span class="name">
              <?php require 'config.php'; ?>
         </span>
          <hr class="star-light">
          
        </div>
      </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
      <div class="container">
        <h2 class="text-center">Database</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal1" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                  <i class="fa fa-search-plus fa-3x"></i>
                   <p>Total Settlement Cost and date</p>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/cabin.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal2" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                    <p>Full Statement</p>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/cake.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal3" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                    <P> All SKU model</p>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/circus.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal4" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                    <p>uploaded CSV data</p>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
                <img class="img-fluid" src="img/portfolio/upload.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal5" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                    <p> Amount Cost</p>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/safe.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal6" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/submarine.png" alt="">
            </a>
          </div>
                  <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal7" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                    <p>Search and Find</p>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/search.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal8" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                    <p>Previous Statement</p>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/safe.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal9" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                    <p>List of Amazon Site Pages</p>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
                <img class="img-fluid" src="img/portfolio/amazon.png" alt="">
 
            </a>
          </div>
        </div>
      </div>
        </div>
      </div>
        
    </section>

    <!-- About Section -->
    <section class="success" id="about">
      <div class="container">
        <h2 class="text-center">About</h2>
        <hr class="star-light">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p>Amazon Statement database project. part of the CRUD, displayed, Edit, View,on Amazon Statement Flatfile</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p>this project is build for Ishka and Monhike only, this is an strict internal only</p>
          </div>
        </div>
      </div>
    </section>

 
    <!-- Footer -->
    <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-4">
            
            </div>
            <div class="footer-col col-md-4">
              <h3>Ishka Website</h3>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-google-plus"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-linkedin"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-dribbble"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="footer-col col-md-4">
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; Ishka 2017
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top d-lg-none">
      <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals Database -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Settlement total Cost, Start date and End date</h2>
                  <hr class="star-primary">
                      <?php
                        echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
                        echo '<tr>';
                        echo '<th>settlement start date</th>';
                        echo '<th>settlement end date</th>';
                        echo '<th>Currency</th>';
                        echo '<th>total Amount</th>';
                        echo '</tr>';

                      while (($row1 = mysqli_fetch_array($totalResult, MYSQLI_ASSOC)) != NULL) {
                          echo '<tr>';
                          echo '<td>' . $row1['settlement_start_date'] . '</td>';
                          echo '<td>' . $row1['settlement_end_date'] . '</td>';
                          echo '<td>' . $row1['currency'] . '</td>';
                          echo '<td>' . $row1['total_amount'] . '</td>';
                          echo '</tr>';
                      }
                      mysqli_free_result($totalResult);
                      echo '</table>';
                      
                      ?>

                  <ul class="list-inline item-details">
        
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Full Statement</h2>
                  <hr class="star-primary">
                  <a href="<?php echo 'full-statement.php'; ?>" class="btn btn-lg btn-default">Full Statement</a><br>
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>SKU List Database</h2>
                  <hr class="star-primary">
                    
                      <?php
                        echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
                        echo '<tr>';
                        echo '</tr>';
                        while (($row = mysqli_fetch_array($skuResult, MYSQLI_ASSOC)) != NULL) {
                            echo '<tr>';
                            echo '<td>' . $row['sku'] . '</td>';
                            echo '</tr>';
                        }
                        mysqli_free_result($skuResult);
                        echo '</table>';
                        ?>
                 <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Upload data</h2>
                    <hr class="star-primary">
                    
    <div id="wrap">
        <div class="container">
            <div class="row">
                <form class="form-horizontal" action="upload-functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Import  data</legend>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large" required>
                            </div>
                        </div>
						
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-success" data-loading-text="Loading...">Upload</button>
                            </div>
                        </div>
						
                    </fieldset>
                </form>
				
            </div>
                <?php
                get_all_records();
                ?>
        </div>
        <!--
          <div class="container">
            <div class="row">
              
                <form class="form-horizontal" action="upload-functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                   <fieldset>
                        <!-- Form Name 
                        <legend>Export data</legend>
			
                        <!-- Button -->
                    <!-- <div class="form-group">
                                
                               <div class="col-md-4">
                                    <input type="submit" name="Export" class="btn btn-success" value="Export to excel"/>
                                </div>
                            </div> 
                   </fieldset>
                </form> 
            </div>   
           </div>-->
    </div>
                </div>
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Total Amount Cost</h2>
                  <hr class="star-primary">
                 
                  <p></p>
                  
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Not sure what goes there</h2>
                  <hr class="star-primary">
                  <img class="img-fluid img-centered" src="img/portfolio/submarine.png" alt="">
                  <p></p>
                  
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto"><!--this layout need tweak-->
                <div class="modal-body">
                  <h2 align="center">Amazon's Live Data Search</h2><br />
                  <hr class="star-primary">
                  <div class="container">
                    <br />
                        <div class="form-group">
                         <div class="input-group">
                          <span class="input-group-addon">Search</span>
                          <input type="text" name="search_text" id="search_text" placeholder="Search on Amazon Settlement Details" class="form-control" />
                         </div>
                        </div>
                    <br />
                        <div id="result"></div>
                   </div>
                     <button class="btn btn-success" type="button" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                            Close</button>
                </div>
              </div>
            </div>
           </div>
        </div>
      </div>
    </div>
    
        <div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Not sure what goes there</h2>
                  <hr class="star-primary">
                 
                  <p></p>
                  
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
        <div class="portfolio-modal modal fade" id="portfolioModal9" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <h2>Amazon Pages Link</h2>
                  <hr class="star-primary">
                  <p>
                      <a href="https://www.amazon.co.uk/stores/page/331E95DF-4741-494D-971F-BE6FDAFF09A6" target="_blank">H-root United Kingdom</a><br>
                      <a href="https://www.amazon.de/h-root" target="_blank">H-root Germany</a><br>
                      <a href="https://www.amazon.fr/h-root" target="_blank">H-root France</a><br>
                      <a href="https://www.amazon.it/h-root " target="_blank">H-root Italy</a><br>
                      <a href="https://www.amazon.es/h-root" target="_blank">H-root Spain</a><br>
                  <a href="https://sellercentral.amazon.co.uk/gp/homepage.html/ref=ag_home_logo_xx" target="_blank">Amazon Seller Central</a>
                  </p>
                  
                  <button class="btn btn-success" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>
    
    <script>
        $(document).ready(function(){

            load_data();

            function load_data(query)
            {
             $.ajax({
              url:"searchdata.php",
              method:"POST",
              data:{query:query},
              success:function(data)
              {
               $('#result').html(data);
              }
             });
            }
         $('#search_text').keyup(function(){
          var search = $(this).val();
          if(search != '')
          {
           load_data(search);
          }
          else
          {
           load_data();
          }
         });
        });
        </script>

  </body>

</html>