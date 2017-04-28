<body>
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<!-- Tabel akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Daftar Siswa <?php echo $kelas ;?></h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<form action="">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th class="col-md-1">NO</th>
						<th class="col-md-1">NIS</th>
						<th class="col-md-5">Nama</th>
						<th class="col-md-1">Kelamin</th>
						<th class="col-md-4">Menu</th>
					</tr>
				</thead>
				<tbody>
				
			<?php 
				foreach ($daftar_siswa as $key=>$row){?>
					<tr>
						<td><?php echo $nis=$key+1;?></td>
						<td><?php echo $nis=$row->nis;?></td>
						<td><?php echo $row->nama;?></td>
						<td><?php echo $row->kelamin;?></td>
						<td>
							<a href="<?php echo base_url('siswa/datasiswa/'.$nis);?>"><button type="button" class="btn btn-primary">Detail</button></a>
							<?php 
							if (($this->session->userdata('level')=='guru') || ($this->session->userdata('level')=='admin')){?>
							<a href="<?php echo base_url('nilai/lihatnilai/'.$nis)?>"><button type="button" class="btn btn-info" >Nilai</button></a>
							<?php 
							}if(($this->session->userdata('level')=='admin')){?>
							<button class="btn btn-danger" formaction="<?php echo base_url('siswa/deletesiswa');?>" formmethod="post" name="nis" value="<?php echo $nis;?>" onclick="alert('Apakah anda yakin ingin menghapus data? Semua data nilai dan kelas juga akan dihapus')">Delete</button>
							<button class="btn btn-warning" formaction="<?php echo base_url('akun/resetpassword');?>" formmethod="post" name="id" value="<?php echo $nis;?>" >Reset Password</button>
							<?php 
							}?>
						</td>
					</tr>
			<?php }?>
			
				</tbody>
			</table>
			<input type="hidden" value="<?php echo current_url() ;?>" name="url">
			</form>
		</div>
	</div>
<!-- /.Tabel akun -->
<!-- jQuery -->


<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready( function () {
	$('#dataTables-example').DataTable({
		"searching": false,
		"lengthChange": false
	});
} );
</script>

</body>