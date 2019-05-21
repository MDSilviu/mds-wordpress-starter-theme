<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', __('Theme Options', 'mds_starter_theme'))
         ->set_page_parent('themes.php')
         ->add_tab(__('Header', 'mds_starter_theme'), array(
	         Field::make('image', 'header_logo', __('Logo', 'mds_starter_theme')),
         ))
         ->add_tab(__('Footer', 'mds_starter_theme'), array(
	         Field::make('textarea', 'footer_copyright', __('Copyright Text', 'mds_starter_theme')),
         ))
         ->add_tab(__('Other tab', 'mds_starter_theme'), array(

         ))
;