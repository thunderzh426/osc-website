<?php
function register_webinars_cpt() {
	global $osc_post_types;
	$post_types = $osc_post_types[0];
	register_post_type(
			$post_types['post_type'],
			array(
					'labels' => array(
							'name' => $post_types['name'],
							'singular_name' => $post_types['singular_name'],
							'add_new' => $post_types['add_new'],
							'edit_item' => $post_types['edit_item'],
							'new_item' => $post_types['new_item'],
							'view_item' => $post_types['view_item'],
							'search_items' => $post_types['search_items'],
							'not_found' => $post_types['not_found'],
							'not_found_in_trash' => $post_types['not_found_in_trash']
					),
					'menu_icon' => $post_types['menu_icon'],
					'public' => TRUE,
					'has_archive' => TRUE,
					'rewrite' => array('slug' => $post_types['slug']),
					'taxonomies' => array($post_types['taxonomy']) //, 'post_tag'
			)
	);
	add_post_type_support($post_types['post_type'], array('thumbnail'));
	register_taxonomy(
			$post_types['taxonomy'],
			array( $post_types['post_type'] ),
			array(
					"hierarchical" => TRUE,
					"label" => $post_types['taxonomy_label'],
					"singular_label" => $post_types['taxonomy_singular_label'],
					'query_var' => TRUE,
					'rewrite' => array('slug' => $post_types['taxonomy_slug']),
			)
	);
	flush_rewrite_rules(FALSE);
}
add_action('init', "register_webinars_cpt");