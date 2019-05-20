<?php

/**
 * Carbon fields sidebar options
 *
 * @return array
 */
function crb_get_default_sidebar_options() {
	$sidebar_options = array(
		'before_widget' => '<div class="mds-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="mds-widget-title">',
		'after_title'   => '</h3>',
	);

	return $sidebar_options;
}

function mds_carbon_select_posts_id($post_types = array('page')) {
	$mds_posts = get_posts(array(
		'post_type'      => $post_types,
		'posts_per_page' => -1,
		'orderby'        => array(
			'title'      => 'ASC',
			'post_type'  => 'ASC'
		),
		'post_status'    => 'publish'
	));
	$mds_pages_options = array();

	if (is_array($mds_posts) && !empty($mds_posts)) {
		$mds_pages_options[null] = __('Choose Page', 'mds_starter_theme');
		foreach ($mds_posts as $mds_post) {
			$mds_pages_options[$mds_post->ID] = ('' != $mds_post->post_title) ? '(' . $mds_post->post_type . ') ' .  $mds_post->post_title : __('Untitled Post #', 'coc') . $mds_post->ID;
		}
	} else {
		$mds_pages_options[null] = __('No Pages Found', 'mds_starter_theme');
	}

	return $mds_pages_options;
}

/**
 * Select options of post slugs
 *
 * @param array $post_types
 * @return array
 */
function mds_carbon_select_posts_slug($post_types = array('page')) {
	$mds_posts = get_posts(array(
		'post_type'      => $post_types,
		'posts_per_page' => -1,
		'orderby'        => array(
			'title'      => 'ASC',
			'post_type'  => 'ASC'
		),
		'post_status'    => 'publish'
	));
	$mds_pages_options = array();

	if (is_array($mds_posts) && !empty($mds_posts)) {
		$mds_pages_options[null] = __('Choose Post', 'mds_starter_theme');
		foreach ($mds_posts as $mds_post) {
			$mds_pages_options[$mds_post->post_name] = ('' != $mds_post->post_title) ? '(' . $mds_post->post_type . ') ' .  $mds_post->post_title : __('Untitled Post #', 'coc') . $mds_post->ID;
		}
	} else {
		$mds_pages_options[null] = __('No Posts Found', 'mds_starter_theme');
	}

	return $mds_pages_options;
}

/**
 * Select options of taxonomy ids
 *
 * @param string $taxonomy
 *
 * @return array
 */
function mds_carbon_select_tax_id($taxonomy = 'category', $hide_empty = true) {
	$mds_terms = get_terms(array(
		'taxonomy' => $taxonomy,
		'hide_empty' => $hide_empty,
	));
	$mds_pages_options = array();

	if (is_array($mds_terms) && !empty($mds_terms)) {
		$mds_pages_options[null] = __('Choose One', 'mds_starter_theme');
		foreach ($mds_terms as $mds_term) {
			$mds_pages_options[$mds_term->term_id] = $mds_term->name;
		}
	} else {
		$mds_pages_options[null] = __('No items Found', 'mds_starter_theme');
	}

	return $mds_pages_options;
}

/**
 * Select options of taxonomy slugs
 *
 * @param string $taxonomy
 *
 * @return array
 */
function mds_carbon_select__tax_slug($taxonomy = 'custom-tax') {
	$mds_terms = get_terms(array(
		'taxonomy' => $taxonomy,
		'hide_empty' => false,
	));
	$mds_pages_options = array();

	if (is_array($mds_terms) && !empty($mds_terms)) {
		$mds_pages_options[null] = __('Choose One', 'coc');
		foreach ($mds_terms as $mds_term) {
			$mds_pages_options[$mds_term->slug] = $mds_term->name;
		}
	} else {
		$mds_pages_options[null] = __('No items Found', 'mds_starter_theme');
	}

	return $mds_pages_options;
}

/**
 * Select options of menu ids
 *
 * @return array
 */
function mds_carbon_select_menu() {
	$menus = wp_get_nav_menus();

	$mds_menu_options = array();

	if (is_array($menus) && !empty($menus)) {
		$mds_menu_options[null] = __('Choose Menu', 'coc');
		foreach ($menus as $menu) {
			$mds_menu_options[$menu->term_id] = ('' != $menu->name) ? $menu->name : __('Untitled Menu #', 'mds_starter_theme') . $menu->term_id;
		}
	} else {
		$mds_menu_options[null] = __('No menus found', 'coc');
	}

	return $mds_menu_options;
}


function mds_carbon_get_contact_form_7() {
	$mds_posts = get_posts(array(
		'post_type'      => 'wpcf7_contact_form',
		'posts_per_page' => -1,
		'orderby'        => array(
			'title'      => 'ASC',
			'post_type'  => 'ASC'
		),
		'post_status'    => array('publish')
	));
	$mds_pages_options = array();

	if (is_array($mds_posts) && !empty($mds_posts)) {
		$mds_pages_options[null] = __('Choose a Form', 'omdesign');
		foreach ($mds_posts as $mds_post) {
			$mds_pages_options[$mds_post->ID] = ('' != $mds_post->post_title) ? '(' . $mds_post->post_type . ') ' .  $mds_post->post_title  : __('Untitled Form #', 'mds_starter_theme') . $mds_post->ID;
		}
	} else {
		$mds_pages_options[null] = __('No Forms Found', 'omdesign');
	}

	return $mds_pages_options;
}
