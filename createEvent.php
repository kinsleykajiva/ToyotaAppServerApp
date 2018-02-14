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
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Create Events </h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="">Events</a></li>
						<li><i class="fa fa-bars"></i>Create Event</li>
						
					</ol>
				</div>
			</div>
              <!-- page start-->
             <div class="row">
                  <div class="col-lg-6">
                      <section class="panel">
                          <header class="panel-heading">
                              Event Information
                          </header>
                          <div class="panel-body">
                              <form role="form" onSubmit="return false;" id="eventForm" >
                                  <div class="form-group">
                                      <label for="eventTitle">Event Title</label>
                                      <input type="text" class="form-control" id="eventTitle" placeholder="Enter Title or Name">
                                  </div>
                                   <div class="form-group">
                                      <label for="eventTime">Event Time</label>
                                      <input type="text" class="form-control" id="eventTime" placeholder="Enter Time">
                                  </div>
                                   <div class="form-group">
                                      <label for="eventDate">Event Date</label>
                                      <input type="text" class="form-control" id="eventDate" placeholder="Enter Date">
                                  </div>
                                 
                                  <div class="form-group">
                                      <label for="eventImage">Image</label>
                                      <input type="file" accept=".png , .jpg , .svg" id="eventImage">
                                   
                                  </div>
                                    <div class="form-group">
                                      <label for="eventDescription">Event Descriptions</label>
                                      <textarea class="form-control eventDescription" id="eventDescription" placeholder="Full Descriptions"></textarea>
                                     
                                  </div>
                                 
                                  <button id="btnSaveEvent" type="submit" class="btn btn-primary">Save</button>
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

      <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
        <script type="text/javascript">

          CKEDITOR.replace('eventDescription');  
            
        </script>


  </body>
</html>
