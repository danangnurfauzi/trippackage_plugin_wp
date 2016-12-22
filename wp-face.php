<?php
define('WP_USE_THEMES', false);
$url=str_replace('wp-content/plugins/trippackage','',dirname(__FILE__));
require( $url.'/wp-blog-header.php' );
global $wbdb;
$id=$_GET['id'];
  $post=get_post_meta($id);
  
  $price_face=$post['_sale_price'][0];
   $regular_face=$post['_regular_price'][0];
  $image=get_post( $post['_thumbnail_id'][0], ARRAY_A );
?>
<img src='<?php echo $image['guid'];?>'>
<?php
if( $price_face !== "")
{
 echo '<p id="face-price">'.$price_face.'</p>';
}
else{
echo '<p id="face-price">'.$regular_face.'</p>';
}
 ?>.
<?php //echo '<p id="face-price">'.$price_face.'</p>'; ?>
<p id='face_id' value='<?php echo $id?>'></p>