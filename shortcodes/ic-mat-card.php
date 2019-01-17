<?php
error_log(class_exists( 'ic_mat_card' ));

if ( !class_exists( 'ic_mat_card' ) ) {
    class ic_mat_card extends aviaShortcodeTemplate
	{
		function shortcode_insert_button()
		{
			// Configure shortcode
			$this->config['name']		= 'Material Card';
			$this->config['icon']		= plugin_dir_url(__FILE__) . '../images/ic-mat-card.png';
			$this->config['target']		= 'avia-target-insert';
			$this->config['shortcode'] 	= 'ic-mat-card';
			$this->config['tooltip'] 	= 'Material Card Component';
			$this->config['preview'] 	= 1;
		}

		function popup_elements()
		{
			// Set admin popup elements
			$this->elements = array(
				array(
					"type" 	=> "tab_container", 'nodescription' => true
				),
				// Card Settings
				array(
					"type" 	=> "tab",
					"name"  => __("Card Settings" , 'ic_mat_card'),
					'nodescription' => true
				),
				array(
					"name" 	=> __("Choose Card Image",'ic_mat_card' ),
					"desc" 	=> __("Either upload a new, or choose an existing image from your media library",'ic_mat_card' ),
					"id" 	=> "image",
					"type" 	=> "image",
					"title" => __("Insert Image",'ic_mat_card' ),
					"button" => __("Insert",'ic_mat_card' ),
					"std" 	=> ""
				),
				array(
					"name" 	=> __("Layout", 'ic_mat_card' ),
					"desc" 	=> __("Select desired layout", 'ic_mat_card' ),
					"id" 	=> "layout",
					"type" 	=> "select",
					"subtype" => array(
						__("Portrait") => 'portrait',
						__("Landscape") => 'landscape',
					),
					"std" => "portrait"
				),
				array(	
					"name" 	=> __("Card Link?", 'ic_mat_card' ),
					"desc" 	=> __("Where should your card link to?", 'ic_mat_card' ),
					"id" 	=> "link",
					"type" 	=> "linkpicker",
					"fetchTMPL"	=> true,
					"subtype" => array(	
						__('Set Manually', 'ic_mat_card' ) =>'manually',
						__('Single Entry', 'ic_mat_card' ) =>'single',
						__('Taxonomy Overview Page',  'ic_mat_card' )=>'taxonomy',
					),
					"std" 	=> ""
				),
				array(
					"name" 	=> __("Card height (px)", 'ic_mat_card' ),
					"desc" 	=> __("The card content text will adapt to available space", 'ic_mat_card' ),
					"id" 	=> "height",
					"type" 	=> "input",
					"std" => "400"
				),
				array(
					"name" 	=> __("Image size?", 'ic_mat_card' ),
					"desc" 	=> __("% of space used to show the image", 'ic_mat_card' ),
					"id" 	=> "image_height",
					"type" 	=> "select",
					"subtype" => AviaHtmlHelper::number_array(10,100,1,array('Default' =>''),'%'),
					"std" => "30"
				),
				array(
					"name" => __("Title", 'ic_mat_card'),
					"desc" => __("Title", 'ic_mat_card'),
					"id" => "title",
					"type" => "input",
				),
				array(
					"name" => __("Title tag", 'ic_mat_card'),
					"desc" => __("Title tag", 'ic_mat_card'),
					"id" => "title_tag",
					"type" => "select",
					"std" 	=> "h2",
					"subtype" => array(
						__('H1', 'ic_mat_card' )=>'h1',
						__('H2', 'ic_mat_card' )=>'h2',
						__('H3', 'ic_mat_card' )=>'h3',
						__('H4',  'ic_mat_card' )=>'h4',
						__('H5',  'ic_mat_card' )=>'h5',
						__('H6',  'ic_mat_card' )=>'h6',
					),
				),
				array(
					"name" 	=> __("Title font size", 'ic_mat_card' ),
					"desc" 	=> __("Size of your title in pixel", 'ic_mat_card' ),
					"id" 	=> "title_size",
					"type" 	=> "select",
					"subtype" => AviaHtmlHelper::number_array(10,40,1, array('Default' =>''),'px'),
					"std" => ""
				),
				array(
					"name" 	=> __("Title alignment", 'ic_mat_card' ),
					"desc" 	=> __("Title alignment", 'ic_mat_card' ),
					"id" 	=> "title_align",
					"type" 	=> "select",
					"subtype" => array(
						__('Left', 'ic_mat_card' )=>'left',
						__('Center', 'ic_mat_card' )=>'center',
						__('Right', 'ic_mat_card' )=>'right',
					),
					"std" => "left"
				),	
				array(
					"name" 	=> __("Content",'ic_mat_card' ),
					"desc" 	=> __("Add some content for this Material Card",'ic_mat_card' ),
					"id" 	=> "content",
					"type" 	=> "tiny_mce",
					"std" 	=> __("Click here to add your own text", "ic_mat_card" )
				),
				array(
					"name" 	=> __("Content font size", 'ic_mat_card' ),
					"desc" 	=> __("Size of your content in pixel", 'ic_mat_card' ),
					"id" 	=> "content_size",
					"type" 	=> "select",
					"subtype" => AviaHtmlHelper::number_array(10,40,1, array('Default' =>''),'px'),
					"std" => ""
				),
				array(
					"type" 	=> "close_div",
					'nodescription' => true
				),
				// /Card Settings
				// Screen Options
				array(
					"type" 	=> "tab",
					"name"	=> __("Screen Options",'ic_mat_card' ),
					'nodescription' => true
				),
				array(
					"name" 	=> __("Element Visibility",'ic_mat_card' ),
					"desc" 	=> __("Set the visibility for this element, based on the device screensize.", 'ic_mat_card' ),
					"type" 	=> "heading",
					"description_class" => "av-builder-note av-neutral",
				),
				array(	
					"desc" 	=> __("Hide on large screens (wider than 990px - eg: Desktop)", 'ic_mat_card'),
					"id" 	=> "av-desktop-hide",
					"std" 	=> "",
					"container_class" => 'av-multi-checkbox',
					"type" 	=> "checkbox"
				),
				array(	
					"desc" 	=> __("Hide on medium sized screens (between 768px and 989px - eg: Tablet Landscape)", 'ic_mat_card'),
					"id" 	=> "av-medium-hide",
					"std" 	=> "",
					"container_class" => 'av-multi-checkbox',
					"type" 	=> "checkbox"
				),
				array(	
					"desc" 	=> __("Hide on small screens (between 480px and 767px - eg: Tablet Portrait)", 'ic_mat_card'),
					"id" 	=> "av-small-hide",
					"std" 	=> "",
					"container_class" => 'av-multi-checkbox',
					"type" 	=> "checkbox"
				),		
				array(	
					"desc" 	=> __("Hide on very small screens (smaller than 479px - eg: Smartphone Portrait)", 'ic_mat_card'),
					"id" 	=> "av-mini-hide",
					"std" 	=> "",
					"container_class" => 'av-multi-checkbox',
					"type" 	=> "checkbox"
				),
				array(
					"name" 	=> __("Element Sizing",'ic_mat_card' ),
					"desc" 	=> __("Set the size for component elements, based on the device screensize.", 'ic_mat_card' ),
					"type" 	=> "heading",
					"description_class" => "av-builder-note av-neutral",
				),
				array(
					"name" 	=> __("Image size on medium sized screens (between 768px and 989px - eg: Tablet Landscape)", 'ic_mat_card' ),
					"desc" 	=> __("% of space used to show the image", 'ic_mat_card' ),
					"id" 	=> "image_height_medium",
					"type" 	=> "select",
					"subtype" => AviaHtmlHelper::number_array(10,100,1,array('Default' =>''),'%'),
					"std" => ""
				),
				array(
					"name" 	=> __("Image size on small screens (between 480px and 767px - eg: Tablet Portrait)", 'ic_mat_card' ),
					"desc" 	=> __("% of space used to show the image", 'ic_mat_card' ),
					"id" 	=> "image_height_small",
					"type" 	=> "select",
					"subtype" => AviaHtmlHelper::number_array(10,100,1,array('Default' =>''),'%'),
					"std" => ""
				),
				array(
					"name" 	=> __("Image size on very small screens (smaller than 479px - eg: Smartphone Portrait)", 'ic_mat_card' ),
					"desc" 	=> __("% of space used to show the image", 'ic_mat_card' ),
					"id" 	=> "image_height_vsmall",
					"type" 	=> "select",
					"subtype" => AviaHtmlHelper::number_array(10,100,1,array('Default' =>''),'%'),
					"std" => ""
				),
				array(
					"type" 	=> "close_div",
					'nodescription' => true
				), // ./Screen Options
			);
		}

		function editor_element($params)
		{
			$inner  = $this->shortcode_handler($params['args'], $params['content']);
			$params['innerHtml'] = "<div style='overflow: hidden;'>$inner</div>";
			return $params;
		}

		function shortcode_handler($atts, $content = "", $shortcodename = "", $meta = "")
		{
			extract(AviaHelper::av_mobile_sizes($atts)); //return $av_font_classes, $av_title_font_classes and $av_display_classes 

			// Get options from admin popup
			$atts = shortcode_atts(array(
				'class'	=> $meta['el_class'],
				'custom_class' => '',
				'custom_markup' => $meta['custom_markup'],
				'image' => '',
				'layout' => 'portrait',
				'link' => '',
				'image_height' => '10',
				'image_height_vsmall' => '',
				'image_height_small' => '',
				'image_height_medium' => '',
				'height' => '400',
				'title' => '',
				'title_tag' => 'h1',
				'title_size'=>'', 
				'title_align'=>'left', 
				'content_size' => '',
			), $atts, $this->config['shortcode']);
			
			/*
			* Creates $class, $custom_class, $custom_markup, $message
			*/
			extract($atts);
			$custom_class = $custom_class?" $custom_class":"";
			if ($layout === 'landscape') {
				$custom_class .= " ic-mat-card-landscaped";
			}
			
			$style = AviaHelper::style_string($atts, 'height', 'height', 'px');
			if ($layout === 'landscape') {
				$style .= 'display: flex; flex-direction: row;';
			}
			$image_sizes = array(
				$image_height,
				$image_height_medium,
				$image_height_small,
				$image_height_vsmall,
			);
			$image_style = $layout==="landscape"?"width:".$image_sizes[0]."%;":"height:".$image_sizes[0]."%;";
			$title_style = $title_size?AviaHelper::style_string($atts, 'title_size', 'font-size', 'px'):"";
			$title_style .= AviaHelper::style_string($atts, 'title_align', 'text-align');
			$content_style = $content_size?AviaHelper::style_string($atts, 'content_size', 'font-size', 'px'):"";

			$link  = AviaHelper::get_url($link);
			$link  = ( ( $link == "http://" ) || ( $link == "manually" ) ) ? "" : $link;
			ob_start();
			?>
			<div class="ic-mat-card-container<?php echo $custom_class . $av_display_classes; ?>" style="<?php echo $style; ?>" data-href="<?php echo $link; ?>">
				<?php if($image): ?>
					<div class="ic-mat-card-image" style="<?php echo $image_style; ?>" data-sizes='<?php echo json_encode($image_sizes); ?>' data-layout='<?php echo $layout; ?>'>
						<img src="<?php echo $image; ?>" alt="" style="object-fit: cover;width: 100%;height: 100%;">
					</div>
				<?php endif; ?>
				<div class="ic-mat-card-container-inner main_color">
					<?php if($title): ?>
					<<?php echo $title_tag; ?> class="ic-mat-card-title" style="<?php echo $title_style; ?>">
						<?php echo sanitize_text_field($title); ?>
					</<?php echo $title_tag; ?>>
					<?php endif; ?>

					<div class="ic-mat-card-content" style="<?php echo $content_style; ?>">
						<?php echo ShortcodeHelper::avia_apply_autop(ShortcodeHelper::avia_remove_autop($content)); ?>
					</div>
				</div>
			</div>
			<?php
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}

		function extra_assets()
		{
			$plugin_dir = plugin_dir_url(__FILE__);
			wp_enqueue_style( 'ic-mat-card' , $plugin_dir.'../css/ic-mat-card.css' , array(), false );
			wp_enqueue_script( 'ic-mat-card' , $plugin_dir.'../js/ic-mat-card.js' , array(), false, TRUE );
		}
	}
}