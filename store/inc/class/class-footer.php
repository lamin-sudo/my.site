<?php
/**
 * The Site Theme Header Class 
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package emart-shop
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
class emart_shop_Footer_Layout{
	/**
	 * Function that is run after instantiation.
	 *
	 * @return void
	 */
	public function __construct() {
		
		add_action('emart_shop_site_footer', array( $this, 'site_footer_container_before' ), 5);
		add_action('emart_shop_site_footer', array( $this, 'site_footer_widgets' ), 10);
		add_action('emart_shop_site_footer', array( $this, 'site_footer_info' ), 80);
		add_action('emart_shop_site_footer', array( $this, 'site_footer_container_after' ), 998);
		add_action('wp_footer', array($this,'search_bar_load_footer'),9999 );
		add_action('wp_footer', array($this,'emmart_myaccount_popup'),9999 );
	}

	function emmart_myaccount_popup(){
		if ( class_exists( 'WooCommerce' ) ) :
		echo '<div class="emart-myacount-bar-modal" id="emart-myaccount">
		<div class="emart-myacount-modal-inner"><button class="button appw-modal-close-button" type="button"><i class="bi bi-x"></i></button>';

		echo do_shortcode('[woocommerce_my_account]');

		echo '
		</div>
		</div>';
		endif;
	}
	function search_bar_load_footer(){
		echo '<div class="search-bar-modal" id="search-bar">
		<div class="search-bar-modal-inner">

		<button class="button appw-modal-close-button" type="button"><i class="bi bi-x"></i></button>';
		
			if( class_exists('APSW_Product_Search_Finale_Class_Pro') && class_exists( 'WooCommerce' ) ){

				do_action('apsw_search_bar_preview');
				
			}else if( class_exists('APSW_Product_Search_Finale_Class') && class_exists( 'WooCommerce' ) ){
				do_action('apsw_search_bar_preview');
			}else{
				get_search_form();
			}

		echo	'
		</div>
		</div>';
	}
	
	/**
	* diet_shop foter conteinr before
	*
	* @return $html
	*/
	public function site_footer_container_before (){
		
		$html = ' <footer id="colophon" class="site-footer">';
						
		$html = apply_filters( 'emart_shop_footer_container_before_filter',$html);		
				
		echo wp_kses( $html, $this->alowed_tags() );
		
						
	}
	
	/**
	* Footer Container before
	*
	* @return $html
	*/
	function site_footer_widgets(){
	

        if ( is_active_sidebar( 'footer' ) ) { ?>
         <div id="footer">
         <div class="container">
            <div class="row emart-flex">
                <?php dynamic_sidebar( 'footer' ); ?>
            </div>
         </div>  
         </div>
        <?php }

	}
	
	
	/**
	* diet_shop foter conteinr after
	*
	* @return $html
	*/
	public function site_footer_info (){
		$text ='';
		$html = '<div class="site_info"><div class="container text-center">';
		
			$html .= $this->site_footer_back_top();

			$html .= '<div class="text">';
			
			if( get_theme_mod('copyright_text') != '' ) 
			{
				$text .= esc_html(  get_theme_mod('copyright_text') );
			}else
			{
				/* translators: 1: Current Year, 2: Blog Name  */
				$text .= sprintf( esc_html__( 'Copyright &copy; %1$s %2$s. All Right Reserved.', 'emart-shop' ), date_i18n( _x( 'Y', 'copyright date format', 'emart-shop' ) ), esc_html( get_bloginfo( 'name' ) ) );
				
			}

			$html  .= apply_filters( 'emart_footer_copywrite_filter', $text );
				
		
			/* translators: 1: developer website, 2: WordPress url  */
			$html  .= '<span class="dev_info">'.sprintf( esc_html__( 'Theme : %1$s By aThemeArt', 'emart-shop' ), '<a href="'. esc_url( 'https://athemeart.com/downloads/emart-multipurpose-woocommerce-theme/' ) .'" target="_blank" rel="nofollow">'.esc_html_x( 'emart-shop', 'credit - theme', 'emart-shop' ).'</a>',  '<a href="'.esc_url( __( 'https://wordpress.org', 'emart-shop' ) ).'" target="_blank" rel="nofollow">'.esc_html_x( 'WordPress', 'credit to cms', 'emart-shop' ).'</a>' ).'</span>';
			
			$html .= '</div>';
			
		$html .= '</div></div>';
		
		echo wp_kses( $html, $this->alowed_tags() );
	
	}
	
	public function site_footer_back_top (){
		
		$html = '<a id="backToTop" class="ui-to-top active"><i class="icofont-rounded-up parallax"></i></a>';
						
		$html = apply_filters( 'emart_site_footer_back_top_filter',$html);		
				
		return wp_kses( $html, $this->alowed_tags() );
	
	}
	/**
	* diet_shop foter conteinr after
	*
	* @return $html
	*/
	public function site_footer_container_after (){
		
		$html = '</footer>';
						
		$html = apply_filters( 'emart_shop_footer_container_after_filter',$html);		
				
		echo wp_kses( $html, $this->alowed_tags() );
	
	}
	
	
	private function alowed_tags(){
		
		if( function_exists('emart_shop_alowed_tags') ){ 
			return emart_shop_alowed_tags(); 
		}else{
			return array();	
		}
		
	}
}

$emart_shop_footer_layout = new emart_shop_Footer_Layout();