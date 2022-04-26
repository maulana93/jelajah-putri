<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
			</div>
			<div class="col-lg-10 content">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-0">Image</h3><small>List Data</small>
					</div>
					<div class="col-lg-6 text-right">
						<a class="btn btn-primary" href="<?php echo base_url().'cms/image/add'; ?>">Tambah Data</a>
					</div>
				</div>
				<div class="table-responsive">
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
										<td><input class="form-control" type="text" value="<?php echo base_url().$value['image']; ?>" id="myInput" readonly></td>
										<td><img style="width: 300px;" class="img-fluid" src="<?php echo base_url().$value['image']; ?>">			
										<td>
											<script>
												function myFunction() {
													/* Get the text field */
													var copyText = document.getElementById("myInput");

													/* Select the text field */
													copyText.select();
													copyText.setSelectionRange(0, 99999); /* For mobile devices */

													/* Copy the text inside the text field */
													navigator.clipboard.writeText(copyText.value);

													/* Alert the copied text */
													alert("Link image berhasil dicopy");
												}
											</script>
											<button class="btn btn-small btn-success" onclick="myFunction()">Copy link image</button>
											<a class="btn btn-small btn-warning" href="<?php echo base_url().'cms/image/edit/'.$value['id']; ?>">Edit</a>
											<a class="btn btn-danger" onClick="javascript: return confirm('Yakin ingin hapus data');" href="<?php echo base_url().'cms/image/delete/'.$value['id']; ?>">Hapus</a>
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