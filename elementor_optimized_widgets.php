<?php
/**
* Plugin Name
*
* @package           PluginPackage
* @author            Michael Gangolf
* @copyright         2023 Michael Gangolf
* @license           GPL-2.0-or-later
*
* @wordpress-plugin
* Plugin Name:       Optimized widgets for Elementor
* Description:       Reducing the DOM size by removing one of the default nested containers in each widget.
* Version:           1.0.3
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Michael Gangolf
* Author URI:        https://www.migaweb.de/
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Plugin;

add_action('init', static function () {
    if (!did_action('elementor/loaded')) {
        return false;
    }
});


function migaowfe_register($widgets_manager)
{

    require_once(__DIR__ . '/widgets/Headline.php');
    require_once(__DIR__ . '/widgets/Text.php');
    require_once(__DIR__ . '/widgets/Image.php');

    $widgets_manager->register(new \MIGAOWFE_Headline());
    $widgets_manager->register(new \MIGAOWFE_Text());
    $widgets_manager->register(new \MIGAOWFE_Image());

}
add_action('elementor/widgets/register', 'migaowfe_register');


function migaowfe_before_render($element)
{

    if ("miga_widget_optimized_headline" === $element->get_name()) {
        $element->add_render_attribute("_wrapper", ["class" => "elementor-widget-heading"]);
    }
    if ("miga_widget_optimized_text" === $element->get_name()) {
        $element->add_render_attribute("_wrapper", ["class" => "elementor-widget-editor"]);
    }
    if ("miga_widget_optimized_image" === $element->get_name()) {
        $element->add_render_attribute("_wrapper", ["class" => "elementor-widget-image"]);
    }
}
add_action("elementor/frontend/before_render", "migaowfe_before_render");


function migaowfe_groups($elements_manager)
{
    $elements_manager->add_category(
        'miga_widget_optimized',
        [
          'title' => 'Optimzed widgets',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'migaowfe_groups');
