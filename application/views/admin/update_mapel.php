<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SIMN Smada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
	<link href="<?php echo base_url() ?>public/css/bootstrap.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>public/js/bootstrap.js"></script>
	
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo base_url() ?>public/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SIMN Smada</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url() ?>wonggundul/panel_admin">Home</a></li>
			  <li class="active"><a href="<?php echo base_url() ?>wonggundul/logout">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->

      <!-- Example row of columns -->
      <div class="hero-unit">
		<h3>Data Mapel</h3><br/><br/>
		<?php 		
			$form = array(
				'method' => 'post'
			);
			
			echo form_open('mapel/update_mapel', $form);
		?>
		<?php 
			foreach($mapel as $pel) {
				$id = $pel->id_mapel;
				$nama = $pel->nama_mapel;
				$kode = $pel->kode_mapel;
				$kkm = $pel->kkm_mapel;
			}
		?>
		
		<table border="0" cellpadding="5" cellspacing="0">
		<tbody>
		<tr>
			<td class="span2">Kode Mapel</td>
			<td>:</td>
			<td>
				<input name="kode" value="<?php echo $kode ?>" type="text" id="kode" size="30" required="required"/>
				<input name="id" value="<?php echo $id ?>" type="hidden" />
			</td>
		</tr>
		<tr>
			<td>Nama Mapel</td>
			<td>:</td>
			<td><input name="nama" value="<?php echo $nama ?>" type="text" id="nama_depan" size="30" required="required"/></td>
		</tr>
		<tr>
			<td>KKM Mapel</td>
			<td>:</td>
			<td><input name="kkm" value="<?php echo $kkm ?>" type="text" id="nama_depan" size="30" required="required"/></td>
		</tr>
		<tr>
			<td colspan="3">
				<button class="btn btn-large btn-primary" type="submit">Submit</button>
				<button class="btn btn-large" type="reset">Reset</button>
				
			</td>
		</tr>
		</tbody>
		</table>
		<?php echo form_close(); ?>
      </div>

      <hr>

      <footer>
        <p>Copyright &copy; ERA 2014</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>public/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap-typeahead.js"></script>

  </body>
</html>
