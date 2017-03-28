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
			<form method="post" action="<?php echo base_url('kelas/naikkelas');?>">
				<table class="table">
					<thead>
						<tr>
							<th>NO</th>
							<th>nis</th>
							<th>nama</th>
							<th>status</th>
							<th>kelas</th>
						</tr>
					</thead>
					<tfoot>
			<?php 
			$daftar[1]=$satu;
			$daftar[2]=$dua;
			$daftar[3]=$tiga;
			$daftar[4]=array('lulus');
			if(isset($daftar_siswa)){
				foreach ($daftar_siswa as $key=>$n){
					$no=1+$key;
					echo '<tr>';
					echo 	'<td>'.$no.'</td>';
					echo 	'<td>'.$n['nis'].'</td>';
					echo 	'<td>'.$n['nama'].$n['eval'].'</td>';
					if ($n['eval']>=5){
						echo 	'<td> Tinggal Kelas </td>';
						echo 	'<td><select name="kelas[]">';
										foreach ($daftar[intval($detail_kelas->tingkat)] as $row){
											echo '<option value="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
										}
						echo			'</select>';
						echo	'</td>';
					}else {
						echo 	'<td> Naik Kelas </td>';
						echo 	'<td><select name="kelas[]">';
										foreach ($daftar[intval($detail_kelas->tingkat)+1] as $row){
											echo '<option value="'.$row->nama_kelas.'">'.$row->nama_kelas.'</option>';
										}
						echo			'</select>';
						echo	'</td>';	
					}
					echo '</tr>';
				}
			}?>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
</body>