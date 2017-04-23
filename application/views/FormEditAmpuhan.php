<body>
<!-- Form tambah akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Edit Ampuhan</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
				$i=0;
			?>
			<h4>Nama :<?php echo $data_guru->nama;?></h4>
			<h4>NIP :<?php echo $data_guru->nip;?></h4>
			
			<table class="table">
				<thead>
					<th>NO</th>
					<th>Kode</th>
					<th>Mata Pelajaran</th>
					<th>Menu</th>
				</thead>
				<tbody>
				<form>
				<input type="hidden" name="url" value="<?php echo current_url();?>">
				<?php 
				foreach ($data_ampuhan as $key=>$row){?>
					<tr>
						<?php $i=$key+2;?>
						<td><?php echo $key+1;?></td>
						<td><?php echo $row->kode_guru;?></td>
						<td><?php echo $row->nama_pelajaran;?></td>
						<td><button formmethod="post" formaction="<?php echo base_url('guru/deleteampuhan');?>" name="kode" value="<?php echo $row->kode_guru;?>">Hapus</button></td>
					</tr>
				<?php }?>
					<tr>
						<td><?php echo $i ;?></td>
						<td><input class="form-control" type="text" name="kodeguru"></td>
						<td>
							<select class="form-control" name="mapel">
							<?php 
							if (isset($daftar_mapel)){
								foreach ($daftar_mapel as $row){
								echo '<option value="'.$row->id_pelajaran.'">'.$row->nama_pelajaran.'</option>';
								}
							}
							?>
							</select>
						</td>
						<input type="hidden" name="submit" value="submit">
						<input type="hidden" name="nip" value="<?php echo $data_guru->nip;?>">
						<td><button formmethod="post" formaction="<?php echo base_url('guru/editampuhan/'.$data_guru->nip)?>"> Tambah </button></td>
					</tr>
				</form>
				</tbody>
			</table>
		</div>
	</div>
</body>
