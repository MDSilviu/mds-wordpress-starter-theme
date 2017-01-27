<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Create Metabox
 *
 * @param $type (post_meta, term_meta, user_meta, comment_meta, nav_menu)
 * @param $name
 */
Container::make('post_meta', 'Custom Post Type Options')
    ->show_on_post_type(array('page', 'post'))
//    ->show_on_category($category_slug)
//    ->show_on_taxonomy_term($term_slug, $taxonomy)
//    ->show_on_page($page_path|$page_id)
//    ->show_on_page_children($parent_page_path)
//    ->show_on_template($template_path)
//    ->hide_on_template($template_path)
//    ->show_on_post_format($post_format)
//    ->show_on_level($level)
    ->set_context('normal') //normal, advanced, side
    ->set_priority('high') //high, core, default, low
    ->add_tab(__('Tab 1'), array(
        Field::make('text', '_crb_first_name', 'Text field'),
        Field::make('textarea', 'crb_services', 'Textarea')->set_rows(4),
        Field::make("rich_text", "crb_sidenote", "Wp-editor"),
        Field::make("date", "crb_event_start_date", "Date Picker"),
        Field::make('time', 'opens_at', 'Time Picker'),
        Field::make('date_time', 'eta', 'Date Time Picker'),
        Field::make("color", "crb_box_background", "Color Picker"),
        Field::make("checkbox", "crb_show_content", "Checkbox")->set_option_value('yes'),
        Field::make("select", "crb_content_align", "Select")
            ->add_options(array(
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
            )),
        Field::make("radio", "crb_subtitle_styling", "Radio")
            ->add_options(array(
                'em' => 'Italic',
                'strong' => 'Bold',
                'del' => 'Strike',
            )),
        Field::make("set", "crb_product_features", "Set")
            ->add_options(array(
                'bluetooth' => 'Bluetooth',
                'gps' => 'GPS navigation',
                'nfc' => 'Near field communication',
            )),
        Field::make("file", "crb_price_list", "File")->set_value_type('id'), //or url
        Field::make("image", "crb_price_list2", "Image")->set_value_type('id'), //or url
        Field::make("separator", "crb_style_options", "Seperator"),
        Field::make("sidebar", "crb_custom_sidebar", "Sidebar"),


    ))
    ->add_tab(__('Tab 2'), array(
        Field::make('complex', 'crb_test')
            ->set_collapsed()
            ->add_fields('driver', array(
                Field::make('text', 'name'),
                Field::make('text', 'drivers_license_id'),
                Field::make('rich_text', 'description'),
            ))
            ->set_header_template('
                <# if (name && drivers_license_id) { #>
                    Driver: {{ name }}, {{ drivers_license_id }}
                <# } #>
            '),

        Field::make('complex', 'crb_slides')
            ->set_layout('tabbed-horizontal')
            ->add_fields(array(
                Field::make('image', 'image')
        )),
    ));

