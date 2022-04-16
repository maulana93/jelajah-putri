<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
			</div>
			<div class="col-lg-10 content">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-0">Banner</h3><small>List Data</small>
					</div>
					<div class="col-lg-6 text-right">
						<a class="btn btn-primary" href="<?php echo base_url().'cms/banner/add'; ?>">Tambah Data</a>
					</div>
				</div>
				<table class="table table-bordered"> 
					<thead> 
						<tr> 
							<th>No</th>
							<th>Judul</th>
							<th>Image</th>
							<th>Url</th>
							<th>Status</th>
							<th>Opsi</th>
						</tr> 
					</thead> 
					<tbody>
						<?php
							if($lists){
								$no = 1;
								foreach ($lists as $key => $value){
									$status = 'Aktif';
									if($value['status'] == 0){
										$status = 'Tidak Aktif';
									}
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $value['title']; ?></td>
									<td><img style="width: 100px;" class="img-fluid" src="<?php echo base_url().$value['image']; ?>"></td>
									<td><?php echo $value['url']; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<a class="btn btn-small btn-warning" href="<?php echo base_url().'cms/banner/edit/'.$value['id']; ?>">Edit</a>
										<a class="btn btn-warning" href="<?php echo base_url().'cms/banner/delete/'.$value['id']; ?>">Hapus</a>
									</td>
								</tr> 
								<?php
									$no++;
								}
							}
							else {
								?>
								<tr>
									<td colspan="5">Tidak Ada Data</td>
								</tr> 
								<?php
							}
						?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $this->load->view('cms/shared/footer'); ?>