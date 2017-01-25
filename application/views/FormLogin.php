
<body>

<!-- Formlogin -->
	<div id="page-wrapper">
		<div class="container-fluid">
		<?php 
			if($this->session->flashdata('message')){
				echo $this->session->flashdata('message');
			}else{
				echo '<div style="padding-top: 81px;"></div>';
			}
		?>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-info" >
				<div class="panel-heading ">Sistem Informasi Akademik SMA Negeri 1 Cilacap</div>
				<div class="panel-body">
					<form method="post" action="<?php echo base_url('Akun/login');?>" >
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user "></i></span>
							<input class="form-control" placeholder="nip / nis"  name="id" type="text" />
						</div>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
							<input class="form-control" placeholder="password" name="password" type="password" />
						</div>
							<input type=hidden name="submit" value=TRUE>
							<button type="submit" id="submit" class="form-control btn-primary"><i class="fa fa-chevron-right "></i> Login</button>
					</form>
				</div>
				</div>
			</div>
		</div>
		</div>
	</div>
<!-- Formlogin -->

</body>

<script>
  $('#submit').on('click', function () {
    $(this).button('loading')
  })
</script>