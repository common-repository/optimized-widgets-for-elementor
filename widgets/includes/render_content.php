<?php
if ( ! defined( 'ABSPATH' ) ) exit;
do_action('elementor/widget/before_render_content', $this);

ob_start();

$skin = $this->get_current_skin();
if ($skin) {
    $skin->set_parent($this);
    $skin->render_by_mode();
} else {
    $this->render_by_mode();
}

$widget_content = ob_get_clean();
echo wp_kses_post($widget_content);
