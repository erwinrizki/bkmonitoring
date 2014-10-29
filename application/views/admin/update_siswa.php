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
	<link rel="stylesheet" href="<?php echo base_url() ?>public/css/datepicker.css">
	<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
	<script src="<?php echo base_url() ?>public/js/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>public/js/bootstrap-datepicker.js"></script>
	<style>
	.datepicker{z-index:1151;}
	</style>
	<script>
		jQuery(function($){
		    $("#tanggal").datepicker({
			format:'yyyy-mm-dd'
		    });
                });
	</script>
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
		<h3>Data Siswa</h3><br/><br/>
        <?php 
			$form = array(
				'method' => 'post'
			);
			
			echo form_open('Siswa/update_siswa');
		?>
		<?php 
			foreach($siswa as $siswaa) {
				$id = $siswaa->id_siswa;
				$induk = $siswaa->no_induk_siswa;
				$nama = $siswaa->nama_siswa;
				$alamat = $siswaa->alamat_siswa;
				$tempat = $siswaa->tempat_lahir_siswa;
				$tgl = $siswaa->tanggal_lahir_siswa;
				$ortu = $siswaa->nama_ortu;
				$hp = $siswaa->no_hp_ortu;
				$kelassiswa = $siswaa->id_kelas;
				$semester = $siswaa->semester;
			}
		?>
		<center>
		<table border="0" cellpadding="5" cellspacing="0">
		<tbody>
		<tr>
			<td class="span2">No Induk Siswa</td>
			<td>:</td>
			<td>
				<input name="induk" value="<?php echo $induk; ?>" type="text" id="induk" size="30" required="required"/>
				<input name="id" value="<?php echo $id; ?>" type="hidden" />
			</td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td>:</td>
			<td><input name="nama" value="<?php echo $nama; ?>" type="text" id="nama_depan" size="30" required="required"/></td>
		</tr>
		<tr>
			<td>Alamat Siswa</td>
			<td>:</td>
			<td><input name="alamat" value="<?php echo $alamat; ?>" type="text" size="20" required="required"/></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td>
				<input name="tempat_lahir" value="<?php echo $tempat; ?>" type="text" id="tempat_lahir" size="20" required="required"/>
			</td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td>:</td>
			<td><input type="text" id="tanggal" value="<?php echo $tgl; ?>" name="tanggal" required="required"></td>
		</tr>
		<tr>
			<td>Nama Ortu</td>
			<td>:</td>
			<td><input name="ortu" value="<?php echo $ortu; ?>" type="text" id="ortu" size="60" required="required"/></td>
		</tr>
		<tr>
			<td>No HP Ortu</td>
			<td>:</td>
			<td><input name="nohp" value="<?php echo $hp; ?>" type="text" id="norek" size="15" required="required"/></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td>
				<select name="kelas">
					<?php 
						foreach($kelas as $kls) {
							$id_kelas = $kls->id_kelas;
							$nama_kelas = $kls->nama_kelas;
							
							if($kelassiswa == $id_kelas) {
					?>
								<option value="<?php echo $id_kelas ?>" selected><?php echo $nama_kelas ?></option>
					<?php
							} else {
					?>
								<option value="<?php echo $id_kelas ?>"><?php echo $nama_kelas ?></option>
					<?php
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td>
				<select name="semester" required="required">
					<option value="">Pilih Semester</option>
					<option value="1" <?php if($semester == 1) echo "selected" ?>>1</option>
					<option value="2" <?php if($semester == 2) echo "selected" ?>>2</option>
					<option value="3" <?php if($semester == 3) echo "selected" ?>>3</option>
					<option value="4" <?php if($semester == 4) echo "selected" ?>>4</option>
					<option value="5" <?php if($semester == 5) echo "selected" ?>>5</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<center>
				<button class="btn btn-large btn-primary" type="submit">Submit</button>
				<button class="btn btn-large" type="reset">Reset</button>
				</center>
			</td>
		</tr>
		</tbody>
		</table>
		</center>
		<?php echo form_close(); ?>
      </div>

      <hr>

      <footer>
        <p>Copyright &copy; ERA 2014</p>
      </footer>

    </div> <!-- /container -->
	<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
	<script src="<?php echo base_url() ?>public/js/bootstrap-modal.js"></script>
	<script src="<?php echo base_url() ?>public/js/bootstrap-transition.js"></script>
	<script src="<?php echo base_url() ?>public/js/bootstrap-datepicker.js"></script>

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
