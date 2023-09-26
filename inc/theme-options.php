<?php
/**
 * Option pages
 *
 * PHP version 8
 *
 * @category Themes
 * @package  Theme_Acf
 * @author   Aldo Paz Velasquez <aldveq80@gmail.com>
 * @license  GPL-2.0-or-later http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

if (function_exists('acf_add_options_page') ) {
        
    acf_add_options_page(
        array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'parent_slug' => '',
        'position' => false,
        'icon_url' => false,
        'redirect' => false,
        )
    );
}
