<?php 
function url_format($array) {
  $CI =& get_instance(); 

  $id = isset($array['id'])?$array['id']:0;
  $slug = isset($array['slug'])?addslashes($array['slug']):'-';

  return base_url().'detail/'.$id.'/'.$slug;  
  
}