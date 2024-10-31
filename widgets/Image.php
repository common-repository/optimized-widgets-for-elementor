<?php

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class MIGAOWFE_Image extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'miga_widget_optimized_image';
    }

    public function get_title()
    {
      return esc_html__('Image (optimized)', 'optimized-widgets-for-elementor');
  }

  public function get_icon()
  {
      return 'eicon-image';
  }

  public function get_keywords()
  {
      return [ ];
  }

  public function get_categories()
  {
      return [ 'miga_widget_optimized' ];
  }

  protected function register_controls()
  {

      $this->start_controls_section(
          'section_image',
          [
                'label' => esc_html__('Image', 'optimized-widgets-for-elementor'),
            ]
      );

      $this->add_control(
          'image',
          [
              'label' => esc_html__('Choose Image', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::MEDIA,
              'dynamic' => [
                  'active' => true,
              ],
              'default' => [
                  'url' => \Elementor\Utils::get_placeholder_image_src(),
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Image_Size::get_type(),
          [
              'name' => 'image',
              'default' => 'large',
              'separator' => 'none',
          ]
      );

      $this->add_responsive_control(
          'align',
          [
              'label' => esc_html__('Alignment', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::CHOOSE,
              'options' => [
                  'left' => [
                      'title' => esc_html__('Left', 'optimized-widgets-for-elementor'),
                      'icon' => 'eicon-text-align-left',
                  ],
                  'center' => [
                      'title' => esc_html__('Center', 'optimized-widgets-for-elementor'),
                      'icon' => 'eicon-text-align-center',
                  ],
                  'right' => [
                      'title' => esc_html__('Right', 'optimized-widgets-for-elementor'),
                      'icon' => 'eicon-text-align-right',
                  ],
              ],
              'selectors' => [
                  '{{WRAPPER}}' => 'text-align: {{VALUE}};',
              ],
          ]
      );

      $this->add_control(
          'caption_source',
          [
              'label' => esc_html__('Caption', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'options' => [
                  'none' => esc_html__('None', 'optimized-widgets-for-elementor'),
                  'attachment' => esc_html__('Attachment Caption', 'optimized-widgets-for-elementor'),
                  'custom' => esc_html__('Custom Caption', 'optimized-widgets-for-elementor'),
              ],
              'default' => 'none',
          ]
      );

      $this->add_control(
          'caption',
          [
              'label' => esc_html__('Custom Caption', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => '',
              'placeholder' => esc_html__('Enter your image caption', 'optimized-widgets-for-elementor'),
              'condition' => [
                  'caption_source' => 'custom',
              ],
              'dynamic' => [
                  'active' => true,
              ],
          ]
      );

      $this->add_control(
          'link_to',
          [
              'label' => esc_html__('Link', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'default' => 'none',
              'options' => [
                  'none' => esc_html__('None', 'optimized-widgets-for-elementor'),
                  'file' => esc_html__('Media File', 'optimized-widgets-for-elementor'),
                  'custom' => esc_html__('Custom URL', 'optimized-widgets-for-elementor'),
              ],
          ]
      );

      $this->add_control(
          'link',
          [
              'label' => esc_html__('Link', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::URL,
              'dynamic' => [
                  'active' => true,
              ],
              'condition' => [
                  'link_to' => 'custom',
              ],
              'show_label' => false,
          ]
      );

      $this->add_control(
          'open_lightbox',
          [
              'label' => esc_html__('Lightbox', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'description' => sprintf(
                  esc_html__('Manage your site’s lightbox settings in the %1$sLightbox panel%2$s.', 'optimized-widgets-for-elementor'),
                  '<a href="javascript: $e.run( \'panel/global/open\' ).then( () => $e.route( \'panel/global/settings-lightbox\' ) )">',
                  '</a>'
              ),
              'default' => 'default',
              'options' => [
                  'default' => esc_html__('Default', 'optimized-widgets-for-elementor'),
                  'yes' => esc_html__('Yes', 'optimized-widgets-for-elementor'),
                  'no' => esc_html__('No', 'optimized-widgets-for-elementor'),
              ],
              'condition' => [
                  'link_to' => 'file',
              ],
          ]
      );

      $this->add_control(
          'view',
          [
              'label' => esc_html__('View', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::HIDDEN,
              'default' => 'traditional',
          ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
          'section_style_image',
          [
              'label' => esc_html__('Image', 'optimized-widgets-for-elementor'),
              'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
          ]
      );

      $this->add_responsive_control(
          'width',
          [
              'label' => esc_html__('Width', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SLIDER,
              'default' => [
                  'unit' => '%',
              ],
              'tablet_default' => [
                  'unit' => '%',
              ],
              'mobile_default' => [
                  'unit' => '%',
              ],
              'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
              'range' => [
                  '%' => [
                      'min' => 1,
                      'max' => 100,
                  ],
                  'px' => [
                      'min' => 1,
                      'max' => 1000,
                  ],
                  'vw' => [
                      'min' => 1,
                      'max' => 100,
                  ],
              ],
              'selectors' => [
                  '{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
              ],
          ]
      );

      $this->add_responsive_control(
          'space',
          [
              'label' => esc_html__('Max Width', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SLIDER,
              'default' => [
                  'unit' => '%',
              ],
              'tablet_default' => [
                  'unit' => '%',
              ],
              'mobile_default' => [
                  'unit' => '%',
              ],
              'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
              'range' => [
                  '%' => [
                      'min' => 1,
                      'max' => 100,
                  ],
                  'px' => [
                      'min' => 1,
                      'max' => 1000,
                  ],
                  'vw' => [
                      'min' => 1,
                      'max' => 100,
                  ],
              ],
              'selectors' => [
                  '{{WRAPPER}} img' => 'max-width: {{SIZE}}{{UNIT}};',
              ],
          ]
      );

      $this->add_responsive_control(
          'height',
          [
              'label' => esc_html__('Height', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SLIDER,
              'size_units' => [ 'px', '%', 'em', 'rem', 'vh', 'custom' ],
              'range' => [
                  'px' => [
                      'min' => 1,
                      'max' => 500,
                  ],
                  'vh' => [
                      'min' => 1,
                      'max' => 100,
                  ],
              ],
              'selectors' => [
                  '{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
              ],
          ]
      );

      $this->add_responsive_control(
          'object-fit',
          [
              'label' => esc_html__('Object Fit', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'condition' => [
                  'height[size]!' => '',
              ],
              'options' => [
                  '' => esc_html__('Default', 'optimized-widgets-for-elementor'),
                  'fill' => esc_html__('Fill', 'optimized-widgets-for-elementor'),
                  'cover' => esc_html__('Cover', 'optimized-widgets-for-elementor'),
                  'contain' => esc_html__('Contain', 'optimized-widgets-for-elementor'),
              ],
              'default' => '',
              'selectors' => [
                  '{{WRAPPER}} img' => 'object-fit: {{VALUE}};',
              ],
          ]
      );

      $this->add_responsive_control(
          'object-position',
          [
              'label' => esc_html__('Object Position', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'options' => [
                  'center center' => esc_html__('Center Center', 'optimized-widgets-for-elementor'),
                  'center left' => esc_html__('Center Left', 'optimized-widgets-for-elementor'),
                  'center right' => esc_html__('Center Right', 'optimized-widgets-for-elementor'),
                  'top center' => esc_html__('Top Center', 'optimized-widgets-for-elementor'),
                  'top left' => esc_html__('Top Left', 'optimized-widgets-for-elementor'),
                  'top right' => esc_html__('Top Right', 'optimized-widgets-for-elementor'),
                  'bottom center' => esc_html__('Bottom Center', 'optimized-widgets-for-elementor'),
                  'bottom left' => esc_html__('Bottom Left', 'optimized-widgets-for-elementor'),
                  'bottom right' => esc_html__('Bottom Right', 'optimized-widgets-for-elementor'),
              ],
              'default' => 'center center',
              'selectors' => [
                  '{{WRAPPER}} img' => 'object-position: {{VALUE}};',
              ],
              'condition' => [
                  'object-fit' => 'cover',
              ],
          ]
      );

      $this->add_control(
          'separator_panel_style',
          [
              'type' => \Elementor\Controls_Manager::DIVIDER,
              'style' => 'thick',
          ]
      );

      $this->start_controls_tabs('image_effects');

      $this->start_controls_tab(
          'normal',
          [
              'label' => esc_html__('Normal', 'optimized-widgets-for-elementor'),
          ]
      );

      $this->add_control(
          'opacity',
          [
              'label' => esc_html__('Opacity', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SLIDER,
              'range' => [
                  'px' => [
                      'max' => 1,
                      'min' => 0.10,
                      'step' => 0.01,
                  ],
              ],
              'selectors' => [
                  '{{WRAPPER}} img' => 'opacity: {{SIZE}};',
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Css_Filter::get_type(),
          [
              'name' => 'css_filters',
              'selector' => '{{WRAPPER}} img',
          ]
      );

      $this->end_controls_tab();

      $this->start_controls_tab(
          'hover',
          [
              'label' => esc_html__('Hover', 'optimized-widgets-for-elementor'),
          ]
      );

      $this->add_control(
          'opacity_hover',
          [
              'label' => esc_html__('Opacity', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SLIDER,
              'range' => [
                  'px' => [
                      'max' => 1,
                      'min' => 0.10,
                      'step' => 0.01,
                  ],
              ],
              'selectors' => [
                  '{{WRAPPER}}:hover img' => 'opacity: {{SIZE}};',
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Css_Filter::get_type(),
          [
              'name' => 'css_filters_hover',
              'selector' => '{{WRAPPER}}:hover img',
          ]
      );

      $this->add_control(
          'background_hover_transition',
          [
              'label' => esc_html__('Transition Duration', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SLIDER,
              'range' => [
                  'px' => [
                      'max' => 3,
                      'step' => 0.1,
                  ],
              ],
              'selectors' => [
                  '{{WRAPPER}} img' => 'transition-duration: {{SIZE}}s',
              ],
          ]
      );

      $this->add_control(
          'hover_animation',
          [
              'label' => esc_html__('Hover Animation', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
          ]
      );

      $this->end_controls_tab();

      $this->end_controls_tabs();

      $this->add_group_control(
          \Elementor\Group_Control_Border::get_type(),
          [
              'name' => 'image_border',
              'selector' => '{{WRAPPER}} img',
              'separator' => 'before',
          ]
      );

      $this->add_responsive_control(
          'image_border_radius',
          [
              'label' => esc_html__('Border Radius', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
              'selectors' => [
                  '{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Box_Shadow::get_type(),
          [
              'name' => 'image_box_shadow',
              'exclude' => [
                  'box_shadow_position',
              ],
              'selector' => '{{WRAPPER}} img',
          ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
          'section_style_caption',
          [
              'label' => esc_html__('Caption', 'optimized-widgets-for-elementor'),
              'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
              'condition' => [
                  'caption_source!' => 'none',
              ],
          ]
      );

      $this->add_responsive_control(
          'caption_align',
          [
              'label' => esc_html__('Alignment', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::CHOOSE,
              'options' => [
                  'left' => [
                      'title' => esc_html__('Left', 'optimized-widgets-for-elementor'),
                      'icon' => 'eicon-text-align-left',
                  ],
                  'center' => [
                      'title' => esc_html__('Center', 'optimized-widgets-for-elementor'),
                      'icon' => 'eicon-text-align-center',
                  ],
                  'right' => [
                      'title' => esc_html__('Right', 'optimized-widgets-for-elementor'),
                      'icon' => 'eicon-text-align-right',
                  ],
                  'justify' => [
                      'title' => esc_html__('Justified', 'optimized-widgets-for-elementor'),
                      'icon' => 'eicon-text-align-justify',
                  ],
              ],
              'default' => '',
              'selectors' => [
                  '{{WRAPPER}} .widget-image-caption' => 'text-align: {{VALUE}};',
              ],
          ]
      );

      $this->add_control(
          'text_color',
          [
              'label' => esc_html__('Text Color', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'default' => '',
              'selectors' => [
                  '{{WRAPPER}} .widget-image-caption' => 'color: {{VALUE}};',
              ],
              'global' => [
                  'default' => Global_Colors::COLOR_TEXT,
              ],
          ]
      );

      $this->add_control(
          'caption_background_color',
          [
              'label' => esc_html__('Background Color', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'selectors' => [
                  '{{WRAPPER}} .widget-image-caption' => 'background-color: {{VALUE}};',
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
              'name' => 'caption_typography',
              'selector' => '{{WRAPPER}} .widget-image-caption',
              'global' => [
                  'default' => Global_Typography::TYPOGRAPHY_TEXT,
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Text_Shadow::get_type(),
          [
              'name' => 'caption_text_shadow',
              'selector' => '{{WRAPPER}} .widget-image-caption',
          ]
      );

      $this->add_responsive_control(
          'caption_space',
          [
              'label' => esc_html__('Spacing', 'optimized-widgets-for-elementor'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-image-caption' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    public function render_content()
    {
        require("includes/render_content.php");
    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if (empty($settings['image']['url'])) {
            return;
        }



        $has_caption = $this->has_caption($settings);

        $link = $this->get_link_url($settings);

        if ($link) {
            $this->add_link_attributes('link', $link);

            if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
                $this->add_render_attribute('link', [
                  'class' => 'elementor-clickable',
                ]);
            }

            if ('custom' !== $settings['link_to']) {
                $this->add_lightbox_data_attributes('link', $settings['image']['id'], $settings['open_lightbox']);
            }
        }

        if ($has_caption) :
            echo '<figure class="wp-caption">';
        endif;
        if ($link) :
            echo '<a ';
            $this->print_render_attribute_string('link');
            echo '>';
        endif;
        \Elementor\Group_Control_Image_Size::print_attachment_image_html($settings);
        if ($link) :
            echo '</a>';
        endif;
        if ($has_caption) :
            echo '<figcaption class="widget-image-caption wp-caption-text">'.wp_kses_post($this->get_caption($settings)).'</figcaption>';
        endif;
        if ($has_caption) :
            echo '</figure>';
        endif;

    }

    private function has_caption($settings)
    {
        return (!empty($settings['caption_source']) && 'none' !== $settings['caption_source']);
    }

    private function get_caption($settings)
    {
        $caption = '';
        if (!empty($settings['caption_source'])) {
            switch ($settings['caption_source']) {
                case 'attachment':
                    $caption = wp_get_attachment_caption($settings['image']['id']);
                    break;
                case 'custom':
                    $caption = !\Elementor\Utils::is_empty($settings['caption']) ? $settings['caption'] : '';
            }
        }
        return $caption;
    }

    protected function get_link_url($settings)
    {
        if ('none' === $settings['link_to']) {
            return false;
        }

        if ('custom' === $settings['link_to']) {
            if (empty($settings['link']['url'])) {
                return false;
            }

            return $settings['link'];
        }

        return [ 'url' => $settings['image']['url'] ];
    }
}
