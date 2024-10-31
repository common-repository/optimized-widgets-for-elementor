<?php

class MIGAOWFE_Text extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'miga_widget_optimized_text';
    }

    public function get_title()
    {
      return esc_html__('Text Editor (optimized)', 'optimized-widgets-for-elementor');
  }

  public function get_icon()
  {
      return 'eicon-text';
  }

  public function get_keywords()
  {
      return [  ];
  }

  public function get_categories()
  {
      return [ 'miga_widget_optimized' ];
  }

  protected function register_controls()
  {

      $this->start_controls_section(
          'section_editor',
          [
          'label' => esc_html__('Text Editor', 'optimized-widgets-for-elementor'),
          ]
      );

      $this->add_control(
          'editor',
          [
              'label' => '',
              'type' => \Elementor\Controls_Manager::WYSIWYG,
              'default' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>',
          ]
      );

      $this->end_controls_section();

      $this->start_controls_section(
          'section_style',
          [
                    'label' => esc_html__('Text Editor', 'optimized-widgets-for-elementor'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
              'selectors' => [
                  '{{WRAPPER}}' => 'text-align: {{VALUE}};',
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
                    '{{WRAPPER}}' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow',
                'selector' => '{{WRAPPER}}',
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'label' => esc_html__('Margin', 'optimized-widgets-for-elementor'),
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} > p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} > p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
        );

        $this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background color', 'optimized-widgets-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					 '{{WRAPPER}} > p' => 'background-color: {{VALUE}}',
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

        $editor_content = $this->get_settings_for_display('editor');
        $editor_content = $this->parse_text_editor($editor_content);
        $this->add_inline_editing_attributes('editor', 'advanced');
        $hasP = stripos($editor_content, "<p>");
        if (!$hasP) {
            echo '<p>';
        }
        echo wp_kses_post($editor_content);
        if (!$hasP) {
            echo '</p>';
        }
    }


}
