<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SIMN Smada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url() ?>public/theme/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo base_url() ?>public/theme/bootstrap.min.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>public/theme/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#mapel").change(function(){
			var mapel = $("#mapel").val();
			$.ajax({
				type: "POST",
				url : "<?php echo base_url(); ?>nilai/pilih_kelas",
				data: "mapel=" + mapel,
				beforeSend: function (){
					$("#kelasku").html('Loading...');
				},
				success : function(data) { 
					$("#kelas").html(data);
					$("#kelasku").html('');
				}
			});
			});
		});
	</script>
  </head>
  <body>
		<div class="navbar navbar-default navbar-fixed-top">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">SIMN Smada</a>
		  </div>
		  <div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
			  <li><a href="<?php echo base_url() ?>simn/panel_guru">Home</a></li>
			  <li><a href="<?php echo base_url() ?>simn/logout">Logout</a></li>
			</ul>
		  </div>
		</div>
		
		<div class="container">
			<div class="jumbotron">
				<h2>Input Nilai Siswa</h2><br/><br/>
				<?php 		
					$form = array(
						'method' => 'post',
						'class' => 'form-horizontal'
					);
					
					echo form_open('nilai/input_nilai', $form);
				?>
				
				<fieldset>
					<div class="form-group">
					  <label for="inputEmail" class="col-lg-2 control-label">Pilih Mapel</label>
					  <div class="col-lg-4">
						<select name="mapel" id="mapel" class="form-control">
							<option value="">Pilih Mapel</option>
							<?php 
								foreach($mapel as $mpl) {
									$idm = $mpl->id_mapel;
									$namampl = $mpl->nama_mapel;
							?>
									<option value="<?php echo $idm ?>"><?php echo $namampl ?></option>
							<?php
								}
							?>
						</select>
					  </div>
					</div>
					<div class="form-group">
					  <label for="inputEmail" class="col-lg-2 control-label">Pilih Kelas</label>
					  <div class="col-lg-4">
						<select name="kelas" class="form-control" id="kelas" required="required">
							<option value="">Pilih Kelas</option>
						</select>
						<p id="kelasku"></p>
					  </div>
					</div>
					<div class="form-group">
					  <label for="inputEmail" class="col-lg-2 control-label">Semester</label>
					  <div class="col-lg-4">
						<input type="text" name="semester" class="form-control" id="semester" required="required">
					  </div>
					</div>
					<div class="form-group">
					  <div class="col-lg-10 col-lg-offset-2">
						<button type="submit" class="btn btn-primary">Submit</button>
					  </div>
					</div>
				</fieldset>	
				<?php echo form_close(); ?>
			</div>
			
			<footer>
				<p>Copyright &copy; ERA 2014</p>
			</footer>
		</div>
		
		<script src="<?php echo base_url() ?>public/theme/jquery-1.10.2.min.js"></script>
		<script src="<?php echo base_url() ?>public/theme/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>public/theme/bootswatch.js"></script>
  </body>
</html>