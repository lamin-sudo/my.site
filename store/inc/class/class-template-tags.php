<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Diet_Shop
 */

class emart_shop_Post_Meta {
	/**
	 * Function that is run after instantiation.
	 *
	 * @return void
	 */
	public function __construct() {
		
		
		add_action( 'emart_shop_do_tags', array( $this, 'render_tags_list' ) );
		add_action( 'emart_shop_site_content_type', array( $this, 'render_meta_list' ), 20, 1 );
		add_action( 'emart_shop_meta_info', array( $this, 'render_meta_list' ), 10, 2 );
		
		add_action( 'render_category_list', array( $this, 'render_category_list' ), 10, 2 );
	}

	public function render_category_list(){
		
		$markup = '<li class="meta category">';
		$markup .= get_the_category_list( ', ', get_the_ID() );
		$markup .= '</li>';
		
		echo $markup;		
		
	}
	/**
	 * Render meta list.
	 *
	 * @param array $order the order array. Passed through the action parameter.
	 */
	public function render_meta_list( $order, $wrp_class = '' ) {
		
		global $post;
			
		if ( ! is_array( $order ) || empty( $order ) || isset( $order['hide_meta'] ) ) {
			
			return;
		}
		
		$order  = $this->sanitize_order_array( $order );
		$markup = '';
		$markup .= '<div class="post-meta-wrap'.esc_attr( $wrp_class ).'">';
		
		//$markup .= $this->get_avatar( $order );

		$markup .= '<ul class="post-meta d-flex align-items-center">';
		foreach ( $order as $meta ) {
			switch ( $meta ) {
				case 'author':

     				$author_id		= !empty(get_the_author_meta( 'ID' ))? get_the_author_meta( 'ID' ) : $post->post_author;
					$markup .= '<li class="post-by">';
					$markup .= '<i class="bi bi-person-circle"></i>';
					$markup .= '<a href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . esc_html( get_the_author_meta('display_name', $author_id) ) . '</a>';
					$markup .= '</li>';
					break;
				case 'avatar':

					$markup .= '<li class="post-by">';
					$markup .= $this->get_avatar( $order );
					$markup .= '</li>';
					break;	

				case 'date':
					$markup .= '<li class="meta date posted-on"> <i class="bi bi-stopwatch"></i>';
					$markup .= $this->get_time_tags();
					$markup .= '</li>';
					break;
				case 'category':
					$markup .= '<li class="meta category"><i class="bi bi-folder2-open"></i>';
					$markup .= get_the_category_list( ', ', get_the_ID() );
					$markup .= '</li>';
					break;
				case 'comments':
					$comments = $this->get_comments();
					if ( empty( $comments ) ) {
						break;
					}
					$markup .= '<li class="meta comments">';
					$markup .= $comments;
					$markup .= '</li>';
					break;
				default:
					break;
			}
		}
		$markup .= '</ul>';
		
		$markup .= '</div>';

		echo wp_kses( $markup, $this->alowed_tags() );
	}
	
	
	/**
	 * Makes sure there's a valid meta order array.
	 *
	 * @param array $order meta order array.
	 *
	 * @return mixed
	 */
	private function sanitize_order_array( $order ) {
		$allowed_order_values = array(
			'avatar',
			'author',
			'date',
			'category',
			'comments',
			
		);
		foreach ( $order as $index => $value ) {
			if ( ! in_array( $value, $allowed_order_values ) ) {
				unset( $order[ $index ] );
			}
		}

		return $order;
	}
	
	/**
	 * Get the get_avatar a link.
	 *
	 * @return string
	 */
	private function get_avatar( $order ) {
		
		if( !empty( $order ) && in_array( 'avatar',$order ) )
		return ' <div class="tb-cell avatar"><a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" class="avatar_round"> '.get_avatar( get_the_author_meta('user_email'), $size = '60').' </a></div>';
		

	}
	/**
	 * Get the comments with a link.
	 *
	 * @return string
	 */
	private function get_comments() {
		$comments_number = get_comments_number();
		if ( ! comments_open() ) {
			return '';
		}
		if ( $comments_number == 0 ) {
			return '';
		} else {
			/* translators: %s: number of comments */
			$comments = sprintf( _n( '%s Comment', '%s Comments', $comments_number, 'emart-shop' ), $comments_number );
		}

		return '<a href="' . esc_url( get_comments_link() ) . '">' . esc_html( $comments ) . '</a>';
	}

	

	/**
	 * Render the tags list.
	 */
	public function render_tags_list() {
		$tags = get_the_tags();
		if ( ! is_array( $tags ) ) {
			return;
		}
		$html  = '<div class="bcf-tags-list">';
		$html .= '<span>' . esc_html__( 'Tags', 'emart-shop' ) . ':</span>';
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
			$html    .= '<a href=' . esc_url( $tag_link ) . ' title="' . esc_attr( $tag->name ) . '" class=' . esc_attr( $tag->slug ) . ' rel="tag">';
			$html    .= esc_html( $tag->name ) . '</a>';
		}
		$html .= ' </div> ';
		echo wp_kses_post( $html );
	}

	/**
	 * Get <time> tags.
	 *
	 * @return string
	 */
	private function get_time_tags() {
		$time = '<time class="entry-date published" datetime="' . esc_attr( get_the_date( 'c' ) ) . '" content="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( get_the_date() ) . '</time>';
		if ( get_the_time( 'U' ) === get_the_modified_time( 'U' ) ) {
			return $time;
		}
		$time .= '<time class="updated" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>';

		return $time;
	}
	
	private function alowed_tags(){
		
		if( function_exists('emart_shop_alowed_tags') ){ 
			return emart_shop_alowed_tags(); 
		}else{
			return array();	
		}
		
	}
	
}

$emart_shop_post_meta = new emart_shop_Post_Meta();