<?php
if(!defined('ABSPATH')){
    exit;
}

class elem_addon_widget extends \Elementor\Widget_Base{
    public function get_name(): string{
        return 'widget1';
    }
    public function get_title(): string {
        return esc_html('widget-1', 'elem_addon');
    }   
    public function get_icon(): string {
        return 'eicon-code';
    }
    public function get_categories(): array {
        return ['basic'];
    }
    public function get_keywords(): array{
      return  [ 'widget', 'list'];
    }
    public function has_widget_inner_wrapper(): bool {
        return false;
    }
    public function is_dynamic_content(): bool {
        return false;
    }

   protected function register_controls(): void {
        $this->start_controls_section(
            'content_section', 
            [
                'label' => esc_html__('Primary Title', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
                
            ]
        );
        $this->add_control(
            'text2', 
            [
                'label' => esc_html__('Primary title', 'elem_addon'),
                'type' => \Elementor\Controls_manager::TEXT,
                // 'input_type' => 'text',
                'placeholder' => esc_html__('Add your text here', 'elem_addon'),
            ]
        );

        $this->add_control(
            'number', 
            [
                'label' => esc_html__('Spacing', 'elem_addon'),
                'type' => \Elementor\Controls_manager::NUMBER,
                // 'input_type' => 'number',    optional
                'placeholder' => esc_html('top-bottom', 'elem_addon'),             
            ]
        );

        $this->add_control(
			'select',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => esc_html__( 'Lightbox', 'textdomain' ),
				'options' => [
					'default' => esc_html__( 'Default', 'textdomain' ),
					'yes' => esc_html__( 'Yes2', 'textdomain' ),
					'no' => esc_html__( 'No2', 'textdomain' ),
				],
				'default' => 'no',
			]
		);

        $this->add_control(
			'textarea',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Textarea', 'textdomain' ),
                'max' => 10,
				
			]
		);

        // $this->add_control(
        //     'Choice', 
        //     [
        //         'type' => \Elementor\Controls_Manager::CHOOSE,
        //         'label' => esc_html__('Choose your alignment', 'elem_addon'),
        //         'options' => [
        //             'left' =>['icon' => 'eicon-text-align-left'],
        //             'right' => ['icon' => 'eicon-text-align-center'],
        //             'center' => ['icon' => 'eicon-text-align-right'],                    
        //         ],
        //         'default' => 'left', 
        //     ]
        // );

        $this->add_control(
			'text',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),

			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style2', 
            [
                'label' => esc_html__('style', 'elem_addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,                
            ]
        );
        $this->add_control(
            'color', 
            [
                'label' => esc_html__('color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'default' => '#A00',
                'selectors' => [
                '{{WRAPPER}} H3' => 'color: {{VALUE}}',
            ],
            ]            
        );

        $this->add_control(
            'Choice', 
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Choose your alignment', 'elem_addon'),
                'options' => [
                    'left' =>['icon' => 'eicon-text-align-left'],
                    'center' => ['icon' => 'eicon-text-align-center'],
                    'right' => ['icon' => 'eicon-text-align-right'],                    
                ],
                'default' => 'left', 
                'selectors' =>[
                    //  '{{WRAPPER}} h3' => 'text-align: {{VALUE}}',
                    //  '{{WRAPPER}} p' => 'text-align: {{VALUE}}',
                     '{{WRAPPER}} h3, {{WRAPPER}} p' => 'text-align : {{value}}',
                   
                ]
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
                'label' => esc_html__('Primary content', 'elem_addon'),
				'selector' => '{{WRAPPER}} h3',
			]
		);

        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Social Icons', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'include' => [
					'fa fa-facebook',
					'fa fa-flickr',
					'fa fa-google-plus',
					'fa fa-instagram',
					'fa fa-linkedin',
					'fa fa-pinterest',
					'fa fa-reddit',
					'fa fa-twitch',
					'fa fa-twitter',
					'fa fa-vimeo',
					'fa fa-youtube',
				],
				'default' => 'fa fa-facebook',
			]
		);


        $this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

        $this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Additional Options', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

        $this->end_controls_section();            
        }

   

   protected function render(): void {
        $settings2 = $this->get_settings_for_display();

        if(empty($settings2['text'] || $settings2['text2']  )){
            return;
        }
        ?>
            <h3 class="elementor_widget1">
                <?php echo $settings2['text'];?>
            </h3>

            <p class="elementor_widget1">
                <?php echo $settings2['text2'];?>
            </p>
            
        <?php
   }






}
   







