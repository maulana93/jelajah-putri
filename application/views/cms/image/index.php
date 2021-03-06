<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 px-0">
				<div class="menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
				</div>
			</div>
			<div class="col-lg-10">
				<div class="content">
					<div class="row">
						<div class="col-lg-6">
							<h3 class="mb-0">Image</h3><small>List Data</small>
						</div>
						<div class="col-lg-6 text-right">
							<a class="btn btn-primary" href="<?php echo base_url().'cms/image/add'; ?>">Tambah Data</a>
						</div>
					</div>
					<table class="table table-bordered" id="myDataTables"> 
						<thead> 
							<tr> 
								<th>No</th>
								<th>Judul</th>
								<th>URL</th>
								<th>Image</th>
								<th>Opsi</th>
							</tr> 
						</thead> 
						<tbody>
							<?php
								if($lists){
									$no = 1;
									foreach ($lists as $key => $value){
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $value['title']; ?></td>
										<td><input class="form-control" type="text" value="<?php echo base_url().$value['image']; ?>" id="myInput<?php echo $key; ?>" readonly></td>
										<td><img style="width: 300px;" class="img-fluid" src="<?php echo base_url().$value['image']; ?>">			
										<td>
											<script>
												function myFunction(key) {
													var copyText = document.getElementById('myInput'+ key)
													copyText.select();
													document.execCommand('copy')

													/* Alert the copied text */
													alert("Link image berhasil dicopy");
												}
											</script>
											<button class="btn btn-small btn-success" onclick="myFunction(<?php echo $key; ?>)">Copy link image</button>
											<a class="btn btn-small btn-warning" href="<?php echo base_url().'cms/image/edit/'.$value['id']; ?>">Edit</a>
											<a class="btn btn-danger" onClick="javascript: return confirm('Yakin ingin hapus data?');" href="<?php echo base_url().'cms/image/delete/'.$value['id']; ?>">Hapus</a>
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