<?php
/**
 * emart-shop Admin Class.
 *
 * @author  aThemeart
 * @package emart-shop
 * @since   1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'emart_shop_admin' ) ) :

/**
 * emart_shop_admin Class.
 */
class emart_shop_admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide_notices' ) );
		add_action( 'load-themes.php', array( $this, 'admin_notice' ) );
	}

	/**
	 * Add admin menu.
	 */
	public function admin_menu() {
		$theme = wp_get_theme( get_template() );

		$page = add_theme_page( esc_attr__( 'Getting Started eMart Shop', 'emart-shop' ) , 
		esc_attr__( 'Getting Started eMart Shop', 'emart-shop' ), 
		'edit_theme_options', 
		'welcome', array( $this, 'welcome_screen' ) );
		
		add_action( 'admin_print_styles-' . $page, array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'emart-shop-welcome', get_template_directory_uri() . '/inc/admin/welcome.css', array(), '1.0' );
	}

	/**
	 * Add admin notice.
	 */
	public function admin_notice() {
		global $pagenow;

		wp_enqueue_style( 'emart-shop-message', get_template_directory_uri() . '/inc/admin/message.css', array(), '1.0' );

		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			get_theme_mod( 'emart_shop_admin_notice_welcome', 1 );

		// No option? Let run the notice wizard again..
		} elseif( ! get_option( 'emart_shop_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
		}
		
			
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function hide_notices() {
		if ( isset( $_GET['emart-shop-hide-notice'] ) && isset( $_GET['_emart_shop_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( wp_unslash($_GET['_emart_shop_notice_nonce']), 'emart_shop_hide_notices_nonce' ) ) {
				/* translators: %s: plugin name. */
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'emart-shop' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) 
			/* translators: %s: plugin name. */{
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'emart-shop' ) );
			}
			

			$hide_notice = sanitize_text_field( wp_unslash( $_GET['emart-shop-hide-notice'] ) );
			update_option( 'emart_shop_admin_notice_' . $hide_notice, 1 );
			
			
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		
		?>
		<div id="message" class="updated cresta-message">
			<a class="cresta-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'emart-shop-hide-notice', 'welcome' ) ), 'emart_shop_hide_notices_nonce', '_emart_shop_notice_nonce' ) ); ?>"><?php  /* translators: %s: plugin name. */ esc_html_e( 'Dismiss', 'emart-shop' ); ?></a>
			<p><?php printf( /* translators: %s: plugin name. */  esc_html__( 'Welcome! Thank you for choosing eMart Shop! To fully take advantage of the best our theme can offer please make sure you visit our %1$swelcome page%2$s.', 'emart-shop' ), '<a href="' . esc_url( admin_url( 'themes.php?page=welcome' ) ) . '">', '</a>' ); ?></p>
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=welcome' ) ); ?>"><?php esc_html_e( 'Get started with eMart Shop', 'emart-shop' ); ?></a>
			</p>
		</div>
		<?php
	}

	/**
	 * Intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function intro() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="cresta-theme-info">
				<h1>
					<?php esc_html_e('About', 'emart-shop'); ?>
					<?php echo esc_html( $theme->get( 'Name' )) ." ". esc_html( $theme->get( 'Version' ) ); ?>
				</h1>

			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo esc_html( $theme->display( 'Description' ) ); ?>
				<p class="cresta-actions">
					<a href="<?php echo esc_url( 'https://athemeart.com/downloads/emart-multipurpose-woocommerce-theme/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'emart-shop' ); ?></a>

					<a href="<?php echo esc_url( apply_filters( 'emart_shop_pro_theme_url', 'https://demo.athemeart.com/emart/demo-1/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'emart-shop' ); ?></a>

					<a href="<?php echo esc_url( apply_filters( 'emart_shop_pro_theme_url', 'https://wordpress.org/support/theme/emart-shop/reviews/#new-post' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rate this theme', 'emart-shop' ); ?></a>
                    
                    <a href="<?php echo esc_url( apply_filters( 'emart_shop_demo_content_url', 'https://docs.athemeart.com/docs/emart/#theme_installation' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Documentation', 'emart-shop' ); ?></a>
				</p>
				</div>

				<div class="cresta-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
				</div>
			</div>
		</div>

		<h2 class="nav-tab-wrapper">
			
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs PRO', 'emart-shop' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'welcome', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Changelog', 'emart-shop' ); ?>
			</a>
            
            
            
            
		</h2>
		<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
			
		$tabs_data = isset( $_GET['tab'] ) ? sanitize_title( wp_unslash($_GET['tab']) ) : '';
		$current_tab = empty( $tabs_data ) ? /* translators: About. */ esc_html('about','emart-shop') : $tabs_data;

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					<div class="col">
						<h4><?php esc_html_e( 'Theme Customizer', 'emart-shop' ); ?></h4>
						<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'emart-shop' ) ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-secondary"><?php /* translators: %s: plugin name. */ esc_html_e( 'Customize', 'emart-shop' ); ?></a></p>
					</div>

					<div class="col">
						<h4><?php esc_html_e( 'Got theme support question?', 'emart-shop' ); ?></h4>
						<p><?php esc_html_e( 'Please put it in our support forum.', 'emart-shop' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url( 'https://support.athemeart.com/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Support', 'emart-shop' ); ?></a></p>
					</div>

					<div class="col">
						<h4><?php esc_html_e( 'Need more features?', 'emart-shop' ); ?></h4>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'emart-shop' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url( 'https://athemeart.com/downloads/emart-multipurpose-woocommerce-theme/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Info about PRO version', 'emart-shop' ); ?></a></p>
					</div>
                   
					
				</div>
			</div>

			<div class="return-to-dashboard cresta">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'emart-shop' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'emart-shop' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'emart-shop' ) : esc_html_e( 'Go to Dashboard', 'emart-shop' ); ?></a>
			</div>
		</div>
		<?php
	}

		/**
	 * Output the changelog screen.
	 */
	public function changelog_screen() {
		global $wp_filesystem;

		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'emart-shop' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'emart_shop_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = $this->parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
		<?php
	}

	/**
	 * Parse changelog from readme file.
	 * @param  string $content
	 * @return string
	 */
	private function parse_changelog( $content ) {
		$matches   = null;
		$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
		$changelog = '';

		if ( preg_match( $regexp, $content, $matches ) ) {
			$changes = explode( '\r\n', trim( $matches[1] ) );

			$changelog .= '<pre class="changelog">';

			foreach ( $changes as $index => $line ) {
				$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
			}

			$changelog .= '</pre>';
		}

		return wp_kses_post( $changelog );
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<p class="about-description"><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'emart-shop' ); ?></p>


			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h4><?php esc_html_e('Features', 'emart-shop'); ?></h4></th>
						<th width="25%"><h4><?php esc_html_e('emart-shop', 'emart-shop'); ?></h4></th>
						<th width="25%"><h4><?php esc_html_e('emart-shop PRO', 'emart-shop'); ?></h4></th>
					</tr>
				</thead>
				<tbody>
                <tr>
                  <td><h4><?php esc_html_e('24/7 Priority Support', 'emart-shop'); ?></h4></td>
                  <td><?php esc_html_e('WP forum ( 48 / 5 )', 'emart-shop'); ?></td>
                  <td><?php esc_html_e('Own Ticket, email , Skype &amp; Teamviewer ( 24 / 7 )', 'emart-shop'); ?></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Theme Customizer', 'emart-shop'); ?> </h4></td>
                  <td><?php esc_html_e('lite features Customizer', 'emart-shop'); ?></td>
                  <td><?php esc_html_e('Full features Customizer', 'emart-shop'); ?></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Elementor Page Builder toolkit & Addons', 'emart-shop'); ?></h4></td>
                  <td><?php esc_html_e('Only Elementor plugins', 'emart-shop'); ?></td>
                  <td><?php esc_html_e('Theme Own Addons', 'emart-shop'); ?></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Slider Plugins', 'emart-shop'); ?></h4> </td>
                  <td><?php esc_html_e('3rd party plugins', 'emart-shop'); ?></td>
                  <td><?php esc_html_e('Theme Own Slider or 3rd party plugins', 'emart-shop'); ?></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Services Sections', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                 <tr>
                  <td><h4><?php esc_html_e('Features Sections', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Team Sections', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Portfolio & Project Sections', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                
                 <tr>
                  <td><h4><?php esc_html_e('Testimonials Sections', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                
               <tr>
                  <td><h4><?php esc_html_e('Pricing Sections', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Latest Posts Wigets', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                
                <tr>
                  <td><h4><?php esc_html_e('Unlimited colors', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Unlimited Fonts', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                
                <tr>
                  <td><h4><?php esc_html_e('Custom Page Template', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                
                <tr>
                  <td><h4><?php esc_html_e('Custom Blog Template', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                
                <tr>
                  <td><h4><?php esc_html_e('Blog Posts Layout', 'emart-shop'); ?></h4></td>
                  <td><?php esc_html_e('Standard layout', 'emart-shop'); ?></td>
                  <td><?php esc_html_e('Standard,Grids, Standard left, Standard right layout', 'emart-shop'); ?></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Related Posts ', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Social Share', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Sidebar Style', 'emart-shop'); ?></h4></td>
                  <td><?php esc_html_e('One Style', 'emart-shop'); ?></td>
                  <td><?php esc_html_e('Three Style', 'emart-shop'); ?></td>
                </tr>
                
                <tr>
                  <td><h4><?php esc_html_e('Sidebar Disable / Enable', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                  <td><h4><?php esc_html_e('Footer Carditis', 'emart-shop'); ?></h4></td>
                  <td><span class="dashicons dashicons-no"></span></td>
                  <td><span class="dashicons dashicons-yes"></span></td>
                </tr>
                    <tr>
						<td><h4><?php esc_html_e('WooCommerce ', 'emart-shop'); ?></h4></td>
						<td><?php esc_html_e('Basic feature', 'emart-shop'); ?></td>
						<td><?php esc_html_e('Fully customizable feature', 'emart-shop'); ?></td>
					</tr>
                     <tr>
						<td><h4><?php esc_html_e('WooCommerce Custom Plugins', 'emart-shop'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                      <tr>
						<td><h4><?php esc_html_e('WooCommerce Customizable Options', 'emart-shop'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                     <tr>
						<td><h4><?php esc_html_e('WooCommerce Child Theme', 'emart-shop'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                     <tr>
						<td><h4><?php esc_html_e('WooCommerce Layout Options', 'emart-shop'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                     <tr>
						<td><h4><?php esc_html_e('You can control overall everything without code', 'emart-shop'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							
							<a href="<?php echo esc_url( apply_filters( 'emart_shop_pro_theme_url', 'https://athemeart.com/downloads/emart-multipurpose-woocommerce-theme/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'More Information', 'emart-shop' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
	
	
	

}

endif;

return new emart_shop_admin();
