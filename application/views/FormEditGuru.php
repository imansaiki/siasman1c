<body>
<!-- Form tambah akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Edit Guru</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<?php 
			if (isset($data_guru)){?>
			<form class="form-horizontal" action="<?php echo base_url('guru/editguru/'.$data_guru->nip);?>" method="post">
				<div class="form-group">
					<label class="control-label col-md-1" for="nip">NIP</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->nip;?>" class="form-control" placeholder="nip"  name="nip" type="text" readonly />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="nama">Nama</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->nama;?>" class="form-control" placeholder="nama"  name="nama" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tmptlahir">Tempat Lahir</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->tempat_lahir;?>" class="form-control" placeholder="Tempat Lahir"  name="tmptlahir" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tgllahir">Tanggal Lahir</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->tanggal_lahir;?>" class="form-control" placeholder="Tanggal Lahir"  name="tgllahir" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="jkelamin">Jenis Kelamin</label>
					<div class="col-md-11" >
						<div class="radio">
  							<label><input <?php if($data_guru->kelamin == 'Pria'){ echo 'checked="checked"';}?> type="radio" name="jkelamin" value="Pria">Pria</label>
						</div>
						<div class="radio">
  							<label><input <?php if($data_guru->kelamin == 'Wanita'){ echo 'checked="checked"';}?> type="radio" name="jkelamin" value="Wanita">Wanita</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="alamat">Alamat</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->alamat;?>" class="form-control" placeholder="Alamat"  name="alamat" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="agama">Agama</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->agama;?>" class="form-control" placeholder="Agama"  name="agama" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="telepon">Telepon</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->telepon;?>" class="form-control" placeholder="Telepon"  name="telepon" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="email">Email</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->email;?>" class="form-control" placeholder="Email"  name="email" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="tktpd">Tingkat Pendidikan</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->pendidikan_tingkat;?>" class="form-control" placeholder="Tingkat Pendidikan"  name="tktpd" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="jurpd">Jurusan</label>
					<div class="col-md-11" >
						<input value="<?php echo $data_guru->pendidikan_studi;?>" class="form-control" placeholder="Jurusan"  name="jurpd" type="text" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-1" for="kwnegara">Kewarganegaraan</label>
					<div class="col-md-11" >
						<div class="radio">
  							<label><input <?php if($data_guru->kewarganegaraan == 'WNI'){ echo 'checked="checked"';}?> type="radio" name="kwnegara" value="WNI">WNI</label>
						</div>
						<div class="radio">
  							<label><input <?php if($data_guru->kewarganegaraan == 'WNA'){ echo 'checked="checked"';}?> type="radio" name="kwnegara" value="WNA">WNA</label>
						</div>
					</div>
				</div>
		
				<div class="form-group">
					<div class="col-md-2">
						<input type="hidden" name="submit" value="submit" class="form-control">
						<input type="submit" value="kirim" class="form-control btn-primary">
					</div>
				</div>
			</form>
			<?php }?>
		</div>
	</div>
</body>
