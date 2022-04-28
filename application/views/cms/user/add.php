<?php $this->load->view('cms/shared/head'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 menu-bar">
				<?php $this->load->view('cms/shared/menu'); ?>
			</div>
			<div class="col-lg-10 content">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-0">User</h3><small>Tambah Data</small>
					</div>
					<div class="col-lg-6 text-right">
						<a class="btn btn-primary" href="<?php echo base_url().'cms/user'; ?>">Lihat Data</a>
					</div>
				</div>
				<hr>
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<?php echo form_open_multipart(base_url().'cms/user/add'); ?> 
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
							<div class="form-group">
								<label>Fullname</label>
								<input type="text" class="form-control" name="fullname" value="<?php echo isset($fullname)?$fullname:''; ?>" required>
							</div> 
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="email" value="<?php echo isset($email)?$email:''; ?>" required>
							</div> 
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required>
								<small class="form-text text-muted">Kata sandi harus 8 karakter termasuk 1 huruf besar, 1 huruf kecil dan karakter numerik</small>
								<input type="checkbox" onclick="myFunction()">Show Password
							</div> 
							<script>
								function myFunction() {
									var x = document.getElementById("password");
									if (x.type === "password") {
										x.type = "text";
									} else {
										x.type = "password";
									}
								}
						</script>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" class="form-control" name="confirm_password" required>
								<small class="form-text text-muted">Harus sama dengan password</small>
							</div>
							<div class="form-group">
								<label>Role</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="role" id="role1" value="1" <?php
									if(isset($role) && $role==1){
										echo 'checked';
									}
									?>>
									<label class="form-check-label" for="role1">
										Admin
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="role" id="role2" value="2" <?php
									if(isset($role) && $role==2){
										echo 'checked';
									}
									?>>
									<label class="form-check-label" for="role2">
										Penulis
									</label>
								</div>
							</div>
							<div class="form-group">
								<label>Status</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="status1" value="1" <?php
									if(isset($status) && $status==1){
										echo 'checked';
									}
									?>>
									<label class="form-check-label" for="status1">
										Aktif
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="status" id="status2" value="0" <?php
									if(isset($status) && $status==0){
										echo 'checked';
									}
									?>>
									<label class="form-check-label" for="status2">
										Tidak Aktif
									</label>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" name="simpan" value="Simpan" class="btn btn-danger">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('cms/shared/footer'); ?>