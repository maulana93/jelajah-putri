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
							<h3 class="mb-0">Header Cover</h3><small>Update Data</small>
						</div>
						<div class="col-lg-6 text-right">
							<a class="btn btn-primary" href="<?php echo base_url().'cms/category'; ?>">Lihat Data</a>
						</div>
					</div>
					<hr>
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<?php echo form_open_multipart(base_url().'cms/category/edit'); ?>
							<script>
								$(document).ready(function() {
									setTimeout(function() {
										$("#alert").alert('close');
									}, 2000);
								});
							</script>
							<?php if(!empty($alert)){ ?>                            
								<div class="alert alert-danger fade in show" id="alert" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<?php echo $alert; ?>
								</div>                       
							<?php } ?>
							<input type="hidden" class="form-control" name="id" value="<?php echo isset($id)?$id:''; ?>" readonly> 
							<?php						
							if(isset($lists) && count($lists)>0){
								foreach ($lists as $key => $value){
									?>

									<div class="form-group">
										<label>Judul</label>
										<input type="text" class="form-control" name="title" value="<?php echo isset($value['title'])?$value['title']:''; ?>" required>
									</div>
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" name="description" required><?php echo isset($value['description'])?$value['description']:''; ?></textarea>
									</div>
									<div class="form-group">
										<label>Status</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="status" id="status1" value="1" <?php if(isset($value['status']) && $value['status'] == 1) { echo 'checked'; } ?>>
											<label class="form-check-label" for="status1">
											Aktif
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="status" id="status2" value="0" <?php if(isset($value['status']) && $value['status'] == 0) { echo 'checked'; } ?>>
											<label class="form-check-label" for="status2">
												Tidak Aktif
											</label>
										</div>
									</div>
									<?php
								}
							}
							?>
								<div class="form-group">
									<input type="submit" name="simpan" value="Simpan" class="btn btn-danger">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('cms/shared/footer'); ?>