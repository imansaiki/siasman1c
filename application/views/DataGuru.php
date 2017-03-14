<body>
<!-- Tabel akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Data guru</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<?php if (isset($data_guru)){?>
			<table class="table">
					<tr>
						<td>NIS</td>
						<td>:</td>
						<td><?php echo $data_guru->nip;?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $data_guru->nama;?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?php echo $data_guru->kelamin;?></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td><?php echo $data_guru->tempat_lahir;?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td><?php echo $data_guru->tanggal_lahir;?></td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td><?php echo $data_guru->agama;?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $data_guru->alamat;?></td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td>:</td>
						<td><?php echo $data_guru->pendidikan_studi;?></td>
					</tr>
					<tr>
						<td>Tingkat Pendidikan</td>
						<td>:</td>
						<td><?php echo $data_guru->pendidikan_tingkat;?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $data_guru->email;?></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td><?php echo $data_guru->telepon;?></td>
					</tr>
					<tr>
						<td>Kewarganegaraan</td>
						<td>:</td>
						<td><?php echo $data_guru->kewarganegaraan;?></td>
					</tr>
				</table>
				<?php }?>
		</div>
	</div>
<!-- /.Tabel akun -->
<!-- jQuery -->


</body>