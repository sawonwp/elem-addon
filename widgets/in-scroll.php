<?php 
class elem_in_scroll extends \Elementor\Widget_Base {
public function get_name() : string{
    return "elem_in_scroll";
}
public function get_title(): string {
    return esc_html__("Infinity Logo scroll", "elem_addon");
}
public function get_categories(): array {
    return ['first-category'];
}
public function get_icon() : string {
    return "eicon-slider-push";
}
public function get_keywords(): array {
    return ['scroll', 'marquee', 'logo slider'];
}
public function get_style_depends(): array {
    return  ["in-scroll-css"];
}
public function get_script_depends(): array {
    return ["in-scroll-js", "jquery"];
}
public function has_widget_inner_wrapper() : bool{
    return true;
}

public function is_dynamic_content() : bool {
    return false;
}

    // Content tab
 protected function register_controls() :void {
    $this->start_controls_section(
        'logo-img', 
        [
            'label' => esc_html__('Logos', 'elem_addon'),
            'tab' => Elementor\Controls_manager:: TAB_CONTENT,
        
        ]

    );


        // /////////////////////////////////////////////////
        //// New Code  ----------- 
        ///////////////////////////////////////////////////
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'textdomain' ),
						'label_block' => true,
					],
					[
						'name' => 'list_content',
						'label' => esc_html__( 'Content', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'List Content' , 'textdomain' ),
						'show_label' => false,
					],
					[
						'name' => 'list_color',
						'label' => esc_html__( 'Color', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
						],
					]
				],
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'elem_addon' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);


        $this->add_control(
            'item_gap', 
            [
                'type' => \Elementor\Controls_manager::SLIDER,
                'label' => esc_html__('Item Spacing', 'elem_addon'),
                'label_block' => true,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'unit' => 'px',
                    'size' => '20',
                ],
                'range' => [
                    'px' =>[
                        'min' => 0,
                        'max' =>200, 
                        'step' => 1,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .scroll_wrapper' => 'gap: {{SIZE}}{{UNIT}}',                
                ],

            ]
        );

        $this->add_control(
            'transition_speed', 
            [
                'label' => esc_html__('Transition Speed(ms)', 'elem_addon'),
                'type' => \Elementor\Controls_manager:: SLIDER,
                'size_unit' => ['ms'],
                'label_block' => true,
                'default' => [
                    'unit' => 'ms',
                    'size' => 1000,
                ], 
                'range' => [
                    'ms' => [
                        'min' => 100, 
                        'max' => 10000, 
                        'step' => 100,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .scroll_wrapper' =>  'animation-duration: {{SIZE}}{{UNIT}};'
                ],

            ] 

        );

        $this->add_control(
            'item_seperator', 
            [
                'label' => esc_html('Seperator', 'elem_addon'),
                'type' => \Elementor\Controls_manager::CHOOSE,
                'options' => [                    
                    'star' => [
                        'title' => esc_html__('Star', 'elem_addon'),
                        'icons' => 'eicon-star'
                    ],
                   
                    'Circle-fill' => [
                        'title' => esc_html('Circle', 'elem_addon'),
                        'icons' => 'eicon-circle',
                    ],                   

                ],
                'default' => 'star',
                'selectors' => [
                    '{{WRAPPER}} li.repeater::after'  => 'Content: {{VALUE}};',
                ]

            ]
        );

        $this->end_controls_section();


        ////////////////////////////////////////////////
        /// Style Section Started
        ///////////////////////////////////////////////

         $this->start_controls_section(
            'style_content', 
            [   'label' => esc_html__('General', 'elem_addon'),
                'tab' => \Elementor\Controls_manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'txt_typography',
                'label' => esc_html__('Typography', 'elem_addon'),
                'selector' => '{{WRAPPER}} li',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
                ], 
			]      

        );

        $this->add_control(
            'scrl_txt_col',
            [
                'label' => esc_html__('Color', 'elem_addon'),
                'type' => \Elementor\Controls_manager::COLOR,
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
                ]
            ]
        );

      
        $this->end_controls_section();


        $this->start_controls_section(
        'styling', 
        [
            'label' => esc_html__('Style Image Manager', 'elem_addon'),
            'tab' => Elementor\Controls_manager:: TAB_STYLE,
        
        ]
        );

        $this->add_control(
            'img_radius', [
                'label' => esc_html__('Border Radius', 'elem_addon'),
                'type'=> \Elementor\Controls_manager::DIMENSIONS,
                'size_units'=> ['px', '%', 'em'],
                'label_block' => true,
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0, 
                    'left' => 0,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .repeater p img' => 'border-radius: {{TOP}}{{UNIT}}  {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            
            ]
        );

        $this->add_control(
        'img_style', 
            [
                'type' => \Elementor\controls_manager::SELECT,
                'label' => esc_html__('Image Position', 'elem_addon'),
                'options' => [
                    'row-reverse' => esc_html__('Image On Left', 'elem_addon'),
                    'row' => esc_html__('Image on Right', 'elem_addon'),
                ],                
                'default' => 'row-reverse',
                'selectors' => [
                    '{{WRAPPER}} .repeater' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
        'img_size',
            [
                'type' => \Elementor\Controls_manager::SELECT,
                'label' => esc_html__('Image Size', 'elem_addon'),
                'options' => [
                    '15px' => esc_html__('Extra Small', 'elem_addon'),
                    '20px'=> esc_html__('Small', 'elem_addon'),
                    '25px' => esc_html__('Medium', 'elem_addon'),
                    '50px' => esc_html__('Large', 'elem_addon'),
                    '100%'=> esc_html__('Full', 'elem_addon'),
                ],
                'defalut' => 'Small',
                'prefix_class' => 'img_size',
                
                'selectors' => [
                    '{{WRAPPER}} .repeater img' => 'width: {{SIZE}}',     
                    '{{WRAPPER}} .repeater p'    => 'width: {{SIZE}}',
                ],
            ]
        );

        $this->end_controls_section();

    } // end register controls

	protected function render(): void {
		$settings = $this->get_settings_for_display();

		if ( $settings['list'] ) {
            echo '<ul class="scroll_wrapper">';
			foreach (  $settings['list'] as $item ) {
				echo '<li class="repeater elementor-repeater-' . esc_attr( $item['_id'] ) . '">' . $item['list_title'] .  $item['list_content'] .'</li>';				
			}
			echo '</ul>';
		}
	}

	protected function content_template(): void {
		?>
		<# if ( settings.list.length ) { #>
			<ul class="scroll_wrapper">
			<# _.each( settings.list, function( item ) { #>
				<li class="repeater elementor-repeater-{{ item._id }}">{{{ item.list_title }}} {{{item.list_content}}}</li>				
			<# }); #>
			</ul>
		<# } #>
		<?php
	}



}//end class