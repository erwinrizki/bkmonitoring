<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>public/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="<?php echo base_url(); ?>public/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">
	  <?php
			if($this->session->flashdata('error') != '') {
	  ?>
			    <center>
				<div class="row-fluid">
					<div class="span4 offset4 alert alert-error">
						<button type="button" class="close" data-dismiss="alert">×</button><?php echo $this->session->flashdata('error') ?>
					</div>
				</div>
				</center>
	  <?php
			}
	  ?>
	  <?php
		$form = array(
			'name' => 'form_login_admin',
			'method' => 'post',
			'class' => 'form-signin'
		);
	  ?>
	  <?php echo form_open('wonggundul/validasi_login_admin', $form); ?>
      <!-- <form class="form-signin"> -->
        <h2 class="form-signin-heading">Login Admin</h2>
        <input type="text" name="user" class="input-block-level" placeholder="Username" required="required">
        <input type="password" name="pass" class="input-block-level" placeholder="Password" required="required">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
      <?php echo form_close(); ?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap-typeahead.js"></script>

  </body>
</html>
