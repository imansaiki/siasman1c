<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Tambah Nilai</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<?php 
			foreach ($daftar_ampuhan as $key=>$row){?>
			<div class="col-md-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-right">
                                    <div><?php echo $row->nama_kelas;?></div>
                                    <div><?php echo $row->nama_pelajaran;?></div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('nilai/tambahnilai/'.$row->nama_kelas.'/'.$row->kode_guru)?>">
                            <div class="panel-footer">
                                <span class="pull-left">Kelola Nilai</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
			</div>
			<?php }?>
		</div>
	</div>
</body>