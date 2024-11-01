<?php 
defined( 'ABSPATH' ) || exit;
/* custom option and settings */
function sobextech_widget_settings_init() {
	global $stsearch_widget_settings_get_opts;
	/* Register Option Setting */
	register_setting( 'st-search-widget', 'stsearch_widget_opts' );
	
	/******** Section 2 *********/
	
	/* Add Settings Section For Page */
	add_settings_section(
		'st-search-settings-section-3',
		'',
		'sobextech_settings_section_widget_ca',
		'st-search-widget-settings'
	);
	
	/* Add Settings Field for widget header */
	add_settings_field(
		'st-search-widget-header',
		__('Widget Header', 'sobex-tech'),
		'sobextech_widget_header_save_attributes_ca',
		'st-search-widget',
		'st-search-settings-section-2',
		array(
			'name'      => 'widget_header',
			'id'        => 'st-search-settings-widget-header',
			'class'     => 'st-search-settings-widget-header',
			'options'   => $stsearch_widget_settings_get_opts,
		)
	);

}
add_action( 'admin_init', 'sobextech_widget_settings_init' );


/**** Start adding Input Fields ****/
function sobextech_settings_section_widget_ca(){ 
		
}
/**** End adding Input Fields ****/

function sobextech_url_wpml_if_strings_exists_sidebar() {
	global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";
  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

		?>
		<div class="sobex-widget-settings-wpml-container">
		<?php
    if( $stsearch_get_opts['sobex_plugin_translate'] === $wpml ) { // If Website Doesn't Support Multi Languages

				global $wpdb;
				$table_name = $wpdb->prefix.'sobex_tech_widget_sidebar'; // Table Name

				$rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE `label_name` <>''", ARRAY_A);
			
				foreach($rows as $row):
			
					if(isset($row['label_name']) && !empty($row['label_name']) ):

						?>
						<div class="sobex-widget-settings-wpml"><a><?php echo esc_html_e('You Are able now to Translate the strings now in WPML Tab, Please Click','sobex-tech'); ?></a>
						<a class="sobex-widget-settings-wpml-title" href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech#tab-7') ); ?>" target='blank'>
						<?php echo esc_html_e('Here','sobex-tech'); ?>
						</a></div>
						<?php
						
						break;

					else:
						?>
						
						<div class="sobex-empty-strings"><?php echo esc_html_e('You don\'t have any String To Translate Please Compelete Strings Form First.') ?>
						</a></div>
						<?php

						break;
					endif;
			
				endforeach;
			
    }
		?>
			</div>
		<?php
  }
}
function sobextech_create_url_wpml_if_strings_exists_header() {
	global $stsearch_get_opts;
  $off = "off";
  $wpml = "WPML";
  if( !empty($stsearch_get_opts['sobex_plugin_translate']) ){ // Check if Option is Exists

		?>
		<div class="sobex-widget-settings-wpml-container">
		<?php
    if( $stsearch_get_opts['sobex_plugin_translate'] === $wpml ) { // If Website Doesn't Support Multi Languages

				global $wpdb;
				$table_name = $wpdb->prefix.'sobex_tech_widget_header'; // Table Name

				$rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE `label_name` <>''", ARRAY_A);
			
				foreach($rows as $row):
			
					if(isset($row['label_name']) && !empty($row['label_name']) ):

						?>
						<div class="sobex-widget-settings-wpml"><a><?php echo esc_html_e('You Are able now to Translate the strings now in WPML Tab, Please Click','sobex-tech') ?></a>
						<a class="sobex-widget-settings-wpml-title" href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech#tab-7') ); ?>" target='blank'>
						<?php echo esc_html_e('Here','sobex-tech'); ?>
						</a></div>
						<?php
						
						break;

					else:
						?>
						
						<div class="sobex-empty-strings"><a><?php echo esc_html_e('You don\'t have any String To Translate Please Compelete Strings Form First.','sobex-tech') ?>
						</a></div>
						<?php

						break;
					endif;
			
				endforeach;
			
    }
		?>
			</div>
		<?php
  }
}
// for product tags
function sobextech_settings_create_product_tags_list() {
	global $stsearch_get_opts;
	$terms = get_terms(
		array( 
			'hide_empty' => true,
			'taxonomy' => 'product_tag',
		) 
	);
	?>
	<div id="sobex-product-tag-custom-check-container">
		<div class="sobex-product-tag-custom-check-close"><i class="sobex-tech-multiply"></i></div>
		<div class="sobex-product-tag-custom-check-title"><?php esc_html_e('Select Your Product tags to display in widget','sobex-tech');?></div>
		<?php
		if($terms){
		foreach($terms as $term){
			echo "<input class='sobex-product-tag-custom-check' id='"; echo esc_attr($term->slug); echo "' type='checkbox' value='"; echo esc_attr($term->term_id); echo "' name='product-tags-list'";
			if (@in_array($term->term_id, $stsearch_get_opts['stsearch_product_tags_list'])) {echo 'checked';} 
			echo "/>";
			echo "<label class='sobex-product-tag-custom-check-label' for='"; echo esc_attr($term->slug); echo "'>"; echo esc_attr($term->name);  echo "</label>";
			}
		}
		?>
	</div>
	<?php
}
// for product tags
function sobextech_settings_create_default_woocommerce_filter_list() {
	global $stsearch_get_opts;

	$values=array(
		array("name" => __("in stock",'sobex-tech'), "slug" => "instock"),
		array("name" => __("out of stock",'sobex-tech'), "slug" => "outofstock"),
		array("name" => __("backorders",'sobex-tech'), "slug" => "_backorders"),
		array("name" => __("On Sale",'sobex-tech'), "slug" => "_sale_price"),
		array("name" => __("popularity",'sobex-tech'), "slug" => "popularity"),
		array("name" => __("rating",'sobex-tech'), "slug" => "rating"),
		array("name" => __("Newest",'sobex-tech'), "slug" => "newest"),
		array("name" => __("Sort By price: low to high",'sobex-tech'), "slug" => "price-asc"),
		array("name" => __("Sort By price: high to low",'sobex-tech'), "slug" => "price-max"),
	);

	
	?>
	<div id="sobex-woocommerce-filter-list-custom-check-container">
		<div class="sobex-woocommerce-filter-list-custom-check-close"><i class="sobex-tech-multiply"></i></div>
		<div class="sobex-woocommerce-filter-list-custom-check-title"><?php esc_html_e('Select Your Woocommerce filter to display in widget','sobex-tech');?></div>
		<?php
		if(!empty($values)){
		foreach($values as $value){
			echo "<input class='sobex-woocommerce-filter-list-custom-check' id='"; echo esc_attr($value['slug']); echo "' type='checkbox' value='"; echo esc_attr($value['slug']); echo "' name='woocommerce-filter-list'";
			if(isset($value['slug'])){ if($value['slug'] == $stsearch_get_opts['stsearch_default_woocommerce_filter_list']){echo "checked"; }}
			echo "/>";
			echo "<label class='sobex-woocommerce-filter-list-custom-check-label' for='"; echo esc_attr($value['slug']); echo "'>"; echo esc_attr($value['name']); echo"</label>";
			
			}
		}
		?>
	</div>
	<?php
}
/* Render Page to Admin Panel */
function sobextech_widget_settings_page() {
// check user capabilities
if ( ! current_user_can( 'manage_options' ) )
return;

?>
																		<form action="options.php" method="post">
																		<?php
																		
																		settings_errors();

																		settings_fields( 'st-search-widget-settings' );

																		do_settings_sections( 'st-search-widget-settings' );

																		// submit_button( __('Save settings', 'sobex-tech') );
																		?>
																	</form>
	<?php echo sobextech_AdminDhasboard_header(); ?>
							<div class="tabsebox-r-block">
								
								<div id="tabsebox-section" class="tabsebox-r">
					
									<ul class="tab-head">
										<li> <a href="#tab-1" class="tabsebox-r-link active"> <span class="material-icons tab-icon"><?php esc_html_e('Sobex Filter','sobex-tech'); ?></span></a> </li>
									</ul>
							
									<div class="section-content-left">
									<section id="tab-1" class="tabsebox-r-body entry-content active active-content">
										<?php global $stsearch_get_opts;  
										if(isset($stsearch_get_opts['menu_menu_type']) || !empty($stsearch_get_opts['menu_menu_type'])):
											if($stsearch_get_opts['menu_menu_type'] === 'off' || $stsearch_get_opts['menu_menu_type'] === 'merge'):?>
											<!---------- top tag -------------->
											<div class="tabsobxup">
												<div class="tabs tabs-style-linemove widget-page-filter stsearch">
													<nav class="stsearch-nav">
														<ul  id="myli">
															<li><a href="#section-linemove-1"><span><?php esc_html_e('Sidebar Widget Sortable','sobex-tech'); ?></span> <i class="sobex-tech-sort-alphabetically"></i></a></li>
															<li><a href="#section-linemove-2"><span><?php esc_html_e('Widget Header Sortable','sobex-tech'); ?></span> <i class="sobex-tech-sort-alphabetically"></i></a></li>
														</ul>
													</nav>
													<div class="content-wrap">
												
														<section id="section-linemove-1">
															<div class="section-sobex-container">
																	<div class="tabs-breadcrumbs-container">
																		<ul id="st-tabs-breadcrumbs">
																			<li><a href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech') )?>" target="blank"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																			<li><a><?php esc_html_e('Sobex Filter','sobex-tech'); ?></a></li>
																			<li><a><?php esc_html_e('Widget Sidbar Sortable', 'sobex-tech')?></a></li>
																		</ul>
																	</div>
																<?php echo sobextech_settings_create_product_tags_list(); 
																global $stsearch_get_opts;
															
																			echo sobextech_settings_create_default_woocommerce_filter_list();?>
																<div class="tab-left" style="width:100%">
																<div id="tab-2" class="tab-pane">
																<h3 style="padding-top:2%"><?php esc_html_e('Attributes','sobex-tech'); ?></h3>
																<div class="content">
																		<div class="container">
																				<div class="table-responsive custom-table-responsive">
																						<?php 
																								echo '<div class="st-search-description">'.esc_html__('Select The attributes that you want to add for widget to filter Products.','sobex-tech').'</div>';
																								?>
																						<table class="table custom-table stsearchtable">
																								<thead class="st-table-header">
																										<tr>
																												<th scope="col"><?php echo esc_html_e('Run', 'sobex-tech')?></th>
																												<th scope="col"><?php echo esc_html_e('Attribute Name', 'sobex-tech')?></th>
																												<th scope="col"><?php echo esc_html_e('Style', 'sobex-tech')?></th>
																												<th scope="col"><?php echo esc_html_e('Positions', 'sobex-tech')?></th>
																										</tr>
																								</thead>
																								<tbody class="tbody-sidebar-attributes">
																										<?php	
																												global $wpdb;
																												global $stsearch_get_opts;
																												$table_name = $wpdb->prefix.'sobex_tech_widget_sidebar';
																												
																												// For Fetch
																												if($stsearch_get_opts['menu_menu_type'] === 'off' || $stsearch_get_opts['menu_menu_type'] === 'unmerge'):
																													$rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE attribute_woo != 'product_cat' AND attribute_woo != 'search_input' ORDER BY rank_mode ASC ", ARRAY_A);
																												elseif($stsearch_get_opts['menu_menu_type'] === 'merge'):
																													$rows = $wpdb->get_results( "SELECT * FROM  $table_name WHERE attribute_woo != 'search_input' ORDER BY rank_mode ASC", ARRAY_A);
																												endif;
																												
																												if(!$rows):
																													echo '<div class="st-search-description">'.esc_html_e('You Don\'t Have Attributes.','sobex-tech').'</div>';
																												endif;
																												
																												foreach($rows as $row):
																												?>
																										<!---Start Run Mode --->
																										<tr scope="row" class="update update-sidebar-attributes" data-index="<?php echo esc_attr($row['id']); ?>" data-position="<?php echo esc_attr($row['rank_mode']); ?>" >
																												<th scope="row" class="st-th">
																													<?php if($row['attribute_woo']==='product_cat'):
																														?>
																														<select style="display:none;" name="<?php echo esc_attr($row['play_mode']); ?>" id="play_mode<?php echo esc_attr($row['id']); ?>" playmode-id-sidebar="<?php echo esc_attr($row['id']);?>">
																																<option value="1" <?php selected(@$row['play_mode'],'1'); ?>><?php echo esc_html_e('Off', 'sobex-tech')?></option>
																																<option value="1" <?php selected(@$row['play_mode'],'1'); ?>><?php echo esc_html_e('On', 'sobex-tech')?></option>
																														</select>
																											

																														
																														<?php elseif($row['attribute_woo']==='search_input'):
																														?>
																														<select style="display:none;" name="<?php echo esc_attr($row['play_mode']); ?>" id="play_mode<?php echo esc_attr($row['id']); ?>" playmode-id-sidebar="<?php echo esc_attr($row['id']);?>">
																																<option value="0" selected><?php echo esc_html_e('Off', 'sobex-tech')?></option>
																														</select>

																														<?php
																													else:
																													?>
																														<input type="checkbox" id="play_mode<?php echo esc_attr($row['id']); ?>" class="sobex-tech-checkbox-toggle" value="0" <?php @checked( '1' == $row['play_mode'] ); ?> playmode-id-sidebar="<?php echo esc_attr($row['id']);?>" >
        																												<label for="play_mode<?php echo esc_attr($row['id']); ?>" class="sobex-tech-checkbox-toggle-label"></label>

																													<script>
																														jQuery(document).ready(function($) {
																															var value = $('#play_mode<?php echo esc_attr($row['id']); ?>').is(':checked')? "1": "0";
																															if(value == 0) {
																																	$("#label-sidebar-for-playmode<?php echo esc_attr($row['id']); ?>").hide();
																																}else{
																																	$("#label-sidebar-for-playmode<?php echo esc_attr($row['id']); ?>").show();
																																}
																															$('#play_mode<?php echo esc_attr($row['id']); ?>').on('change', function() {
																																var value = $('#play_mode<?php echo esc_attr($row['id']); ?>').is(':checked')? "1": "0";
																																if(value == 0) {
																																	$("#label-sidebar-for-playmode<?php echo esc_attr($row['id']); ?>").hide();
																																}else{
																																	$("#label-sidebar-for-playmode<?php echo esc_attr($row['id']); ?>").show();
																																}
																															});
																														});
																													</script>	
																													<?php
																													
																													endif;?>
																													
																												</th>
																												<!---End Run Mode --->
																												<!---Start Attributes name--->
																												<td class="st-th">
																													<?php 
																															$not_able_to_edit = array('product_cat', 'search_input', 'price_input','product_tag','default_woocommerce_filter');
																															if( !in_array($row['attribute_woo'], $not_able_to_edit, true )): ?>
																																		<input type="text" id="attribute_woo<?php echo esc_attr($row['id']); ?>"
																																		value="<?php echo esc_html($row['attribute_woo']); ?>">
																																<?php
																															else: ?>
																																	<input type="hidden" id="attribute_woo<?php echo esc_attr($row['id']); ?>"
																														<?php if($row['attribute_woo'] === 'product_cat'):
																																$attribute_name =  __('Categories','sobex-tech');
																																elseif($row['attribute_woo'] === 'search_input'):
																																	$attribute_name = __('Search Form','sobex-tech');
																																elseif($row['attribute_woo'] === 'price_input'):
																																	$attribute_name = __('Price Filter','sobex-tech');
																																elseif($row['attribute_woo'] === 'product_tag'):
																																	$attribute_name =  __('Tags','sobex-tech');
																																elseif($row['attribute_woo'] === 'default_woocommerce_filter'):
																																	$attribute_name = __('Default Woo Filter','sobex-tech');
																																else:
																																	$attribute_name =  esc_attr($row['attribute_woo']);
																																endif;
																																?>
																																<?php if($row['attribute_woo'] === 'product_tag'): ?>
																																	value="<?php echo esc_html($row['attribute_woo']); ?>">
																																	<div class="stsearch-select-product-tags"><?php esc_html_e('Edit','sobex-tech');?><i class="sobex-tech-add-1"></i></div>
																																	<?php echo esc_html($attribute_name);
																																	elseif($row['attribute_woo'] === 'default_woocommerce_filter'): ?>
																																		value="<?php echo esc_html($row['attribute_woo']); ?>">
																																		<div class="stsearch-select-woocommerce-filter-list"><?php esc_html_e('Edit','sobex-tech');?><i class="sobex-tech-add-1"></i></div>
																																		<?php echo esc_html($attribute_name);
																																	elseif($row['attribute_woo'] === 'price_input'): ?>
																																		value="<?php echo esc_html($row['attribute_woo']); ?>">
																																		<div class="stsearch-select-price-setting">
																																		<select id="stsearch-select-price-setting">
																																			<?php global $stsearch_get_opts; ?>
																																			<option value="on" <?php selected(@$stsearch_get_opts['stsearch_price_filter_min_setting'],'on'); if(empty($stsearch_get_opts['stsearch_price_filter_min_setting'])): echo 'selected'; endif;?>><?php echo esc_html_e('Min Price: cheapest product price','sobex-tech');?></option>
																																			<option value="off" <?php selected(@$stsearch_get_opts['stsearch_price_filter_min_setting'],'off'); ?>><?php echo esc_html_e('Min Price: Starting from Zero','sobex-tech');?></option>
																																		</select>
																																		</div>
																																	
																																		<?php echo esc_html($attribute_name); 
																																		
																																	
																																	   else: 
																																		 
																																		 ?>
																																		value="<?php echo esc_html($row['attribute_woo']); ?>"> 
																																	<?php echo esc_html($attribute_name);
																																		
																																	   
																																	   endif;

																															
																															endif;
																														?>
																												
																												</td>
																												<!---End Attributes name--->
																												<!---Start Display Style--->
																												<!---- FOR MENU INPUT-->
																												<?php if($row['attribute_woo'] === 'product_cat'): ?>
																												<td class="st-th">
																														<select style="display:none;" name="<?php echo esc_attr($row['display_mode']); ?>" id="display_mode<?php echo esc_attr($row['id']); ?>">
																																<option value="2" <?php selected(@$row['display_mode'],'2'); ?>><?php echo esc_html_e('Checkbox Style', 'sobex-tech')?></option>
																																<option value="5" <?php selected(@$row['display_mode'],'5'); ?>><?php echo esc_html_e('Radio Style', 'sobex-tech')?></option>
																														</select>
																												</td>
																												<!---- FOR SEARCH INPUT-->
																												<?php elseif($row['attribute_woo'] === 'search_input'): ?>
																												<td class="st-th">
																														<select style="display;none" name="<?php echo esc_attr($row['display_mode']); ?>" id="display_mode<?php echo esc_attr($row['id']); ?>">
																																<option value="10" <?php selected(@$row['display_mode'],'5'); ?>><?php echo esc_html_e('Style One', 'sobex-tech')?></option>
																																<option value="11" <?php selected(@$row['display_mode'],'6'); ?>><?php echo esc_html_e('Style Two', 'sobex-tech')?></option>
																														</select>
																												</td>
																												<!---- FOR PRICE INPUT-->
																												<?php elseif($row['attribute_woo'] === 'price_input'): ?>
																												<td class="st-th">
																														<select name="<?php echo esc_attr($row['display_mode']); ?>" id="display_mode<?php echo esc_attr($row['id']); ?>">
																																<option value="8" <?php selected(@$row['display_mode'],'8'); ?>><?php echo esc_html_e('One Side', 'sobex-tech')?></option>
																																<option value="9" <?php selected(@$row['display_mode'],'9'); ?>><?php echo esc_html_e('Two Sides', 'sobex-tech')?></option>
																														</select>
																											
																												</td>
																												<?php else:?>	
																												<td class="st-th">
																														<select id="display_mode<?php echo esc_attr($row['id']); ?>">
																																<option disabled><?php echo esc_html_e('Select Style', 'sobex-tech')?> <?php echo esc_html_e('(Pro)', 'sobex-tech')?></option>
																																<option disabled><?php echo esc_html_e('Checkbox Style', 'sobex-tech')?> <?php echo esc_html_e('(Pro)', 'sobex-tech')?></option>
																																<option disabled><?php echo esc_html_e('Checkbox Color Style', 'sobex-tech')?> <?php echo esc_html_e('(Pro)', 'sobex-tech')?></option>
																																<option disabled><?php echo esc_html_e('Checkbox label Style', 'sobex-tech')?> <?php echo esc_html_e('(Pro)', 'sobex-tech')?></option>
																																<option value="5" <?php selected(@$row['display_mode'],'5'); ?>><?php echo esc_html_e('Radio Style', 'sobex-tech')?></option>
																																<option value="6" <?php selected(@$row['display_mode'],'6'); ?>><?php echo esc_html_e('Radio Color Style', 'sobex-tech')?></option>
																																<option value="7" <?php selected(@$row['display_mode'],'7'); ?>><?php echo esc_html_e('Radio label Style', 'sobex-tech')?></option>
																														</select>
																												</td>
																												<?php endif;?>
																												<!---End Display Style--->
																												<!---Start Save Button --->
																												<td class="st-th" >
																													<i class="sobex-tech-arrow-move"></i>
																												</td>
																												<!---End Save Button --->
																										</tr>
																										<?php	endforeach; ?>
																								</tbody>
																						</table>

																				</div>
																		</div>
																</div>	
															    <?php 					  global $stsearch_get_opts;
																
															
																	?>
																<div class="sobex-update-button-container">
																	<a class="sobex-button-update" type="button" id="upd_sidebar_attributes" name="update" style="height: 35px;" ><?php esc_html_e('Update','sobex-tech');?>
																		<div id='loadingmessage' style='display:none; float:right; '>
																			<img style="width:26px" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_gif/65x65.gif'?>'/>
																		</div>
																	</a>
																</div>
																<?php 	
																	//   endif; 

																			  ?>
													
															
																					<div class="stsearch-label-name-container">
																						<?php 
																												// For Fetch
																												$rows = $wpdb->get_results( "SELECT * FROM  $table_name ORDER BY rank_mode ASC ", ARRAY_A);
																						?>
																						<h3 class="stsearch-label-name-text"><?php esc_html_e('Widget Label Name','sobex-tech');?></h3>
																						<a class="stsearch-label-name-warning"><?php esc_html_e('In this section, you can add the texts that you want to appear above each table, but we recommend you write the text in the original site language.','sobex-tech');?></a>
																						<div class="stsearch-label-box-container">
																							<?php $count = 0; foreach($rows as $row): $count++; if($row['attribute_woo'] !== 'product_cat' && $row['attribute_woo'] !== 'search_input'):?>
																							<div class="stsearch-label-box" id="label-sidebar-for-playmode<?php echo esc_attr($row['id']);?>">
																								<div class="label-box-rank">#<?php echo $count; ?></div>
																								<div class="stsearch-label-box-name">
																								<?php if($row['attribute_woo'] === 'product_cat'):
																																$attribute_name =  __('Categories','sobex-tech');
																																elseif($row['attribute_woo'] === 'search_input'):
																																	$attribute_name = __('Search Form','sobex-tech');
																																elseif($row['attribute_woo'] === 'price_input'):
																																	$attribute_name =  __('Price Filter','sobex-tech');
																																elseif($row['attribute_woo'] === 'product_tag'):
																																	$attribute_name =  __('Tags','sobex-tech');
																																elseif($row['attribute_woo'] === 'default_woocommerce_filter'):
																																		$attribute_name =  __('Default Woo Filter','sobex-tech');
																																else:
																																	$attribute_name =  esc_attr($row['attribute_woo']);
																																endif;
																																?>
																													
																									<a><?php echo esc_attr($attribute_name)?></a>
																									
																								</div>
																								<div class="stsearch-label-box-input" label-id-sidebar="<?php echo esc_attr($row['id']);?>" >
																									<div class="sobex-tech-input-text-col">
																									<input type="text" class="sobex-tech-input-text-effect-1" id="label_name<?php echo esc_attr($row['id']);?>" placeholder="<?php echo esc_html_e('Example: Filter by','sobex-tech') . " ". $attribute_name."...";?>" value="<?php echo empty(esc_attr($row['label_name']))? '': esc_attr($row['label_name']);?>">
																										<span class="focus-border">
																											<i></i>
																										</span>
																									</div>

																								</div>
																							</div>
																							<?php endif; endforeach; ?>
																						</div>
																					</div>
																					<?php 					  global $stsearch_get_opts;
																
																				  ?>
																					<div class="sobex-update-button-container">
																						<a class="sobex-button-update" type="button" id="upd_sidebar_title"><?php esc_html_e('Update','sobex-tech');?>
																							<div id='loadingmessage' style='display:none; float:right; '>
																								<img style="width:26px" src='<?php echo SOBEXTECH_PLUGIN_URL . SOBEXTECH_IMG_DIR_BACK . '/admin_gif/65x65.gif'?>'/>
																							</div>
																						</a>
																					</div>
																					<?php 
																					// endif;
																					 
																					?>

																					<?php sobextech_url_wpml_if_strings_exists_sidebar();  ?>
																															</div>
																</div>
																															</div>
														</section>
														<section id="section-linemove-2">
															<div class="section-sobex-container">
																	<div class="tabs-breadcrumbs-container">
																		<ul id="st-tabs-breadcrumbs">
																		<li><a href="<?php  echo esc_url( admin_url('admin.php?page=sobex-tech') )?>" target="blank"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																			<li><a ><?php esc_html_e('Sobex Filter','sobex-tech'); ?></a></li>
																			<li><a><?php esc_html_e('Widget Sidbar Sortable','sobex-tech'); ?></a></li>
																			<li><a><?php esc_html_e('Widget Header Sortable', 'sobex-tech')?></a></li>
																		</ul>
																	</div>
															<?php global $stsearch_get_opts;  if( $stsearch_get_opts['widget_header'] === 'on' ): ?>
																<div class="tab-left" style="width:100%">
																<div id="tab-2" class="tab-pane">
																<h3 style="padding-top:2%"><?php esc_html_e('Attributes Setting','sobex-tech'); ?></h3>

																															</div>
																															</div>																</div>
														</section>
														
													</div><!-- /content -->
												</div><!-- /tabs -->
										</div>
										<!---- tabsobxup ---->
										<!---------- top tag END -------------->
										<?php else: ?>
										<div class="stsearch-widget-header-section-container"><a><?php esc_html_e('Header widgets is only available in the premium version', 'sobex-tech')?></a></div>
										<?php endif; ?><!--End if Widget Header--> 
										<?php elseif($stsearch_get_opts['menu_menu_type'] === 'unmerge'): 
                                             ?>	                    <div class="tabs-breadcrumbs-container">
																		<ul id="st-tabs-breadcrumbs">
																			<li><a href="<?php echo esc_url( admin_url('admin.php?page=sobex-tech') )?>" target="blank"><?php esc_html_e('Home','sobex-tech'); ?></a><i class="sobex-tech-home"></i></li>
																			<li><a><?php esc_html_e('Sobex Filter','sobex-tech'); ?></a></li>
																		</ul>
																	</div><?php echo '<div class="sobex-filter-widget-section-closed">'; echo esc_html_e('You Are Using Only Menu, If you want to use filter widget please select Off/merger with filter in Menu Slide tab (Settings).','sobex-tech'); echo '</div>';
                                                endif;                                                
                                                endif;?>	
									</section>
								</div>
	<?php sobextech_AdminDhasboard_footer(); ?>
<script>

</script>


<script>
	// JavaScript Document
	! function () {
		var t = {
				611: function () {
					! function (t) {
						const e = t("#tabsebox-section .tabsebox-r-link"),
							r = t("#tabsebox-section .tabsebox-r-body");
						let n;
						const o = () => {
							e.off("click").on("click", (function (o) {
								o.preventDefault(), o.stopPropagation(), window.clearTimeout(n), e.removeClass("active "), r.removeClass("active "), r.removeClass("active-content"), t(this).addClass("active"), t(t(this).attr("href")).addClass("active"), n = setTimeout((() => {
									t(t(this).attr("href")).addClass("active-content")
								}), 50)
							}))
						};
						t((function () {
							o()
						}))
					}(jQuery)
				},
				221: function (t, e, r) {
					"use strict";
					t.exports = r.p + "<?php echo SOBEXTECH_PLUGIN_URL .SOBEXTECH_CSS_DIR_BACK.'/admin-tabs-backend.css'?>"
				}
			},
			e = {};

		function r(n) {
			var o = e[n];
			if (void 0 !== o) return o.exports;
			var i = e[n] = {
				exports: {}
			};
			return t[n](i, i.exports, r), i.exports
		}
		r.n = function (t) {
				var e = t && t.__esModule ? function () {
					return t.default
				} : function () {
					return t
				};
				return r.d(e, {
					a: e
				}), e
			}, r.d = function (t, e) {
				for (var n in e) r.o(e, n) && !r.o(t, n) && Object.defineProperty(t, n, {
					enumerable: !0,
					get: e[n]
				})
			}, r.g = function () {
				if ("object" == typeof globalThis) return globalThis;
				try {
					return this || new Function("return this")()
				} catch (t) {
					if ("object" == typeof window) return window
				}
			}(), r.o = function (t, e) {
				return Object.prototype.hasOwnProperty.call(t, e)
			},
			function () {
				"use strict";
				r(221), r(611)
			}()
	}();
</script>
<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.stsearch' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
</script>

<?php
}?>
