<?php
/**
 * Plugin Name: Build Triple Packages
 * Plugin URI: http://thinkbig4me.com/
 * Description: An e-commerce toolkit that helps you to customize your packages.
 * Version: 1.0.0
 * Author: Pravin Gadekar
 * Author URI: http://thinkbig4me.com/
 */
?>
<?php
	function packgagebtri()
	{
		global $wbdb;
		global $wpdb;
		$pluginDirectory = trailingslashit(plugins_url(basename(dirname(__FILE__))));
        wp_enqueue_style('media2', $pluginDirectory . 'css/media2.css');
		wp_enqueue_script('build2', $pluginDirectory . 'js/buildpack.js');
		$url=str_replace('wp-content/plugins/trippackage','',dirname(__FILE__));
		$table_name= $wpdb->prefix.'customize_watch';
		$sql= "CREATE TABLE $table_name (
		       id int(20) NOT NULL auto_increment,
		       order_id int(55) NOT NULL,
		       watch varchar(200) NOT NULL,
		       qty int(20) NOT NULL,
		       PRIMARY KEY  (id)
		       ) $charset_collate;";
        
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql );
        ?>
    <script>
		var url = '<?php echo trailingslashit(plugins_url(basename(dirname(__FILE__))));?>';
	</script>
	<div class="containerpr1">
      <div class="contentpr1">
		<div id="loading">
			<img src='<?php echo $pluginDirectory;?>images/url.gif'>	
		</div>
		<div class="customize" > <!--customize -->
		      <!--<div id="loading">
			    <img src='<?php echo $pluginDirectory;?>images/url.gif'>	
			 </div>-->
            <div class="bandDiv" id="bandF"></div>
            <div class="bandDiv2" id="bandF2"></div>
            <div class="bandDiv3" id="bandF3"></div>
			<div class="faceDiv" id="faceF"></div>
			<div class="faceDiv2" id="faceF2"></div>
			<div class="faceDiv3" id="faceF3"></div>
		</div> <!--customize end-->

		<div class="outerpackgdiv">
        <div class="faces" id="faceShow"> <!--face-->
            <div class="facesHeading">
				<div class="faceHead">Choose a Watch Face 1</div>
			</div>
              <div class="facescontent" id="page-1">
                  <?php
                      $arr_options_args = array(
							'tax_query'	=> array(
								array(
									'taxonomy'	=> 'product_cat',
									'field'		=> 'slug',
					                   'terms' => 'the-standard-faces'
								),
							),
							'post_type'	=> 'product',
							'orderby'	=> 'menu_order',
							'order'		=> 'ASC',
                            'posts_per_page' => -1                         
						);
						$obj_optionsf = new WP_Query( $arr_options_args );?>
					<select name="pack_face1" id="pack_face1" class="price_face1">
						<option data-price-face1="0" value="0"> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
                        
                        	$_product = wc_get_product( $obj_option->ID );
                        
						     $i++;	
							echo '<option data-price-face1="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			   
        </div> <!--faceend-->
		
		
         
	   <div class="bands" id="bandShow">
			<div class="facesHeading">
				<div class="faceHead">Choose a Watch Band 1</div>
			</div>
              <div class="facescontent">				
                  <?php
                      $arr_options_args = array(
							'tax_query'	=> array(
								array(
									'taxonomy'	=> 'product_cat',
									'field'		=> 'slug',
					                   'terms' => 'the-standard'
								),
							),
							'post_type'	=> 'product',
							'orderby'	=> 'menu_order',
							'order'		=> 'ASC',
                            'posts_per_page' => -1                           
						);
						$obj_optionsb = new WP_Query( $arr_options_args );?>
						
					<select name="pack_band1" id="pack_band1" class="price_band1">
						<option id="pricekband1" data-price-band1="0" value="0"> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
                        
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option id="pricekband1" data-price-band1="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			    
				
        </div> <!--band end-->		
		<div class="clearboth"></div>


		<div class="faces" id="faceShow"> <!--face-->
            <div class="facesHeading">
				<div class="faceHead">Choose a Watch Face 2</div>
			</div>
              <div class="facescontent" id="page-1">
					<select name="pack_face2" id="pack_face2" class="price_face2">
						<option data-price-face2="0" value="0"> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-face2="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			   
        </div> <!--faceend-->
		 <div class="bands" id="bandShow">
			<div class="facesHeading">
				<div class="faceHead">Choose a Watch Band 2</div>
			</div>
            <div class="facescontent">				
                				
					<select name="pack_band2" id="pack_band2" class="price_band2">
						<option data-price-band2="0" value="0" selected> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-band2="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			    
				
        </div> <!--band end-->	
		
		<div class="clearboth"></div>
		<div class="faces" id="faceShow"> <!--face-->
            <div class="facesHeading">
				<div class="faceHead">Choose a Watch Face 3</div>
			</div>
              <div class="facescontent" id="page-1">
                 
					<select name="pack_face3" id="pack_face3" class="price_face3">
						<option data-price-face3="0" value="0"> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-face3="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			   
        </div> <!--faceend-->

		 <div class="bands" id="bandShow">
			<div class="facesHeading">
				<div class="faceHead">Choose a Watch Band 3</div>
			</div>
				
              <div class="facescontent">	
					<select name="pack_band3" id="pack_band3" class="price_band3">
						<option data-price-band3="0" value="0"> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-band3="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
               </div>
               </div> <!--band end-->		
		<div class="clearboth"></div>

		<div class="addCart">
				 <div class="info">
		             <p id="totalPrice">Price = $<span id="total" class="akumulasi"></span></p>
	             </div>
			    
<script type="text/javascript">
	
	var priceFace1 = jQuery('.price_face1').val();
	var priceFace2 = jQuery('.price_face2').val();	
	var priceFace3 = jQuery('.price_face3').val();
	var priceBand1 = jQuery('.price_band1').val();
	var priceBand2 = jQuery('.price_band2').val();
	var priceBand3 = jQuery('.price_band3').val();
	
	var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
	jQuery('.akumulasi').html(akumulasiTotal);	
	//alert(priceFace1);
	
	jQuery('.price_face1').change(function(){
	       var selected = jQuery(this).find('option:selected'); 
	       var priceFace1 = selected.data('price-face1');
	       
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand3= jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	       
	       //alert(akumulasiTotal);
	});
	
	jQuery('.price_face2').change(function(){
	       var selected = jQuery(this).find('option:selected');
	       var priceFace2 = selected.data('price-face2');
	       
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand3= jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	});
	
	jQuery('.price_face3').change(function(){
	       var selected = jQuery(this).find('option:selected');
	       var priceFace3 = selected.data('price-face3');
	       
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand3 = jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	       
	});
	
	jQuery('.price_band1').change(function(){
	       var selected = jQuery(this).find('option:selected');	       
	       var priceBand1 = selected.data('price-band1');
	       
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand3 = jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	       
	});
	
	jQuery('.price_band2').change(function(){
	       var selected = jQuery(this).find('option:selected');
	       var priceBand2 = selected.data('price-band2');
	       
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       var priceBand3 = jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	       
	});
	
	jQuery('.price_band3').change(function(){
	       var selected = jQuery(this).find('option:selected');
	       var priceBand3 = selected.data('price-band3');
	       
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	});
	
</script>				
        
		      <table id="qty1"><tr><td width="10%">Quantity:</td><td width="15%"><input type='text' id='qty'></td>
			     <td><button type='submit' id='pack22cart' class="cartbnt"><img src='<?php echo $pluginDirectory;?>images/addToCart.jpg'></button></td></tr>
			     <tr><td colspan="3" align="center"><button type='submit' onclick=' window.location.reload();' id='newWatch'><img src='<?php echo $pluginDirectory;?>images/createNew.jpg'></button></td></tr>
			  </table>
			 
			</div>

		<div class="clearboth"></div>
		 <br><Br>
		</div>
		
		
		<div class="clearboth"></div>
    </div> <!--content-->
	<div class="clearboth"></div>
</div>    <!--container -->
<?php
    }
 add_shortcode('build_your_tri_package', 'packgagebtri');











 function packgageminibtri()
	{
		global $wbdb;
		global $wpdb;
		$pluginDirectory = trailingslashit(plugins_url(basename(dirname(__FILE__))));
        wp_enqueue_style('media2', $pluginDirectory . 'css/media2.css');
		wp_enqueue_script('build2', $pluginDirectory . 'js/buildpack.js');
		$url=str_replace('wp-content/plugins/trippackage','',dirname(__FILE__));
		$table_name= $wpdb->prefix.'customize_watch';
		$sql= "CREATE TABLE $table_name (
		       id int(20) NOT NULL auto_increment,
		       order_id int(55) NOT NULL,
		       watch varchar(200) NOT NULL,
		       qty int(20) NOT NULL,
		       PRIMARY KEY  (id)
		       ) $charset_collate;";
        
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql );
        ?>
    <script>
		var url = '<?php echo trailingslashit(plugins_url(basename(dirname(__FILE__))));?>';
	</script>
	<div class="containerpr1">
      <div class="contentpr1">
		<div id="loading">
			<img src='<?php echo $pluginDirectory;?>images/url.gif'>	
		</div>
		<div class="customize" > <!--customize -->
		      <!--<div id="loading">
			    <img src='<?php echo $pluginDirectory;?>images/url.gif'>	
			 </div>-->
            <div class="bandDiv" id="bandF"></div>
            <div class="bandDiv2" id="bandF2"></div>
            <div class="bandDiv3" id="bandF3"></div>
			<div class="faceDiv" id="faceF"></div>
			<div class="faceDiv2" id="faceF2"></div>
			<div class="faceDiv3" id="faceF3"></div>
		</div> <!--customize end-->

		<div class="outerpackgdiv">
        <div class="faces" id="faceShow"> <!--face-->
            <div class="facesHeading">
				<div class="faceHead">Choose a Watch Face 1</div>
			</div>
              <div class="facescontent" id="page-1">
                  <?php
                      $arr_options_args = array(
							'tax_query'	=> array(
								array(
									'taxonomy'	=> 'product_cat',
									'field'		=> 'slug',
					                   'terms' => 'the-mini'
								),
							),
							'post_type'	=> 'product',
							'orderby'	=> 'menu_order',
							'order'		=> 'ASC',
                            'posts_per_page' => -1                         
						);
						$obj_optionsf = new WP_Query( $arr_options_args );?>
					<select name="pack_face1" id="pack_face1" class="price_face1">
						<option data-price-face1="0" value="0"> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-face1="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			   
        </div> <!--faceend-->
		
		
         
	   <div class="bands" id="bandShow">
			<div class="facesHeading">
				<div class="faceHead">Choose a Watch Band 1</div>
			</div>
              <div class="facescontent">				
                  <?php
                      $arr_options_args = array(
							'tax_query'	=> array(
								array(
									'taxonomy'	=> 'product_cat',
									'field'		=> 'slug',
					                   'terms' => 'the-mini-bands'
								),
							),
							'post_type'	=> 'product',
							'orderby'	=> 'menu_order',
							'order'		=> 'ASC',
                            'posts_per_page' => -1                           
						);
						$obj_optionsb = new WP_Query( $arr_options_args );?>
						
					<select name="pack_band1" id="pack_band1" class="price_band1">
						<option data-price-band1="0" value="0" value=""> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-band1="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			    
				
        </div> <!--band end-->		
		<div class="clearboth"></div>

		<div class="faces" id="faceShow"> <!--face-->
            <div class="facesHeading">
				<div class="faceHead">Choose a Watch Face 2</div>
			</div>
              <div class="facescontent" id="page-1">
					<select name="pack_face2" id="pack_face2" class="price_face2">
						<option data-price-face2="0" value="0"> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-face2="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			   
        </div> <!--faceend-->
		 <div class="bands" id="bandShow">
			<div class="facesHeading">
				<div class="faceHead">Choose a Watch Band 2</div>
			</div>
            <div class="facescontent">				
                				
					<select name="pack_band2" id="pack_band2" class="price_band2">
						<option data-price-band2="0" value="0"> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-band2="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			    
				
        </div> <!--band end-->	
		<div class="clearboth"></div>
		
		<div class="faces" id="faceShow"> <!--face-->
            <div class="facesHeading">
				<div class="faceHead">Choose a Watch Face 3</div>
			</div>
              <div class="facescontent" id="page-1">
                  
					<select name="pack_face3" id="pack_face3" class="price_face3">
						<option data-price-face3="0" value="0"> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-face3="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
			  </div>
			   
        </div> <!--faceend-->
		 <div class="bands" id="bandShow">
			<div class="facesHeading">
				<div class="faceHead">Choose a Watch Band 3</div>
			</div>
				
              <div class="facescontent">	
					<select name="pack_band3" id="pack_band3" class="price_band3">
						<option data-price-band3="0" value="0"> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
                        	
                        	$_product = wc_get_product( $obj_option->ID );
                        	
						     $i++;	
							echo '<option data-price-band3="'.$_product->get_regular_price().'" value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
               </div>
			    
				
        </div> <!--band end-->		
		<div class="clearboth"></div>

		<div class="addCart">
				 <div class="info">
		             <p id="totalPrice">Price = $<span id="total" class="akumulasi"></span></p>
	             </div>

<script type="text/javascript">
	
	var priceFace1 = jQuery('.price_face1').val();
	var priceFace2 = jQuery('.price_face2').val();	
	var priceFace3 = jQuery('.price_face3').val();
	var priceBand1 = jQuery('.price_band1').val();
	var priceBand2 = jQuery('.price_band2').val();
	var priceBand3 = jQuery('.price_band3').val();
	
	var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
	jQuery('.akumulasi').html(akumulasiTotal);	
	//alert(priceFace1);
	
	jQuery('.price_face1').change(function(){
	       var selected = jQuery(this).find('option:selected'); 
	       var priceFace1 = selected.data('price-face1');
	       
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand3= jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	       
	       //alert(akumulasiTotal);
	});
	
	jQuery('.price_face2').change(function(){
	       var selected = jQuery(this).find('option:selected');
	       var priceFace2 = selected.data('price-face2');
	       
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand3= jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	});
	
	jQuery('.price_face3').change(function(){
	       var selected = jQuery(this).find('option:selected');
	       var priceFace3 = selected.data('price-face3');
	       
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand3 = jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	       
	});
	
	jQuery('.price_band1').change(function(){
	       var selected = jQuery(this).find('option:selected');	       
	       var priceBand1 = selected.data('price-band1');
	       
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand3 = jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	       
	});
	
	jQuery('.price_band2').change(function(){
	       var selected = jQuery(this).find('option:selected');
	       var priceBand2 = selected.data('price-band2');
	       
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       var priceBand3 = jQuery('.price_band3').find('option:selected').data('price-band3');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	       
	});
	
	jQuery('.price_band3').change(function(){
	       var selected = jQuery(this).find('option:selected');
	       var priceBand3 = selected.data('price-band3');
	       
	       var priceFace1 = jQuery('.price_face1').find('option:selected').data('price-face1');
	       var priceFace2 = jQuery('.price_face2').find('option:selected').data('price-face2');
	       var priceFace3 = jQuery('.price_face3').find('option:selected').data('price-face3');
	       
	       var priceBand2 = jQuery('.price_band2').find('option:selected').data('price-band2');
	       var priceBand1 = jQuery('.price_band1').find('option:selected').data('price-band1');
	       
	       var akumulasiTotal = Number(priceFace1) + Number(priceFace2) + Number(priceFace3) + Number(priceBand1) + Number(priceBand2) + Number(priceBand3);
	
		jQuery('.akumulasi').html(akumulasiTotal);
	});
	
</script>	

		      <table id="qty1"><tr><td width="10%">Quantity:</td><td width="15%"><input type='text' id='qty'></td>
			     <td><button type='submit' id='pack22cart' class="cartbnt"><img src='<?php echo $pluginDirectory;?>images/addToCart.jpg'></button></td></tr>
			     <tr><td colspan="3" align="center"><button type='submit' onclick=' window.location.reload();' id='newWatch'><img src='<?php echo $pluginDirectory;?>images/createNew.jpg'></button></td></tr>
			  </table>
			</div>

		<div class="clearboth"></div>
		</div>
		
		
		<div class="clearboth"></div>
    </div> <!--content-->
	<div class="clearboth"></div>
</div>    <!--container -->
<?php
    }
 add_shortcode('build_your_tri_package_mini', 'packgageminibtri');

?>