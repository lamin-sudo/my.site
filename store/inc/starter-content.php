<?php
/**
 * emart-shop Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package emart-shop
 * @subpackage emart-shop
 * @since emart-shop 1.0.0
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `emart_shop_get_starter_content` filter before returning.
 *
 * @since emart-shop 1.0.0
 *
 * @return array A filtered array of args for the starter_content.
 */

function emart_shop_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1'  => array(
				'search',
				'text_about',
				'text_business_info',
			),
			// Add the core-defined business info widget to the footer 1 area.
			'footer' => array(
				'text_business_info',
				'text_about',
				'recent-posts',
			),
			'slider' => array(
			// Widget ID
			        'my_text' => array(
					// Widget $id -> set when creating a Widget Class
			        	'custom_html' , 
			        	// Widget $instance -> settings 
					array(
					  'title' => '',
					  'content'  => '<div id="static_header_banner" class="header-img" style="background-image: url('.esc_url( get_theme_file_uri( '/assets/image/custom-header.jpg' ) ).'); background-attachment: scroll; background-size: cover; background-position: center center;height: 70vh;"><div class="content-text"><div class="container"><div class="site-header-text-wrap"><h1 class="page-title-text">Create. Reliable. Inspire.</h1><p>Discover the perfect blend of simplicity and functionality with easy eCommerce and blogging theme, designed for your upcoming online store. Elevate your online presence effortlessly!</p></div></div></div></div>'
					)
				),
				'filter' => true,
				'visual' => true,
		     ),
			// Add the core-defined business info widget to the footer 1 area.
			'logo-side' => array(
				'my_text' => array(
					// Widget $id -> set when creating a Widget Class
			        	'custom_html' , 
			        	// Widget $instance -> settings 
					array(
					  'title' => '',
					  'content'  => '<div class="emart-contact-info"><div class="d-flex align-items-center"><i class="bi bi-alarm"></i><div><strong>Open Time</strong><br>Mon-Fri: 8am-7pm</div></div><div class="d-flex align-items-center"><i class="bi bi-geo-alt"></i><div><strong>Store Address</strong><br>183 Parkways, USAA</div></div><div class="d-flex align-items-center"><i class="bi bi-phone-flip"></i><div><strong>Sales Department</strong><br>+122 123 4567</div></div></div>'
					)
				),
				'filter' => true,
				'visual' => true,
			),
			
				
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'front' => array(
				'post_type'    => 'page',
				'post_title'   => esc_html_x( 'Homepage', 'Theme starter content', 'emart-shop' ),
				'post_content' => '<!-- wp:columns {"className":"icon-box-wrap"} -->
<div class="wp-block-columns icon-box-wrap"><!-- wp:column {"className":"wp-block-columns"} -->
<div class="wp-block-column wp-block-columns"><!-- wp:column {"className":"item-box"} -->
<div class="wp-block-column item-box"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">'.esc_html__( 'Support 24/7', 'emart-shop' ).'</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>'.esc_html__( 'Contact us 24 hours a day, 7 days a week', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"wp-block-columns"} -->
<div class="wp-block-column wp-block-columns"><!-- wp:column {"className":"item-box"} -->
<div class="wp-block-column item-box"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">'.esc_html__( 'Support 24/7', 'emart-shop' ).'</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>'.esc_html__( 'Contact us 24 hours a day, 7 days a week', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"wp-block-columns"} -->
<div class="wp-block-column wp-block-columns"><!-- wp:column {"className":"item-box"} -->
<div class="wp-block-column item-box"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">'.esc_html__( '30 Days Return', 'emart-shop' ).'</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>'.esc_html__( 'Simply return it within 30 days for an exchange', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"wp-block-columns"} -->
<div class="wp-block-column wp-block-columns"><!-- wp:column {"className":"item-box"} -->
<div class="wp-block-column item-box"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">'.esc_html__( 'Secure Payment', 'emart-shop' ).'</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>'.esc_html__( '100% Secure Payment . We ensure secure payment', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --><!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"},"metadata":{"name":"Popular Categories"}} -->
<div class="wp-block-group emart-block-categoires" style="padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:group {"style":{"spacing":{"blockGap":"8px","margin":{"bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--small)"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">'.esc_html__( 'Explore Popular Categories', 'emart-shop' ).'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">'.esc_html__( 'Shop by our popular categories below, loream ipsum dolor amet', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"24px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-4.webp","id":14,"dimRatio":0,"customOverlayColor":"#f8edda","minHeight":320,"minHeightUnit":"px","contentPosition":"bottom center","isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"16px","topRight":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center" style="border-top-left-radius:16px;border-top-right-radius:16px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:320px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#f8edda"></span><img class="wp-block-cover__image-background wp-image-14" alt="" src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-4.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"background":"#ffffffe3"},"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#ffffffe3"><!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="wp-block-heading has-text-align-center">'.esc_html__( 'Men Collection', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"8px"}}},"fontSize":"14"} -->
<p class="has-text-align-center has-14-font-size" style="padding-top:8px">'.esc_html__( '(12 Items)', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-5.webp","id":15,"dimRatio":0,"customOverlayColor":"#fae2e8","minHeight":320,"minHeightUnit":"px","contentPosition":"bottom center","isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"16px","topRight":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center" style="border-top-left-radius:16px;border-top-right-radius:16px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:320px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#fae2e8"></span><img class="wp-block-cover__image-background wp-image-15" alt="" src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-5.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"background":"#ffffffe3"},"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#ffffffe3"><!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="wp-block-heading has-text-align-center">'.esc_html__( 'For Women', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"8px"}}},"fontSize":"14"} -->
<p class="has-text-align-center has-14-font-size" style="padding-top:8px">'.esc_html__( '(10 Items)', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-6.webp","id":12,"dimRatio":0,"customOverlayColor":"#e4f3bb","minHeight":320,"minHeightUnit":"px","contentPosition":"bottom center","isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"16px","topRight":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center" style="border-top-left-radius:16px;border-top-right-radius:16px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:320px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#e4f3bb"></span><img class="wp-block-cover__image-background wp-image-12" alt="" src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-6.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"background":"#ffffffe3"},"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#ffffffe3"><!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="wp-block-heading has-text-align-center">'.esc_html__( 'Accessories', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"8px"}}},"fontSize":"14"} -->
<p class="has-text-align-center has-14-font-size" style="padding-top:8px">'.esc_html__( '(20 Items)', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:cover {"url":"'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-2.webp","id":13,"dimRatio":0,"customOverlayColor":"#d5ecfa","minHeight":320,"minHeightUnit":"px","contentPosition":"bottom center","isDark":false,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"16px","topRight":"16px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center" style="border-top-left-radius:16px;border-top-right-radius:16px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:320px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#d5ecfa"></span><img class="wp-block-cover__image-background wp-image-13" alt="" src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-2.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"background":"#ffffffe3"},"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#ffffffe3"><!-- wp:heading {"textAlign":"center","level":5} -->
<h5 class="wp-block-heading has-text-align-center">'.esc_html__( 'Jackets &amp; Coats', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"8px"}}},"fontSize":"14"} -->
<p class="has-text-align-center has-14-font-size" style="padding-top:8px">'.esc_html__( '(16 Items)', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
<!-- wp:group {"metadata":{"name":"New Arrivals"},"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:group {"style":{"spacing":{"blockGap":"8px","margin":{"bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--small)">
<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">'.esc_html__( 'New Arrivals', 'emart-shop' ).'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">'.esc_html__( 'Shop by our popular categories below, loream ipsum dolor amet', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"top","className":"emart-block-new-arrivals"} -->
<div class="wp-block-columns are-vertically-aligned-top emart-block-new-arrivals"><!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"id":36,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-2.webp" alt="" class="wp-image-36"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p class="cat-name"><a rel="tag">'.esc_html__( 'Footwear', 'emart-shop' ).'</a>, <a rel="tag">'.esc_html__( 'Leather', 'emart-shop' ).'</a></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":5} -->
<h5 class="wp-block-heading">'.esc_html__( 'Leather Original Shoes', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>'.esc_html__( '$120.0', 'emart-shop' ).'</strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">'.esc_html__( 'Add to Cart', 'emart-shop' ).'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"id":36,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-4.webp" alt="" class="wp-image-36"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p class="cat-name"><a rel="tag">'.esc_html__( 'Accesories', 'emart-shop' ).'</a>, <a rel="tag">'.esc_html__( 'Leather', 'emart-shop' ).'</a></p>
<!-- /wp:paragraph --><!-- wp:heading {"level":5} -->
<h5 class="wp-block-heading">'.esc_html__( 'Travel Bags Longline', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>'.esc_html__( '$150.0', 'emart-shop' ).'</strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">'.esc_html__( 'Add to Cart', 'emart-shop' ).'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"id":36,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-3.webp" alt="" class="wp-image-36"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p class="cat-name"><a rel="tag">'.esc_html__( 'Cosmetics', 'emart-shop' ).'</a>, <a rel="tag">'.esc_html__( 'Jewellery', 'emart-shop' ).'</a></p>
<!-- /wp:paragraph --><!-- wp:heading {"level":5} -->
<h5 class="wp-block-heading">'.esc_html__( 'Experience True Perfumes', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>'.esc_html__( '$180.0', 'emart-shop' ).'</strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">'.esc_html__( 'Add to Cart', 'emart-shop' ).'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"id":36,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-5.webp" alt="" class="wp-image-36"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p class="cat-name"><a rel="tag">'.esc_html__( 'Beauty', 'emart-shop' ).'</a>, <a rel="tag">'.esc_html__( 'Skin Care', 'emart-shop' ).'</a></p>
<!-- /wp:paragraph --><!-- wp:heading {"level":5} -->
<h5 class="wp-block-heading">'.esc_html__( 'Shirt In Longline', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>'.esc_html__( '$120.0', 'emart-shop' ).'</strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">'.esc_html__( 'Add to Cart', 'emart-shop' ).'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
			),
            'about' => array(
                'post_type'    => 'page',
                'post_title'   => esc_html_x( 'About Us', 'Theme starter content', 'emart-shop' ),
                'post_content' => '<!-- wp:columns -->
<div class="wp-block-columns emart-promotional-content"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">'.esc_html__( 'Get Inspired', 'emart-shop' ).'</h2>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">'.esc_html__( 'Can’t creepeth fourth brought open all also gathered subdue likeness. Deep, abundantly, tree every face image sea his. Which god created to gathering the given image.', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:image {"id":1910,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full wp-image-1910"><img src="'.esc_url( get_template_directory_uri() . '/assets/image/patterns-1.webp').'" alt="" class="wp-image-1910"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"id":1909,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'.esc_url( get_template_directory_uri() . '/assets/image/patterns-2.webp').'" alt="" class="wp-image-1909"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
            ),
            'contact' => array(
            	'template' => 'templates/page.php',
                'post_type'    => 'page',
                'post_title'   => esc_html_x( 'Contact', 'Theme starter content', 'emart-shop' ),
                'post_content' => '<!-- wp:paragraph -->
					This is a page with some basic contact information, such as an address and phone number. You might also try a plugin to add a contact form.
					<!-- /wp:paragraph --><!-- wp:group {"metadata":{"name":"New Arrivals"},"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:group {"style":{"spacing":{"blockGap":"8px","margin":{"bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--small)">
<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">'.esc_html__( 'New Arrivals', 'emart-shop' ).'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">'.esc_html__( 'Shop by our popular categories below, loream ipsum dolor amet', 'emart-shop' ).'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"top","className":"emart-block-new-arrivals"} -->
<div class="wp-block-columns are-vertically-aligned-top emart-block-new-arrivals"><!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"id":36,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-2.webp" alt="" class="wp-image-36"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p class="cat-name"><a rel="tag">'.esc_html__( 'Footwear', 'emart-shop' ).'</a>, <a rel="tag">'.esc_html__( 'Leather', 'emart-shop' ).'</a></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":5} -->
<h5 class="wp-block-heading">'.esc_html__( 'Leather Original Shoes', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>'.esc_html__( '$120.0', 'emart-shop' ).'</strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">'.esc_html__( 'Add to Cart', 'emart-shop' ).'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"id":36,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-4.webp" alt="" class="wp-image-36"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p class="cat-name"><a rel="tag">'.esc_html__( 'Accesories', 'emart-shop' ).'</a>, <a rel="tag">'.esc_html__( 'Leather', 'emart-shop' ).'</a></p>
<!-- /wp:paragraph --><!-- wp:heading {"level":5} -->
<h5 class="wp-block-heading">'.esc_html__( 'Travel Bags Longline', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>'.esc_html__( '$150.0', 'emart-shop' ).'</strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">'.esc_html__( 'Add to Cart', 'emart-shop' ).'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"id":36,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-3.webp" alt="" class="wp-image-36"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p class="cat-name"><a rel="tag">'.esc_html__( 'Cosmetics', 'emart-shop' ).'</a>, <a rel="tag">'.esc_html__( 'Jewellery', 'emart-shop' ).'</a></p>
<!-- /wp:paragraph --><!-- wp:heading {"level":5} -->
<h5 class="wp-block-heading">'.esc_html__( 'Experience True Perfumes', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>'.esc_html__( '$180.0', 'emart-shop' ).'</strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">'.esc_html__( 'Add to Cart', 'emart-shop' ).'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top"} -->
<div class="wp-block-column is-vertically-aligned-top"><!-- wp:image {"id":36,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="'.esc_url( get_template_directory_uri() ).'/assets/image/quick-patterns-5.webp" alt="" class="wp-image-36"/></figure>
<!-- /wp:image -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p class="cat-name"><a rel="tag">'.esc_html__( 'Beauty', 'emart-shop' ).'</a>, <a rel="tag">'.esc_html__( 'Skin Care', 'emart-shop' ).'</a></p>
<!-- /wp:paragraph --><!-- wp:heading {"level":5} -->
<h5 class="wp-block-heading">'.esc_html__( 'Shirt In Longline', 'emart-shop' ).'</h5>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>'.esc_html__( '$120.0', 'emart-shop' ).'</strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">'.esc_html__( 'Add to Cart', 'emart-shop' ).'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->'
            ),
		  'blog',
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'theme_mods' => array(
			
			'dialogue_text'  => esc_html__('Your Trusted 24 Hours Service Provider!','emart-shop'),
			'__fb_pro_link'  =>'https://www.facebook.com/',
			'__tw_pro_link'  =>'https://twitter.com/',
			'__you_pro_link' =>'https://www.youtube.com/',		
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{front}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "primary" location.
			'menu-1' => array(
				'name'  => __( 'Main Menu', 'emart-shop' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);

	/**
	 * Filters emart-shop array of starter content.
	 *
	 * @since emart-shop 1.0.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'emart_shop_get_starter_content', $starter_content );
}

