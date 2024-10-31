<?php

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

class MIGAOWFE_Headline extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'miga_widget_optimized_headline';
    }

    public function get_title()
    {
      return esc_html__('Headline (optimized)', 'optimized-widgets-for-elementor');
  }

  public function get_icon()
  {
      return 'eicon-t-letter-bold';
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
          'section_title',
          [
                  'label' => esc_html__('Title', 'optimized-widgets-for-elementor'),
              ]
      );

      $this->add_control(
          'title',
          [
              'label' => esc_html__('Title', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::TEXTAREA,
              'ai' => [
                  'type' => 'text',
              ],
              'dynamic' => [
                  'active' => true,
              ],
              'placeholder' => esc_html__('Enter your title', 'optimized-widgets-for-elementor'),
              'default' => esc_html__('Add Your Heading Text Here', 'optimized-widgets-for-elementor'),
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
              'default' => [
                  'url' => '',
              ],
              'separator' => 'before',
          ]
      );

      $this->add_control(
          'size',
          [
              'label' => esc_html__('Size', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'default' => 'default',
              'options' => [
                  'default' => esc_html__('Default', 'optimized-widgets-for-elementor'),
                  'small' => esc_html__('Small', 'optimized-widgets-for-elementor'),
                  'medium' => esc_html__('Medium', 'optimized-widgets-for-elementor'),
                  'large' => esc_html__('Large', 'optimized-widgets-for-elementor'),
                  'xl' => esc_html__('XL', 'optimized-widgets-for-elementor'),
                  'xxl' => esc_html__('XXL', 'optimized-widgets-for-elementor'),
              ],
          ]
      );

      $this->add_control(
          'header_size',
          [
              'label' => esc_html__('HTML Tag', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'options' => [
                  'h1' => 'H1',
                  'h2' => 'H2',
                  'h3' => 'H3',
                  'h4' => 'H4',
                  'h5' => 'H5',
                  'h6' => 'H6',
                  'div' => 'div',
                  'span' => 'span',
                  'p' => 'p',
              ],
              'default' => 'h2',
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
                  'justify' => [
                      'title' => esc_html__('Justified', 'optimized-widgets-for-elementor'),
                      'icon' => 'eicon-text-align-justify',
                  ],
              ],
              'default' => '',
              'selectors' => [
                  '{{WRAPPER}}' => 'text-align: {{VALUE}};',
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
          'section_title_style',
          [
              'label' => esc_html__('Title', 'optimized-widgets-for-elementor'),
              'tab' => \Elementor\Controls_Manager::TAB_STYLE,
          ]
      );

      $this->add_control(
          'title_color',
          [
              'label' => esc_html__('Text Color', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::COLOR,
              'global' => [
                  'default' => Global_Colors::COLOR_PRIMARY,
              ],
              'selectors' => [
                  '{{WRAPPER}} .elementor-heading-title' => 'color: {{VALUE}};',
              ],
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Typography::get_type(),
          [
              'name' => 'typography',
              'global' => [
                  'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
              ],
              'selector' => '{{WRAPPER}} .elementor-heading-title',
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Text_Stroke::get_type(),
          [
              'name' => 'text_stroke',
              'selector' => '{{WRAPPER}} .elementor-heading-title',
          ]
      );

      $this->add_group_control(
          \Elementor\Group_Control_Text_Shadow::get_type(),
          [
              'name' => 'text_shadow',
              'selector' => '{{WRAPPER}} .elementor-heading-title',
          ]
      );

      $this->add_control(
          'blend_mode',
          [
              'label' => esc_html__('Blend Mode', 'optimized-widgets-for-elementor'),
              'type' => \Elementor\Controls_Manager::SELECT,
              'options' => [
                  '' => esc_html__('Normal', 'optimized-widgets-for-elementor'),
                  'multiply' => esc_html__('Multiply', 'optimized-widgets-for-elementor'),
                  'screen' => esc_html__('Screen', 'optimized-widgets-for-elementor'),
                  'overlay' => esc_html__('Overlay', 'optimized-widgets-for-elementor'),
                  'darken' => esc_html__('Darken', 'optimized-widgets-for-elementor'),
                  'lighten' => esc_html__('Lighten', 'optimized-widgets-for-elementor'),
                  'color-dodge' => esc_html__('Color Dodge', 'optimized-widgets-for-elementor'),
                  'saturation' => esc_html__('Saturation', 'optimized-widgets-for-elementor'),
                  'color' => esc_html__('Color', 'optimized-widgets-for-elementor'),
                  'difference' => esc_html__('Difference', 'optimized-widgets-for-elementor'),
                  'exclusion' => esc_html__('Exclusion', 'optimized-widgets-for-elementor'),
                  'hue' => esc_html__('Hue', 'optimized-widgets-for-elementor'),
                  'luminosity' => esc_html__('Luminosity', 'optimized-widgets-for-elementor'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-heading-title' => 'mix-blend-mode: {{VALUE}}',
                ],
                'separator' => 'none',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Margin', 'optimized-widgets-for-elementor'),
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} > *' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'label' => esc_html__('Padding', 'optimized-widgets-for-elementor'),
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} > *' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        if ('' === $settings['title']) {
            return;
        }

        $this->add_render_attribute('title', 'class', 'elementor-heading-title');

        if (!empty($settings['size'])) {
            $this->add_render_attribute('title', 'class', 'elementor-size-' . $settings['size']);
        }

        $this->add_inline_editing_attributes('title');

        $title = $settings['title'];

        if (!empty($settings['link']['url'])) {
            $this->add_link_attributes('url', $settings['link']);
            $title = sprintf('<a %1$s>%2$s</a>', $this->get_render_attribute_string('url'), $title);
        }

        $title_html = sprintf('<%1$s %2$s>%3$s</%1$s>', $settings['header_size'], $this->get_render_attribute_string('title'), $title);

        echo wp_kses_post($title_html);
    }
}
