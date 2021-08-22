<?php
if ( ! function_exists( 'of_options' ) ) {

	function of_options() {
		//Access the WordPress Categories via an Array
		$of_categories     = array();
		$of_categories_obj = get_categories( 'hide_empty=0' );
		foreach ( $of_categories_obj as $of_cat ) {
			$of_categories[ $of_cat->cat_ID ] = $of_cat->cat_name;
		}
		$categories_tmp = array_unshift( $of_categories, __( 'Select a category:', 'flatsome-admin' ) );

		//Access the WordPress Pages via an Array
		$of_pages      = array();
		$of_pages_obj  = get_pages( 'sort_column=post_parent,menu_order' );
		$of_pages['0'] = __( 'Select a page:', "flatsome-admin" );
		foreach ( $of_pages_obj as $of_page ) {
			$of_pages[ $of_page->ID ] = $of_page->post_title;
		}

		// Access the Blocks via an Array.
		$of_blocks     = array( false => __( '-- None --', 'flatsome-admin' ) );
		$of_blocks_obj = flatsome_get_post_type_items( 'blocks' );
		if ( $of_blocks_obj ) {
			foreach ( $of_blocks_obj as $of_block ) {
				$of_blocks[ $of_block->post_name ] = $of_block->post_title;
			}
		}

		// Set the Options Array
		global $of_options;
		$of_options = array();

		$url = ADMIN_DIR . 'assets/images/';

		$of_options[] = array(
			"name" => __( "Global Settings", "flatsome-admin" ),
			"jsid" => "global_settings",
			"type" => "heading",
		);

		$of_options[] = array(
			"name" => __( "Header Scripts", "flatsome-admin" ),
			"desc" => __( "Add custom scripts inside HEAD tag. You need to have SCRIPT tag around the scripts.",
				"flatsome-admin" ),
			"id"   => "html_scripts_header",
			"std"  => "",
			"type" => "textarea"
		);

		$of_options[] = array(
			"name" => __( "Footer Scripts", "flatsome-admin" ),
			"desc" => __( "Here is the place to paste your Google Analytics code or any other JS code you might want to add to be loaded in the footer of your website.",
				"flatsome-admin" ),
			"id"   => "html_scripts_footer",
			"std"  => "",
			"type" => "textarea"
		);

		$of_options[] = array(
			"name" => __( "Body Scripts - Top", "flatsome-admin" ),
			"desc" => __( "Add custom scripts just after the BODY tag opened. You need to have a SCRIPT tag around scripts.",
				"flatsome-admin" ),
			"id"   => "html_scripts_after_body",
			"std"  => "",
			"type" => "textarea"
		);

		$of_options[] = array(
			"name" => __( "Body Scripts - Bottom", "flatsome-admin" ),
			"desc" => __( "Add custom scripts just before the BODY tag closed. You need to have a SCRIPT tag around scripts.",
				"flatsome-admin" ),
			"id"   => "html_scripts_before_body",
			"std"  => "",
			"type" => "textarea"
		);

		$of_options[] = array(
			"name" => __( "Flatsome 2.0 Content Support", "flatsome-admin" ),
			"id"   => "flatsome_fallback",
			"desc" => __( "Support content made in Flatsome 2.0. Disable to speed up site.", "flatsome-admin" ),
			"std"  => 1,
			"type" => "checkbox"
		);

		$of_options[] = array(
			"name" => __( "Custom CSS", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Custom CSS",
		);

		$of_options[] = array(
			"name" => __( "All screens", "flatsome-admin" ),
			"desc" => __( "Add custom CSS here", "flatsome-admin" ),
			"id"   => "html_custom_css",
			"std"  => "",
			"type" => "textarea"
		);

		$of_options[] = array(
			"name" => __( "Tablets and down", "flatsome-admin" ),
			"desc" => __( "Add custom CSS here for tablets and mobile", "flatsome-admin" ),
			"id"   => "html_custom_css_tablet",
			"std"  => "",
			"type" => "textarea"
		);

		$of_options[] = array(
			"name" => __( "Mobile only", "flatsome-admin" ),
			"desc" => __( "Add custom CSS here for mobile view", "flatsome-admin" ),
			"id"   => "html_custom_css_mobile",
			"std"  => "",
			"type" => "textarea"
		);


        // Performance.
        $of_options[] = array(
            'name' => __('Performance', 'flatsome-admin'),
            'type' => 'heading',
            "jsid" => "performance",
            'desc' => __(' <strong>Use with caution! Disable if you have plugin compatibility problems.</strong>', 'flatsome-admin'),
        );

        $of_options[] = array(
            'name' => __('Preload pages', 'flatsome-admin'),
            'id'   => 'perf_instant_page',
            'desc' => __('Preload pages right before a user clicks on it for blazing fast browsing between pages.', 'flatsome-admin'),
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'name' => __('Lazy Load Banner and Section backgrounds', 'flatsome-admin'),
            'id'   => 'lazy_load_backgrounds',
            'desc' => __('Enable lazy loading of banner and section backgrounds.', 'flatsome-admin'),
            'std'  => 1,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'name' => __('Lazy Load Images', 'flatsome-admin'),
            'id'   => 'lazy_load_images',
            'desc' => __('Enable lazy loading for images. It will generate an inline blank Base64 image with the same aspect ratio as the original image.', 'flatsome-admin'),
            'std'  => 0,
            'type' => 'checkbox',
        );

        $of_options[] = array(
            'name' => __('Disable theme style.css', 'flatsome-admin'),
            'type' => 'checkbox',
            'id'   => 'flatsome_disable_style_css',
            'std'  => 0,
            'desc' => __('Disable loading of theme style.css. This file is only needed if you have added custom CSS to that file.', 'flatsome-admin'),
        );

        $of_options[] = array(
            'name' => __('Disable Emoji script', 'flatsome-admin'),
            'type' => 'checkbox',
            'id'   => 'disable_emoji',
            'std'  => 0,
            'desc' => __('Remove WP emoji scripts from front-end.', 'flatsome-admin'),
        );

        $of_options[] = array(
            'name' => __('Disable Block library css', 'flatsome-admin'),
            'type' => 'checkbox',
            'id'   => 'disable_blockcss',
            'std'  => 0,
            'desc' => __('Remove default block library css coming from WordPress', 'flatsome-admin'),
        );

		$of_options[] = array(
			"name" => __( "Site Loader", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Site Loader",
		);

		$of_options[] = array(
			"name"    => __( "Site Loader", "flatsome-admin" ),
			"id"      => "site_loader",
			"desc"    => __( "Enable Site Loader overlay when loading the site.", "flatsome-admin" ),
			"type"    => "select",
			"std"     => 0,
			"options" => array(
				0      => __( "Disabled", "flatsome-admin" ),
				'home' => __( "Enable on homepage", "flatsome-admin" ),
				'all'  => __( "Enable on all pages", "flatsome-admin" )
			),
		);

		$of_options[] = array(
			"name"    => __( "Color", "flatsome-admin" ),
			"id"      => "site_loader_color",
			"type"    => "select",
			"std"     => 'light',
			"options" => array(
				'light' => __( "Light", "flatsome-admin" ),
				'dark'  => __( "Dark", "flatsome-admin" )
			),
		);

		$of_options[] = array(
			"name" => __( "Background Color", "flatsome-admin" ),
			"id"   => "site_loader_bg",
			"std"  => "",
			"type" => "color"
		);

		$of_options[] = array(
			"name" => __( "Site Search", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Site Search",
		);

		$of_options[] = array(
			"name" => __( "Live Search", "flatsome-admin" ),
			"id"   => "live_search",
			"desc" => __( "Enable live search for products and pages.", "flatsome-admin" ),
			"std"  => 1,
			"type" => "checkbox"
		);

		$of_options[] = array(
			"name" => __( "Search placeholder", "flatsome-admin" ),
			"desc" => __( "Change the search field placeholder", "flatsome-admin" ),
			"id"   => "search_placeholder",
			"type" => "text"
		);

		if ( is_woocommerce_activated() ) {

			$of_options[] = array(
				"name" => __( "Show Blog and pages in search results.", "flatsome-admin" ),
				"id"   => "search_result",
				"desc" => __( "Enable blog and pages in search results", "flatsome-admin" ),
				"std"  => 1,
				"type" => "checkbox"
			);

			$of_options[] = array(
				"name"    => __( "Search Products Order By", "flatsome-admin" ),
				"id"      => "search_products_order_by",
				"type"    => "select",
				"std"     => 'relevance',
				"options" => array(
					'relevance' => __( 'Relevance', "flatsome-admin" ),
					'title'     => __( "Title", "flatsome-admin" ),
					'price'     => __( "Price", "flatsome-admin" ),
				),
			);


			$of_options[] = array(
				"name" => __( "Search Product SKU", "flatsome-admin" ),
				"desc" => __( "Allow searching by SKU in live search.", "flatsome-admin" ),
				"id"   => "search_by_sku",
				"std"  => 0,
				"type" => "checkbox"
			);


			$of_options[] = array(
				"name" => __( "Search Product Tag", "flatsome-admin" ),
				"desc" => __( "Allow searching by product tags in live search.", "flatsome-admin" ),
				"id"   => "search_by_product_tag",
				"std"  => 0,
				"type" => "checkbox"
			);
		}

		// UX Builder
		$of_options[] = array(
			"name" => __( "UX Builder", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "UX Builder",
		);


		// Lazy loading
		$of_options[] = array(
			"name" => __( "Lazy Loading", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Lazy Loading",
		);

		$of_options[] = array(
			"name" => __( "Lazy Load Google Fonts", "flatsome-admin" ),
			"id"   => "lazy_load_google_fonts",
			"desc" => __( "Enable lazy loading of Google Fonts", "flatsome-admin" ),
			"std"  => 1,
			"type" => "checkbox"
		);

		$of_options[] = array(
			"name" => __( "Lazy Load Icons", "flatsome-admin" ),
			"id"   => "lazy_load_icons",
			"desc" => __( "Enable lazy loading of Flatsome interface icons", "flatsome-admin" ),
			"std"  => 0,
			"type" => "checkbox"
		);

		$of_options[] = array(
			"name" => __( "Lazy Load Banner and Section backgrounds", "flatsome-admin" ),
			"id"   => "lazy_load_backgrounds",
			"desc" => __( "Enable lazy loading of banner and section backgrounds.", "flatsome-admin" ),
			"std"  => 1,
			"type" => "checkbox"
		);

		$of_options[] = array(
			"name" => __( "Lazy Load Images", "flatsome-admin" ),
			"id"   => "lazy_load_images",
			"desc" => __( "Enable lazy loading for images. <strong>Use with caution! Disable if you have plugin compability problems.</strong>",
				"flatsome-admin" ),
			"std"  => 0,
			"type" => "checkbox"
		);

		$of_options[] = array(
			"name" => __( "Google APIs", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Google APIs",
		);

		$of_options[] = array(
			"name" => __( "Google Maps API", "flatsome-admin" ),
			"desc" => __( "Enter Google Maps API key here to enable Maps. You can generate one here: <a target='_blank' href='https://developers.google.com/maps/documentation/javascript/'>Google Maps API</a>",
				"flatsome-admin" ),
			"id"   => "google_map_api",
			"std"  => "",
			"type" => "text"
		);

		$of_options[] = array(
			"name" => __( "Maintenance Mode", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Maintenance Mode",
		);

		$of_options[] = array(
			"name" => __( "Maintenance Mode", "flatsome-admin" ),
			"id"   => "maintenance_mode",
			"desc" => __( "Enable Maintenance Mode for all users except admins.", "flatsome-admin" ),
			"std"  => 0,
			"type" => "checkbox"
		);

		$of_options[] = array(
			"name" => __( "Admin Notice", "flatsome-admin" ),
			"id"   => "maintenance_mode_admin_notice",
			"desc" => __( "Show admin notice when Maintenance Mode is enabled.", "flatsome-admin" ),
			"std"  => 1,
			"type" => "checkbox"
		);

		$of_options[] = array(
			"name"    => __( "Custom Maintenance Page", "flatsome-admin" ),
			"id"      => "maintenance_mode_page",
			"desc"    => __( "Set a custom page as maintenance page. Only this page will be visible for visitors.",
				"flatsome-admin" ),
			"std"     => 0,
			"type"    => "select",
			"options" => $of_pages
		);

		$of_options[] = array(
			"name" => __( "Maintenance Mode Text", "flatsome-admin" ),
			"desc" => __( "The text that will be visible to your customers when accessing maintenance screen.",
				"flatsome-admin" ),
			"id"   => "maintenance_mode_text",
			"std"  => __( "Please check back soon..", "flatsome-admin" ),
			"type" => "text"
		);

		$of_options[] = array(
			"name" => __( '404 Page', 'flatsome-admin' ),
			"jsid" => "404 Page",
			"type" => "heading",
		);

		$of_options[] = array(
			"name"    => __( 'Custom 404 Block', 'flatsome-admin' ),
			"id"      => "404_block",
			"desc"    => __( 'Replace 404 page content with a Custom Block that you can edit in the Page Builder.',
				'flatsome-admin' ),
			"std"     => 0,
			"type"    => "select",
			"options" => $of_blocks,
		);

		$of_options[] = array(
			"name" => __( "Custom Fonts", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Custom Fonts",
		);

		$of_options[] = array(
			"name" => __( "Add custom fonts", "flatsome-admin" ),
			"type" => "info",
			"desc" => __( '<p style="font-size:16px">To change font go to persian flatsome settings page</p>',
				"flatsome-admin" )
		);

		if ( is_woocommerce_activated() ) {

			$of_options[] = array(
				"name" => __( "WooCommerce", "flatsome-admin" ),
				"type" => "heading",
				"jsid" => "WooCommerce",
			);

			$of_options[] = array(
				"name" => __( "Disable Reviews Global", "flatsome-admin" ),
				"id"   => "disable_reviews",
				"desc" => __( "Disable reviews globally.", "flatsome-admin" ),
				"std"  => 0,
				"type" => "checkbox"
			);

			$of_options[] = array(
				"name" => __( "Enable default WooCommerce product gallery", "flatsome-admin" ),
				"id"   => "product_gallery_woocommerce",
				"desc" => __( "Use the default WooCommerce gallery slider for plugin compatibility, such as \"Additional Variation Images\".",
					"flatsome-admin" ),
				"std"  => 0,
				"type" => "checkbox"
			);

			$of_options[] = array(
				"name" => __( "Shop header", "flatsome-admin" ),
				"desc" => __( "Enter HTML that should be placed on top of main shop page. Shortcodes are allowed.",
					"flatsome-admin" ),
				"id"   => "html_shop_page",
				"std"  => "",
				"type" => "textarea"
			);

			$of_options[] = array(
				"name" => __( "Additional Global tab/section title", "flatsome-admin" ),
				"id"   => "tab_title",
				"std"  => "",
				"type" => "text"
			);

			$of_options[] = array(
				"name" => __( "Additional Global tab/section content", "flatsome-admin" ),
				"id"   => "tab_content",
				"std"  => "",
				"type" => "textarea",
				"desc" => __( "Add additional tab content here... Like Size Charts etc.", "flatsome-admin" )
			);

			$of_options[] = array(
				"name" => __( "HTML before Add To Cart button (Global)", "flatsome-admin" ),
				"desc" => __( "Enter HTML and shortcodes that will show before Add to cart selections.",
					"flatsome-admin" ),
				"id"   => "html_before_add_to_cart",
				"std"  => " ",
				"type" => "textarea"
			);

			$of_options[] = array(
				"name" => __( "HTML after Add To Cart button (Global)", "flatsome-admin" ),
				"desc" => __( "Enter HTML and shortcodes that will show after Add to cart button.", "flatsome-admin" ),
				"id"   => "html_after_add_to_cart",
				"std"  => "",
				"type" => "textarea"
			);

			$of_options[] = array(
				"name" => __( "Thank You Page Content / Scripts", "flatsome-admin" ),
				"desc" => __( "Enter scripts or custom HTML content for the thank you page here", "flatsome-admin" ),
				"id"   => "html_thank_you",
				"std"  => "",
				"type" => "textarea"
			);

			$of_options[] = array(
				"name" => __( "Catalog Mode", "flatsome-admin" ),
				"type" => "heading",
				"jsid" => "Catalog Mode",
			);

			$of_options[] = array(
				"name" => __( "Enable catalog mode", "flatsome-admin" ),
				"id"   => "catalog_mode",
				"desc" => __( "Enable catalog mode. This will disable Add To Cart buttons / Checkout and Shopping cart.",
					"flatsome-admin" ),
				"std"  => 0,
				"type" => "checkbox"
			);

			$of_options[] = array(
				"name" => __( "Disable prices", "flatsome-admin" ),
				"id"   => "catalog_mode_prices",
				"desc" => __( "Select to disable prices on category pages and product page.", "flatsome-admin" ),
				"std"  => 0,
				"type" => "checkbox"
			);

			$of_options[] = array(
				"name" => __( "Cart / Account replacement (header)", "flatsome-admin" ),
				"id"   => "catalog_mode_header",
				"std"  => "",
				"type" => "textarea",
				"desc" => __( "Enter content you want to display instead of Account / Cart. Shortcodes are allowed. For search box enter <b>[search]</b>. For social icons enter: <b>[follow twitter='http://' facebook='http://' email='post@email.com' pinterest='http://']</b>",
					"flatsome-admin" )
			);

			$of_options[] = array(
				"name" => __( "Add to cart replacement - Product page", "flatsome-admin" ),
				"id"   => "catalog_mode_product",
				"std"  => "",
				"type" => "textarea",
				"desc" => __( "Enter contact information or enquery form shortcode here.", "flatsome-admin" )
			);

			$of_options[] = array(
				"name" => __( "Add to cart replacement - Product Quick View", "flatsome-admin" ),
				"id"   => "catalog_mode_lightbox",
				"std"  => "",
				"type" => "textarea",
				"desc" => __( "Enter text that will show in product quick view", "flatsome-admin" )
			);

			$of_options[] = array(
				"name" => __( 'Infinite Scroll', 'flatsome-admin' ),
				"jsid" => "Infinite Scroll",
				"type" => "heading",
			);

			$of_options[] = array(
				"name" => __( 'Infinite scroll category/products', 'flatsome-admin' ),
				"id"   => "flatsome_infinite_scroll",
				"desc" => __( 'Enable infinite scroll for WooCommerce category/product archive.', 'flatsome-admin' ),
				"std"  => 0,
				"type" => "checkbox"
			);

			$of_options[] = array(
				"name"    => __( 'Loading type', 'flatsome-admin' ),
				"id"      => "infinite_scroll_loader_type",
				"desc"    => __( 'Select loading type animation or on button click.', 'flatsome-admin' ),
				"std"     => "spinner",
				"type"    => "select",
				"options" => array(
					'button'  => __( 'Button (On click)', 'flatsome-admin' ),
					'spinner' => __( 'Spinner', 'flatsome-admin' ),
					'image'   => __( 'Custom Image', 'flatsome-admin' ),
				)
			);

			$of_options[] = array(
				"name" => __( 'Custom loader image', 'flatsome-admin' ),
				"desc" => __( 'Upload or choose a custom loader image (for loading type \'Custom Image\').',
					'flatsome-admin' ),
				"id"   => "infinite_scroll_loader_img",
				"std"  => "",
				"type" => "upload",
			);
		}

		// Portfolio
		$of_options[] = array(
			"name" => __( "Portfolio", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Portfolio",
		);

		$of_options[] = array(
			"name" => __( "Enable Portfolio", "flatsome-admin" ),
			"id"   => "fl_portfolio",
			"desc" => __( "Enable portfolio", "flatsome-admin" ),
			"std"  => 1,
			"type" => "checkbox"
		);

		// Integrations
		$of_options[] = array(
			"name" => __( "Integrations", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Integrations",
		);

		$of_options[] = array(
			"name" => "",
			"type" => "info",
			"desc" => __( '<p style="font-size:14px">Additional options for integrated plugins will be shown here if they are activated.</p>',
				"flatsome-admin" )
		);


        $of_options[] = array(
            "name" => __( "Flatsome Studio", "flatsome-admin" ),
            "id"   => "flatsome_studio",
            "desc" => __( "Enable access to Flatsome Studio in UX Builder", "flatsome-admin" ),
            "std"  => 1,
            "type" => "checkbox"
        );



        if ( function_exists( 'ubermenu' ) ) {
			$of_options[] = array(
				"name" => __( "Ubermenu", "flatsome-admin" ),
				"id"   => "flatsome_uber_menu",
				"desc" => __( "Enable full width UberMenu. You can also insert this elsewhere by using the UberMenu options.",
					"flatsome-admin" ),
				"std"  => 1,
				"type" => "checkbox"
			);
		}

		// Yoast options.
		if ( class_exists( 'WPSEO_Frontend' ) ) {
			$of_options[] = array(
				"name" => __( 'Yoast Primary Category', 'flatsome-admin' ),
				"id"   => "wpseo_primary_term",
				"desc" => __( 'Use Yoast primary category on product category pages and elements.', 'flatsome-admin' ),
				"std"  => 0,
				"type" => "checkbox"
			);

			$of_options[] = array(
				"name"  => __( 'Yoast Breadcrumbs', 'flatsome-admin' ),
				"id"    => "wpseo_breadcrumb",
				"desc"  => __( 'Use Yoast breadcrumbs on product category pages, single product pages and elements.',
					'flatsome-admin' ),
				"std"   => 0,
				"folds" => 1,
				"type"  => "checkbox",
			);

			$of_options[] = array(
				"name" => "",
				"id"   => "wpseo_breadcrumb_remove_last",
				"desc" => __( 'Remove the last static crumb on single product pages (product title).',
					'flatsome-admin' ),
				"std"  => 1,
				"fold" => "wpseo_breadcrumb",
				"type" => "checkbox",
			);
		}

		// Backup Options
		$of_options[] = array(
			"name" => __( "Backup and Import", "flatsome-admin" ),
			"type" => "heading",
			"jsid" => "Backup and Import",
		);

		$of_options[] = array(
			"name" => __( "Backup and Restore Options", "flatsome-admin" ),
			"id"   => "of_backup",
			"std"  => "",
			"type" => "backup",
			"desc" => __( 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				"flatsome-admin" ),
		);

		$of_options[] = array(
			"name" => __( "Transfer Theme Options Data", "flatsome-admin" ),
			"id"   => "of_transfer",
			"std"  => "",
			"type" => "transfer",
			"desc" => __( 'You can transfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				"flatsome-admin" ),
		);

	}
}
