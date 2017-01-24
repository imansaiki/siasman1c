<body>
<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<!-- Tabel akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Daftar Siswa</h1>
				</div>
			</div>
			<?php 
				$message=$this->session->flashdata('message');
				if (!empty($message)){
					echo $message;
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
								<th>NIS</th>
								<th>Nama</th>
								<th>Level</th>
								<th>Menu</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
							<tr>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
								<td>AAA</td>
							</tr>
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