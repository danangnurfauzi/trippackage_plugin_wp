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
						<option value=""> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
						
					<select name="pack_band1" id="pack_band1">
						<option value=""> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
					<select name="pack_face2" id="pack_face2">
						<option value=""> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
                				
					<select name="pack_band2" id="pack_band2">
						<option value=""> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
                 
					<select name="pack_face3" id="pack_face3">
						<option value=""> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
					<select name="pack_band3" id="pack_band3">
						<option value=""> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
               </div>
			    
				
        </div> <!--band end-->		
		<div class="clearboth"></div>

		<div class="addCart">
				 <div class="info">
		             <p id="totalPrice">Price = $<span id="total">90</span></p>
	             </div>
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
					<select name="pack_face1" id="pack_face1">
						<option value=""> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
						
					<select name="pack_band1" id="pack_band1">
						<option value=""> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
					<select name="pack_face2" id="pack_face2">
						<option value=""> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
                				
					<select name="pack_band2" id="pack_band2">
						<option value=""> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
                  
					<select name="pack_face3" id="pack_face3">
						<option value=""> Select Face </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsf->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
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
					<select name="pack_band3" id="pack_band3">
						<option value=""> Select Band </div>
					  <?php 
						$i=0;
                        foreach ( $obj_optionsb->posts as $obj_option ) :
						     $i++;	
							echo '<option value="' . $obj_option->ID . '">'.$obj_option->post_title.'</option>';
						endforeach;
						       
						?>
					</select>
               </div>
			    
				
        </div> <!--band end-->		
		<div class="clearboth"></div>

		<div class="addCart">
				 <div class="info">
		             <p id="totalPrice">Price = $<span id="total">90</span></p>
	             </div>
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