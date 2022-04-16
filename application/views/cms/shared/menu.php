<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link <?php if(isset($active_menu) && $active_menu=='1'){ echo 'active'; } ?>" href="<?php echo base_url().'cms/dashboard'; ?>">Dashboard</a>
    <a class="nav-link <?php if(isset($active_menu) && $active_menu=='2'){ echo 'active'; } ?>" href="<?php echo base_url().'cms/header_cover'; ?>">Header Cover</a>
    <a class="nav-link <?php if(isset($active_menu) && $active_menu=='3'){ echo 'active'; } ?>" href="<?php echo base_url().'cms/category'; ?>">Category</a>
    <a class="nav-link <?php if(isset($active_menu) && $active_menu=='4'){ echo 'active'; } ?>" href="<?php echo base_url().'cms/content'; ?>">Content</a>
    <a class="nav-link <?php if(isset($active_menu) && $active_menu=='5'){ echo 'active'; } ?>" href="<?php echo base_url().'cms/banner'; ?>">Banner</a>
</div>