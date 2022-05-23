<?php $this->load->view('cms/shared/head'); ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('#category').change(function(){
				var id_category = $('#category').val();
				if(id_category == 4){
					$("#formOpini").show();
				} else {
					$("#formOpini").hide();
				}
			})
		});
	</script>
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
							<h3 class="mb-0">Content</h3><small>Update Data</small>
						</div>
						<div class="col-lg-6 text-right">
							<a class="btn btn-primary" href="<?php echo base_url().'cms/content'; ?>">Lihat Data</a>
						</div>
					</div>
					<hr>
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<?php echo form_open_multipart(base_url().'cms/content/edit'); ?> 
								<input type="hidden" class="form-control" name="image_existing" value="<?php echo isset($lists[0]['image'])?$lists[0]['image']:''; ?>" required>
								<input type="hidden" class="form-control" name="profile_image_existing" value="<?php echo isset($lists[0]['profile_image'])?$lists[0]['profile_image']:''; ?>" required>
								<input type="hidden" class="form-control" name="id" value="<?php echo isset($lists[0]['id'])?$lists[0]['id']:''; ?>" required> 
								<div class="form-group">
									<label>Judul</label>
									<input type="text" class="form-control" name="title" maxlength="50" value="<?php echo isset($lists[0]['title'])?$lists[0]['title']:''; ?>" required>
									<span class="counter"></span>
									<script>
										let input = document.querySelector('.form-group input')
											counter = document.querySelector('.counter')
											maxLength = input.getAttribute('maxlength')
											counter.innerHTML = `Sisa karakter ${maxLength}`

											input.addEventListener('keyup', (e) => {
												counter.innerHTML = `Sisa karakter ${parseFloat(maxLength) - e.target.value.length}`
											})
									</script>
								</div>
								<div class="form-group">
									<label>Kategori</label>
									<select class="form-control" name="category" id="category" required>
										<option value="" disabled>-- Pilih Kategori --</option>
										<?php
										if(isset($category)){										
											foreach($category as $key => $value){
												?>
												<option value="<?php echo $value['id']; ?>" 
												<?php if(isset($lists[0]['id_category']) && $lists[0]['id_category'] == $value['id']) { echo 'selected'; } ?>><?php echo $value['title']; ?></option>
												<?php
											}
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Ringkasan</label>
									<textarea class="form-control" name="summary" rows="7" maxlength="180" required><?php echo isset($lists[0]['summary'])?$lists[0]['summary']:''; ?></textarea>
									<span class="counter-summary"></span>
									<script>
										let input1 = document.querySelector('.form-group textarea')
											counter1 = document.querySelector('.counter-summary')
											maxLength1 = input1.getAttribute('maxlength')
											counter1.innerHTML = `Sisa karakter ${maxLength1}`

											input1.addEventListener('keyup', (e) => {
												counter1.innerHTML = `Sisa karakter ${parseFloat(maxLength1) - e.target.value.length}`
											})
									</script>
								</div>
								<div class="form-group">
									<label>Konten</label>
									<textarea class="form-control" name="body" id="mytextarea" required><?php echo isset($lists[0]['body'])?$lists[0]['body']:''; ?></textarea>
								</div>
								<div class="form-group">
									<label>Foto</label><br>
									<img style="height: 300px;" src="<?php echo isset($lists[0]['image'])?base_url().$lists[0]['image']:''; ?>" class="img-fluid"><br>
									<input type="file" class="form-control" name="image">
								</div>
								<div class="form-group">
									<label>Caption Foto</label>
									<textarea class="form-control" id="captionImage" name="caption_image" rows="3" maxlength="180"><?php echo isset($lists[0]['caption_image'])?$lists[0]['caption_image']:''; ?></textarea>
									<span class="counter-caption-image"></span>
									<script>
										let input2 = document.querySelector('.form-group textarea#captionImage')
											counter2 = document.querySelector('.counter-caption-image')
											maxLength2 = input2.getAttribute('maxlength')
											counter2.innerHTML = `Sisa karakter ${maxLength2}`

											input2.addEventListener('keyup', (e) => {
												counter2.innerHTML = `Sisa karakter ${parseFloat(maxLength2) - e.target.value.length}`
											})
									</script>
								</div>
								<?php 
								if($lists[0]['id_category'] == $this->config->item('kanal-id-opini'))
								{
								?>
								<div id="formOpini">
									<div class="form-group">
										<label>Profile Image</label><br>
										<?php if(!empty($lists[0]['profile_image'])) { ?>
										<img style="height: 300px;" src="<?php echo isset($lists[0]['profile_image'])?base_url().$lists[0]['profile_image']:''; ?>" class="img-fluid"><br>
										<?php } ?>
										<input type="file" class="form-control" name="profile_image">
									</div>
									<div class="form-group">
										<label>Profile Name</label>
										<input type="text" class="form-control" name="profile_name" maxlength="50" value="<?php echo isset($lists[0]['profile_name'])?$lists[0]['profile_name']:''; ?>">
									</div>
								</div>
								<?php
								}
								?>
								<div class="form-group">
									<label>Headline</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="headline" id="headline1" value="1" <?php if(isset($lists[0]['is_headline']) && $lists[0]['is_headline'] == 1) { echo 'checked'; } ?>>
										<label class="form-check-label" for="headline1">
											Ya
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="headline" id="headline2" value="0" <?php if(isset($lists[0]['is_headline']) && $lists[0]['is_headline'] == 0) { echo 'checked'; } ?>>
										<label class="form-check-label" for="headline2">
											Tidak
										</label>
									</div>
								</div>
								<div class="form-group">
									<label>Status</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status1" value="1" <?php if(isset($lists[0]['status']) && $lists[0]['status'] == 1) { echo 'checked'; } ?>>
										<label class="form-check-label" for="status1">
										Aktif
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="status" id="status2" value="0" <?php if(isset($lists[0]['status']) && $lists[0]['status'] == 0) { echo 'checked'; } ?>>
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
	</div>
<?php $this->load->view('cms/shared/footer'); ?>