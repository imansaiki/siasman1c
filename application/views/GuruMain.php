<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header" >Guru</h1>
				</div>
			</div>
			<?php 
				$message=$this->session->flashdata('message');
				if (!empty($message)){
					echo $message;
				}
			?>
			<a href="<?php echo base_url('guru/tambahguru');?>">Tambah Guru</a><br>
			<a href="<?php echo base_url('guru/daftarguru');?>">Data Guru</a><br>
		</div>
	</div>
</body>