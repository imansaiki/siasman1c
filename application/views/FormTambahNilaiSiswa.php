<body>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 class="page-header">Nilai Siswa</h1>
				</div>
			</div>
			<?php 
				if($this->session->flashdata('message')){
					echo $this->session->flashdata('message');
				}
			?>
			<?php if (isset($X_1)){
			foreach ($X_1 as $row){
				echo 'aaa';
			}
			}?>
		</div>
	</div>
</body>