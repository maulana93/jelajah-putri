   
<?php 
if (isset($listsSearch) && count($listsSearch)>0) { 
    foreach($listsSearch as $key=>$value) { ?>  
    <?php if ($key == count($listsSearch) - 1){ ?>
        <input type="hidden" value="<?php echo $value['id']; ?>" class="last_id">
    <?php } ?>
    
    <?php
        $reguler_opini = '';
        if(isset($listsSearch[0]['id_category']) && $listsSearch[0]['id_category'] == $this->config->item('kanal-id-opini'))
        {
            $reguler_opini = ' reguler-opini';
        }
    ?>
        <article>
            <div class="border-top">
                <a href="<?php echo url_format($value); ?>">
                    <div class="row mt-4">
                        <div class="col-lg-8">
                            <h2><?php echo isset($value['title'])?$value['title']:''; ?></h2>
                            <p><?php echo isset($value['summary'])?$value['summary']:''; ?></p>
                        </div>
                        <div class="col-lg-4">
                            <img src="<?php echo base_url().isset($value['image'])?$value['image']:''; ?>" class="img-fluid<?php echo $reguler_opini; ?>">
                        </div>
                    </div>
                </a>
            </div>   
        </article>   
        <?php 
    }
}
?>