<?php
if ( ! class_exists( 'Timber' ) ) {
  add_action( 'admin_notices', function() {
    echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
  });
  return;
}

// Location of template files
Timber::$locations = 'views';

class BlankSite extends TimberSite {	
  function __construct() {
		// add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
    add_action( 'init', array( $this, 'register_menus' ) );
		parent::__construct();
	}
  
	function register_post_types() {
	  // Register custom post types here, like this:
    
    /*$labels = array(
      'name'               => _x( 'Custom Items', 'post type general name', 'custom' ),
      'singular_name'      => _x( 'Custom Item', 'post type singular name', 'custom' ),
      'menu_name'          => _x( 'Custom Items', 'admin menu', 'custom' ),
      'name_admin_bar'     => _x( 'Custom Item', 'add new on admin bar', 'custom' ),
      'add_new'            => _x( 'Add New', 'custom', 'custom' ),
      'add_new_item'       => __( 'Add New Custom Item', 'custom' ),
      'new_item'           => __( 'New Custom Item', 'custom' ),
      'edit_item'          => __( 'Edit Custom item', 'custom' ),
      'view_item'          => __( 'View Custom Item', 'custom' ),
      'all_items'          => __( 'All Custom Items', 'custom' ),
      'search_items'       => __( 'Search Custom Items', 'custom' ),
      'parent_item_colon'  => __( 'Parent Custom Items:', 'custom' ),
      'not_found'          => __( 'No custom items found.', 'custom' ),
      'not_found_in_trash' => __( 'No custom items found in Trash.', 'custom' )
    );
     $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'custom' ),
      'capability_type'    => 'page',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'thumbnail' )
    );
    register_post_type( 'custom', $args );*/
	}
  
  function register_menus() {
    register_nav_menu( 'main-menu', 'Main Menu' );
  }
  
	function add_to_context( $context ) {
		$context['menu'] = new TimberMenu('main-menu');
    $context['stylesheet'] = file_get_contents( get_template_directory_uri() . "/screen.css");
		$context['site'] = $this;
    $context['theme'] = get_template_directory_uri();
		return $context;
	}
}
new BlankSite();
