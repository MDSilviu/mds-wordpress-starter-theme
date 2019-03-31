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

/**
 * Select options of post ids
 *
 * @param array $post_types
 * @return array
 */
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
		$mds_pages_options[null] = __('Choose Post', 'coc');
		foreach ($mds_posts as $mds_post) {
			$mds_pages_options[$mds_post->ID] = ('' != $mds_post->post_title) ? '(' . $mds_post->post_type . ') ' .  $mds_post->post_title : __('Untitled Post #', 'coc') . $mds_post->ID;
		}
	} else {
		$mds_pages_options[null] = __('No Posts Found', 'coc');
	}

	return $mds_pages_options;
}

function mds_carbon_select_team_member_id() {
	return mds_carbon_select_posts_id('team');
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
		$mds_pages_options[null] = __('Choose Post', 'coc');
		foreach ($mds_posts as $mds_post) {
			$mds_pages_options[$mds_post->post_name] = ('' != $mds_post->post_title) ? '(' . $mds_post->post_type . ') ' .  $mds_post->post_title : __('Untitled Post #', 'coc') . $mds_post->ID;
		}
	} else {
		$mds_pages_options[null] = __('No Posts Found', 'coc');
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
		$mds_pages_options[null] = __('Choose One', 'coc');
		foreach ($mds_terms as $mds_term) {
			$mds_pages_options[$mds_term->term_id] = $mds_term->name;
		}
	} else {
		$mds_pages_options[null] = __('No items Found', 'coc');
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
		$mds_pages_options[null] = __('No items Found', 'coc');
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
			$mds_menu_options[$menu->term_id] = ('' != $menu->name) ? $menu->name : __('Untitled Menu #', 'coc') . $menu->term_id;
		}
	} else {
		$mds_menu_options[null] = __('No menus found', 'coc');
	}

	return $mds_menu_options;
}