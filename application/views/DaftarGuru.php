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
								<td><a href="<?php echo base_url('guru/dataguru/'.$row->nip);?>">Detail</a></td>
							</tr>
						<?php 
							}
						}
						?>
						</tbody>
					</table>
				
			</div>
		</div>
	</div>
<!-- /.Tabel akun -->
<!-- jQuery -->


<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready( function () {
	$('#dataTables-example').DataTable();
} );
</script>

</body>