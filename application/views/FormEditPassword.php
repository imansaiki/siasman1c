<body>

<!-- Formlogin -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Ganti Password</h1>
				</div>
			</div>
			<?php 
				$message=$this->session->flashdata('message');
				if (!empty($message)){
					echo $message;
				}
			?>
			<div class="row">
				
					<form method="post" action="<?php echo base_url('Akun/editPassword');?>" >
						<div class="form-group">
							<label>Password Lama</label>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user "></i></span>
								<input class="form-control" placeholder="nip / nis"  name="oldpassword" type="password" />
							</div>
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
								<input class="form-control" placeholder="password" name="newpassword" type="password" />
							</div>
						</div>
						<div class="form-group">
							<label>Konfirmasi Password Baru</label>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
								<input class="form-control" placeholder="password" name="newpasswordconfirm" type="password" />
							</div>
						</div>
							<input type=hidden name="submit" value=TRUE>
							<button type="submit" class="form-control btn-primary"><i class="fa fa-chevron-right "></i> Ganti Password</button>
					</form>	
				
			</div>
		</div>
	</div>
<!-- Formlogin -->

</body>
