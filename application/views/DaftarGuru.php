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
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-nip="<?php echo $row->nip; ?>" data-nama="<?php echo $row->nama; ?>">Delete</button>
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#resetModal" data-nip="<?php echo $row->nip; ?>" data-nama="<?php echo $row->nama; ?>">Reset Password</button>
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
</body>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
      </div>
      <div class="modal-body">
      Apakah anda yakin ingin menghapus data <span class="nama"></span>(<span class="nip"></span>) ?
      Semua data yang berhubungan dengan akun yang bersangkutan juga akan dihapus 
      </div>
      <div class="modal-footer">
      <form action="<?php echo base_url('guru/deleteguru'); ?>" method="post">
      	<input type="hidden" class="nip" name="nip"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus Data</button>
       </form>
      </div>
    </div>
  </div>
</div>
<!-- /.Modal -->
<!-- Modal -->
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
      </div>
      <div class="modal-body">
      Apakah anda yakin ingin mereset password ?
      Password yang direset akan disamakan dengan NIP. Segera ganti password untuk keamanan akun!  
      </div>
      <div class="modal-footer">
      <form action="<?php echo base_url('akun/resetpassword'); ?>" method="post">
      	<input type="hidden" class="nip" name="id"/>
      	<input type="hidden" name="url" value="<?php echo current_url();?>"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning">Reset Password</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- /.Modal -->
<!-- /.Tabel akun -->
<!-- jQuery -->


<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready( function () {
	$('#dataTables-example').DataTable({
		"lengthChange": false
	});
	$('#deleteModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var nip = button.data('nip') // Extract info from data-* attributes
		  var nama = button.data('nama') 
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.nama').text(nama)
		  modal.find('.nip').text(nip)
		  modal.find('input','.nip').val(nip)
		})
	$('#resetModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var nip = button.data('nip') // Extract info from data-* attributes
		  var nama = button.data('nama') 
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.nama').text(nama)
		  modal.find('.nip').text(nip)
		  modal.find('input','.nip').val(nip)
		})
});
</script>

