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
			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>NIS</th>
						<th>Nama</th>
						<th>Kelamin</th>
						<th>Menu</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				foreach ($daftar_siswa as $row){?>
					<tr>
						<td><?php echo $nis=$row->nis;?></td>
						<td><?php echo $row->nama;?></td>
						<td><?php echo $row->kelamin;?></td>
						<td><a href="<?php echo base_url('siswa/datasiswa/'.$nis);?>">Detail</a></td>
					</tr>
			<?php }?>
				</tbody>
			</table>
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