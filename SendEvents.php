<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <title>Toyota | School Project Admin </title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    
    <link href="css/jquery.toast.css" rel="stylesheet" />
     <link rel="stylesheet" href="css/bootstrap-dialog.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <?php  require_once"header.php"; ?>
      
         
      <!--header end-->

      <!--sidebar start-->
       <?php  require_once"sidebar.php"; ?>     
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Send Notifications</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="">Home</a></li>
						<li><i class="fa fa-home"></i><a href="">Events</a></li>
					<li><i class="fa fa-bars"></i>Send Events</li>
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-6">
                      <section class="panel">
                          <header class="panel-heading">
                              Post Event to users
                          </header>
                          <div class="panel-body">
                              <form role="form" onSubmit="return false;"  >
                                  <div class="form-group">
                                      <label for="eventTitle">Event Title</label>
                                       <select class="form-control input-lg " id="eveId">
                                            <option value="null" >Select</option>
                                           <?php 
                                           require "db.php";
                                           $sq = mysqli_query($con , "SELECT * FROM toyota_events");
                                           while($qw = mysqli_fetch_assoc($sq)){
                                           ?>
                                             
                                             
                                              <option value="<?php echo $qw['id'] ;?>"><?php echo $qw['title'] ;?> </option>
                                           <?php } ?>
                                          </select>
                                  </div>
                                 
                                 
                                 
                                 
                                    <div class="form-group">
                                    
                                      
                                     
                                  </div>
                                 
                                  <button style="margin-top:30px;" id="btnSendEvent" type="submit" class="btn btn-primary">Send Event</button>
                              </form>

                          </div>
                      </section>
                  </div>
             </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
     
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <script type="text/javascript" src="js/bootstrap-dialog.min.js"></script>
    <script src="js/jquery.toast.js"></script>
    <script src="js/jquery.blockUI.js"></script>
    <script src="js/customeQuery.js"></script>


  </body>
</html>
