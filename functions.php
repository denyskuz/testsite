<?php
	wp_enqueue_script( 'themejs', get_theme_file_uri( '/assets/js/theme.js' ),  array( 'jquery' ), '1.0', true );
  if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
  	function woocommerce_template_loop_product_title() {
  		echo '<h2 class="woocommerce-loop-product__title" dir="auto">' . get_the_title() . '</h2>';
  	}
  }

  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );
  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 30 );

  add_action( 'init', 'wpshout_register_cpts' );
  function wpshout_register_cpts() {
  	$args = array(
  		'public' => true,
  		'label'  => 'Book',
  		'has_archive'  => true,
  		'rewrite'  => array( 'slug' => 'book' ),
  		'supports' => array(
  			'title',
  			'editor',
  			'author',
  			'thumbnail',
  			'excerpt',
  			'comments',
  			'revisions'
  		),
  	);
  	register_post_type( 'book', $args );
  }

  function add_new_taxonomies() {
	register_taxonomy('genre',
		array('book'),
		array(
			'hierarchical' => false,
			'label' => 'Genre',
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'show_tagcloud' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'platform',
				'hierarchical' => false
			),
		)
	);
}
add_action( 'init', 'add_new_taxonomies', 0 );
