<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
			</div>
			<div class="col-lg-10 content">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-0">Category</h3><small>List Data</small>
					</div>
					<div class="col-lg-6 text-right">
						<a class="btn btn-primary" href="<?php echo base_url().'cms/category/add'; ?>">Tambah Data</a>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered" id="myDataTables"> 
						<thead> 
							<tr> 
								<th>No</th>
								<th>Judul</th>
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
										<td><?php echo $status; ?></td>
										<td>
											<a class="btn btn-small btn-warning" href="<?php echo base_url().'cms/category/edit/'.$value['id']; ?>">Edit</a>
											<a class="btn btn-danger" onClick="javascript: return confirm('Yakin ingin hapus data');" href="<?php echo base_url().'cms/category/delete/'.$value['id']; ?>">Hapus</a>
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
	</div>
<?php $this->load->view('cms/shared/footer'); ?>