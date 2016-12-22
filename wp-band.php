<?php
define('WP_USE_THEMES', false);
$url=str_replace('wp-content/plugins/trippackage','',dirname(__FILE__));
require( $url.'/wp-blog-header.php' );
global $wbdb;
$id=$_GET['id'];
  $post=get_post_meta($id);
  
  $price_band=$post['_sale_price'][0];
   $regular_band=$post['_regular_price'][0];
  $image=get_post( $post['_thumbnail_id'][0], ARRAY_A );
?>
<img src='<?php echo $image['guid'];?>'>
<?php
if( $price_band !== "")
{
 echo '<p id="band-price">'.$price_band.'</p>';
}
else{
echo '<p id="band-price">'.$regular_band.'</p>';
}
 ?>

<p id='band_id' value='<?php echo $id?>'></p>