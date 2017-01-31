<body>
<!-- Tabel akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Data Siswa</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<?php if (isset($data_siswa)){?>
			<table class="table">
					<tr>
						<td>NIS</td>
						<td>:</td>
						<td><?php echo $data_siswa->nis;?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo $data_siswa->nama;?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?php echo $data_siswa->kelamin;?></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td><?php echo $data_siswa->tempat_lahir;?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td><?php echo $data_siswa->tanggal_lahir;?></td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td id="agama"></td>
					</tr>
					<tr>
						<td>Nama Ayah</td>
						<td>:</td>
						<td id="namaayah"></td>
					</tr>
					<tr>
						<td>Nama Ibu</td>
						<td>:</td>
						<td id="namaibu"></td>
					</tr>
					<tr>
						<td>Pendidikan Ayah</td>
						<td>:</td>
						<td id="pendidikanayah"></td>
					</tr>
					<tr>
						<td>Pendidikan Ibu</td>
						<td>:</td>
						<td id="pendidikanibu"></td>
					</tr>
					<tr>
						<td>Pekerjaan Ayah</td>
						<td>:</td>
						<td id="pekerjaanayah"></td>
					</tr>
					<tr>
						<td>Pekerjaan Ibu</td>
						<td>:</td>
						<td id="pekerjaanibu"></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td id="alamat"></td>
					</tr>
					<tr>
						<td>Asal Sekolah</td>
						<td>:</td>
						<td id="asalsekolah"></td>
					</tr>
					<tr>
						<td>Kewarganegaraan</td>
						<td>:</td>
						<td id="kewarganegaraan"></td>
					</tr>
				</table>
				<?php }?>
		</div>
	</div>
<!-- /.Tabel akun -->
<!-- jQuery -->


</body>