<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package emart-shop
 */

?>

	</div><!-- #content -->

	<?php
	/**
	* Hook - emart_shop_site_footer
	*
	* @hooked emart_shop_container_wrap_start
	*/
	do_action( 'emart_shop_site_footer');
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
