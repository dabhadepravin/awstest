<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Advance Media: Advertisers & Publishers</title>
<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>public/css/jquery.bootgrid.min.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
 <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>public/css/application.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>public/css/daterangepicker-bs3.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url()?>public/css/jquery.growl.css" />
<link href="<?php echo site_url()?>public/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo site_url()?>public/css/style.css" rel="stylesheet">
<script type="text/javascript">
		var site_url = "<?php echo site_url() ?>";
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url()?>public/js/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url()?>public/js/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo site_url()?>public/js/jquery.growl.js"></script>
	<script src="<?php echo site_url()?>public/js/application.js"></script>
<!--[if lt IE 9]>
        <script src="<?php echo site_url()?>public/js/html5shiv.js"></script>
        <script src="<?php echo site_url()?>public/js/respond.min.js"></script>
<![endif]-->
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
      <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#"> <img src="<?php echo site_url()?>public/images/logo.png" alt=""> </a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php

    	$utype = $this->session->userdata('user_type');
    
    	if($utype==1){
			$this->view("navigation/adv_navigation");		
    	} elseif($utype == 2){
    		$this->view("navigation/admin_navigation");		
    	} else {
    		echo "dd";
    		$this->view("navigation/default_navigation");		
    	}
   
    ?>	
     </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container --> 
</nav>
