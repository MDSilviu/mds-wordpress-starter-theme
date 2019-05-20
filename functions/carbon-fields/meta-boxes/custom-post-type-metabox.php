<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Create Metabox
 *
 * @param $type (post_meta, term_meta, user_meta, comment_meta, nav_menu)
 * @param $name
 */
Container::make('post_meta', 'Example metabox')
         ->show_on_post_type(array('page', 'post'))
         ->set_context('normal')
         ->set_priority('high')
         ->add_fields(array(
	         Field::make('complex', 'page_content', __('Content', 'mindclash'))
	              ->set_datastore(new Serialized_Post_Meta_Datastore())
	              ->set_collapsed(true)
	              ->add_fields('intro_block', __('Title & Intro Text Block', 'mindclash'), array(
		              Field::make('text', 'page_with_form')
		                   ->set_attribute('type', 'hidden')
		                   ->set_classes(array('cc--hidden'))
		                   ->set_default_value(true),
		              Field::make('text', 'title', __("Title", 'mindclash')),
		              Field::make('rich_text', 'text', __("Content", 'mindclash'))
	              ))
	              ->set_header_template('Title & Intro Text Block'),
	         Field::make("image", "banner_image_id", __("Banner Background Image", 'mds_starter_theme'))
	              ->set_width(30),
	         Field::make('select', 'banner_size', __("Banner Size", 'mds_starter_theme'))
	              ->set_options(array(
		              '' => __("Small", 'mds_starter_theme'),
		              'cc--large' => __("Large", 'mds_starter_theme'),
	              ))
	              ->set_width(70),
	         Field::make("rich_text", "banner_title", __("Banner Title", 'mds_starter_theme')),
	         Field::make("rich_text", "banner_caption", __("Banner Caption", 'mds_starter_theme')),
	         Field::make("rich_text", "banner_footer", __("Banner Footer", 'mds_starter_theme')),
         ))
;
