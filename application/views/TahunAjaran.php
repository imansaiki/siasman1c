<body>
<!-- Form tambah akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Tahun Ajaran</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
					<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-info" >
				<div class="panel-heading ">Kelola Tahun Ajaran</div>
				<div class="panel-body">
					<form method="post" action="<?php echo base_url('jadwal/tahunajaran');?>" >
					
						<div>
							<strong>Tahun Ajaran : <?php echo substr($tahun_ajar,0,4).'/'.substr($tahun_ajar,4,4);?></strong>
							<input type=hidden name="thnajar" value="<?php echo $tahun_ajar;?>">
						</div>
						<div>
							<strong>Semester : <?php echo $semester;?></strong>
							<input type=hidden name="semester" value="<?php echo $semester;?>">
						</div>
					
				</div>
				<div class="panel-footer">
					<input type=hidden name="submit" value="submit">
					<button type="submit" id="submit" class="form-control btn-primary"><i class="fa fa-chevron-right "></i> Ganti Semester</button>
				</div>
				</div>
					</form>
			</div>
		</div>
		</div>
	</div>
</body>