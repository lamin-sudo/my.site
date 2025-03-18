<?php
/**
 * Default theme options.
 *
 * @package emart-shop
 */

if ( ! function_exists( 'emart_shop_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function emart_shop_get_default_theme_options() {

		$defaults = array();
		
		/*Posts Layout*/
		$defaults['blog_loop_content_type']     	= 'excerpt';
		
		$defaults['blog_meta_hide']     			= false;
		$defaults['signle_meta_hide']     			= false;
		
		/*Posts Layout*/
		$defaults['page_layout']     				= 'full-container';
		$defaults['blog_layout']     				= 'sidebar-content';
		/*layout*/
		$defaults['copyright_text']					= esc_html__( 'Copyright All right reserved', 'emart-shop' );
		$defaults['read_more_text']					= esc_html__( 'Continue Reading', 'emart-shop' );
		$defaults['index_hide_thumb']     			= false;
		$defaults['dev_credits']     				= false;
			
		
		/*Posts Layout*/
		$defaults['__fb_pro_link']     				= '';
		$defaults['__tw_pro_link']     				= '';
		$defaults['__you_pro_link']     		    = '';
		$defaults['__pr_pro_link']     				= '';
		
		$defaults['__primary_color']     			= '#6c757d';
		$defaults['__secondary_color']     			= '#ed1c24';
		
		
		$defaults['dialogue_text']					= esc_html__( 'Your Trusted 24 Hours Service Provider!', 'emart-shop' );
		
		

		// Pass through filter.
		$defaults = apply_filters( 'emart_shop_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
