<body>
<!-- Tabel akun -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Kenaikan Kelas</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#lama">Kelas Sekarang</a></li>
    <li><a data-toggle="tab" href="#baru">Kelas Baru</a></li>
</ul>

  <div class="tab-content">
    <div id="lama" class="tab-pane fade in active">
      <table class="table">
      <tr>
      	<td>X :</td>
      	<td>
     <?php 
     if (isset($daftar_kelas)){
     	foreach ($daftar_kelas['satu'] as $row){?>
     	
     	<a href="<?php echo base_url('kelas/naikkelas/l/'.$row->nama_kelas); ?>"><button class="btn kelasl"><?php echo $row->nama_kelas;?></button></a>
     	
     	<?php }?>
     	</td>
     </tr>
     
     <tr>
     	<td>XI :</td>
     	<td>
     <?php foreach ($daftar_kelas['dua'] as $row){?>
     	
     	<a href="<?php echo base_url('kelas/naikkelas/l/'.$row->nama_kelas); ?>"><button class="btn kelasl"><?php echo $row->nama_kelas;?></button></a>
     	
     	<?php }?>
     	</td>
     </tr>
     
     <tr>
     	<td>XII :</td>
     	<td>
     <?php foreach ($daftar_kelas['tiga'] as $row){?>
     	
     	<a href="<?php echo base_url('kelas/naikkelas/l/'.$row->nama_kelas); ?>"><button class="btn kelasl"><?php echo $row->nama_kelas;?></button></a>
     	<?php }?>
     	</td>
     </tr>
     
     <?php }?>
     </table>
    </div>
    
    <div id="baru" class="tab-pane fade">
            <table class="table">
      <tr>
      	<td>XI :</td>
      	<td>
     <?php 
     if (isset($daftar_kelas)){
     	foreach ($daftar_kelas['dua'] as $row){?>
     	
     	<a href="<?php echo base_url('kelas/naikkelas/b/'.$row->nama_kelas); ?>"><button class="btn kelasl"><?php echo $row->nama_kelas;?></button></a>
     	
     	<?php }?>
     	</td>
     </tr>
     
     <tr>
     	<td>XII :</td>
     	<td>
     <?php foreach ($daftar_kelas['tiga'] as $row){?>
     	
     	<a href="<?php echo base_url('kelas/naikkelas/b/'.$row->nama_kelas); ?>"><button class="btn kelasl"><?php echo $row->nama_kelas;?></button></a>
     	
     	<?php }?>
     	</td>
     </tr>
     
     <tr>
     	<td>Lulus :</td>
     	<td>
     	<a href="<?php echo base_url('kelas/naikkelas/b/lulus'); ?>"><button class="btn kelasl">Lulus</button></a>
     	</td>
     </tr>
     
     <?php }?>
     </table>
    </div>
  </div>
		</div>
	</div>
</body>

