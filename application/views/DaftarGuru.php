<body>
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<!-- Tabel akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Daftar Guru</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<div class="row">
				
					<div class="form-group">
						<a  href=<?php echo base_url('Guru/tambahGuru');?>><i class="fa fa-plus "></i> <b>Tambah Guru</b></a>
					</div>
				
			</div>
			<div class="row">
					<form>
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>NIP</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Menu</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if (isset($daftar_guru)){
							foreach ($daftar_guru as $row){
						?>	
						
						
							<tr>
								<td><?php echo $row->nip;?></td>
								<td><?php echo $row->nama;?></td>
								<td><?php echo $row->alamat;?></td>
								<td>
									<a href="<?php echo base_url('guru/dataguru/'.$row->nip);?>"><button type="button" class="btn btn-primary">Detail</button></a>
									<?php 
									if($this->session->userdata('level')=='admin'){?>
									<button class="btn btn-danger" formaction="<?php echo base_url('siswa/deleteguru');?>" formmethod="post" name="nip" value="<?php echo $row->nip;?>" onclick="alert('Apakah anda yakin ingin menghapus data? Semua data ampuhan dan akun juga akan dihapus')">Delete</button>
									<button class="btn btn-warning" formaction="<?php echo base_url('akun/resetpassword');?>" formmethod="post" name="id" value="<?php echo $row->nip;?>" >Reset Password</button>
									<?php }?>
								</td>
							</tr>
						<?php 
							}
						}
						?>
						</tbody>
					</table>
					</form>
			</div>
		</div>
	</div>
<!-- /.Tabel akun -->
<!-- jQuery -->


<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready( function () {
	$('#dataTables-example').DataTable({
		"lengthChange": false
	});
} );
</script>

</body>