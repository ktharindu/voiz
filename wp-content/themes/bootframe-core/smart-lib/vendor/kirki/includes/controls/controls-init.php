<?php

/**
 * Build the controls
 */
function kirki_customizer_controls( $wp_customize ) {

	$controls = apply_filters( 'kirki/controls', array() );

	if ( isset( $controls ) ) {
		foreach ( $controls as $control ) {

			if ( 'background' == $control['type'] ) {

				$wp_customize->add_setting( $control['setting'] . '_color', array(
					'default'    => $control['default']['color'],
					'type'       => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'capability' => 'edit_theme_options'
				) );

				$wp_customize->add_setting( $control['setting'] . '_image', array(
					'default'    => $control['default']['image'],
					'type'       => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'capability' => 'edit_theme_options'
				) );

				$wp_customize->add_setting( $control['setting'] . '_repeat', array(
					'default'    => $control['default']['repeat'],
					'type'       => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'capability' => 'edit_theme_options'
				) );

				$wp_customize->add_setting( $control['setting'] . '_size', array(
					'default'    => $control['default']['size'],
					'type'       => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'capability' => 'edit_theme_options'
				) );

				$wp_customize->add_setting( $control['setting'] . '_attach', array(
					'default'    => $control['default']['attach'],
					'type'       => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'capability' => 'edit_theme_options'
				) );

				$wp_customize->add_setting( $control['setting'] . '_position', array(
					'default'    => $control['default']['position'],
					'type'       => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'capability' => 'edit_theme_options'
				) );

				if ( false != $control['default']['opacity'] ) {

					$wp_customize->add_setting( $control['setting'] . '_opacity', array(
						'default'    => $control['default']['opacity'],
						'type'       => 'theme_mod',
						'sanitize_callback' => 'sanitize_text_field',
						'capability' => 'edit_theme_options'
					) );

				}
			} else {

				// Add settings
				$wp_customize->add_setting( $control['setting'], array(
					'default'    => isset( $control['default'] ) ? $control['default'] : '',
					'type'       => 'theme_mod',
					'sanitize_callback' => 'sanitize_text_field',
					'capability' => 'edit_theme_options'
				) );

			}

			// Checkbox controls
			if ( 'checkbox' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Checkbox_Control( $wp_customize, $control['setting'], array(
						'label'       => isset( $control['label'] ) ? $control['label'] : '',
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Background Controls
			} elseif ( 'background' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Color_Control( $wp_customize, $control['setting'] . '_color', array(
						'label'       => isset( $control['label'] ) ? $control['label'] : '',
						'section'     => $control['section'],
						'settings'    => $control['setting'] . '_color',
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => __( 'Background Color', 'bootframe-core' ),
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

				$wp_customize->add_control( new Kirki_Customize_Image_Control( $wp_customize, $control['setting'] . '_image', array(
						'label'       => null,
						'section'     => $control['section'],
						'settings'    => $control['setting'] . '_image',
						'priority'    => $control['priority'] + 1,
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'description' => null,
						'subtitle'    => __( 'Background Image', 'bootframe-core' ),
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

				$wp_customize->add_control( new Kirki_Select_Control( $wp_customize, $control['setting'] . '_repeat', array(
						'label'       => null,
						'section'     => $control['section'],
						'settings'    => $control['setting'] . '_repeat',
						'priority'    => $control['priority'] + 2,
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'choices'     => array(
							'no-repeat' => __( 'No Repeat', 'bootframe-core' ),
							'repeat'    => __( 'Repeat All', 'bootframe-core' ),
							'repeat-x'  => __( 'Repeat Horizontally', 'bootframe-core' ),
							'repeat-y'  => __( 'Repeat Vertically', 'bootframe-core' ),
							'inherit'   => __( 'Inherit', 'bootframe-core' )
						),
						'description' => null,
						'subtitle'    => __( 'Background Repeat', 'bootframe-core' ),
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

				$wp_customize->add_control( new Kirki_Customize_Radio_Control( $wp_customize, $control['setting'] . '_size', array(
						'label'       => null,
						'section'     => $control['section'],
						'settings'    => $control['setting'] . '_size',
						'priority'    => $control['priority'] + 3,
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'choices'     => array(
							'inherit' => __( 'Inherit', 'bootframe-core' ),
							'cover'   => __( 'Cover', 'bootframe-core' ),
							'contain' => __( 'Contain', 'bootframe-core' ),
						),
						'description' => null,
						'mode'        => 'buttonset',
						'subtitle'    => __( 'Background Size', 'bootframe-core' ),
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

				$wp_customize->add_control( new Kirki_Customize_Radio_Control( $wp_customize, $control['setting'] . '_attach', array(
						'label'       => null,
						'section'     => $control['section'],
						'settings'    => $control['setting'] . '_attach',
						'priority'    => $control['priority'] + 4,
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'choices'     => array(
							'inherit' => __( 'Inherit', 'bootframe-core' ),
							'fixed'   => __( 'Fixed', 'bootframe-core' ),
							'scroll'  => __( 'Scroll', 'bootframe-core' ),
						),
						'description' => null,
						'mode'        => 'buttonset',
						'subtitle'    => __( 'Background Attachment', 'bootframe-core' ),
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

				$wp_customize->add_control( new Kirki_Select_Control( $wp_customize, $control['setting'] . '_position', array(
						'label'       => null,
						'section'     => $control['section'],
						'settings'    => $control['setting'] . '_position',
						'priority'    => $control['priority'] + 5,
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'choices'     => array(
							'left-top'      => __( 'Left Top', 'bootframe-core' ),
							'left-center'   => __( 'Left Center', 'bootframe-core' ),
							'left-bottom'   => __( 'Left Bottom', 'bootframe-core' ),
							'right-top'     => __( 'Right Top', 'bootframe-core' ),
							'right-center'  => __( 'Right Center', 'bootframe-core' ),
							'right-bottom'  => __( 'Right Bottom', 'bootframe-core' ),
							'center-top'    => __( 'Center Top', 'bootframe-core' ),
							'center-center' => __( 'Center Center', 'bootframe-core' ),
							'center-bottom' => __( 'Center Bottom', 'bootframe-core' ),
						),
						'description' => null,
						'subtitle'    => __( 'Background Position', 'bootframe-core' ),
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

				if ( false != $control['default']['opacity'] ) {
					$wp_customize->add_control( new Kirki_Customize_Sliderui_Control( $wp_customize, $control['setting'] . '_opacity', array(
							'label'       => null,
							'section'     => $control['section'],
							'settings'    => $control['setting'] . '_opacity',
							'priority'    => $control['priority'] + 6,
							'choices'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 1,
							),
							'description' => null,
							'subtitle'    => __( 'Background Opacity', 'bootframe-core' ),
							'required'    => isset( $control['required'] ) ? $control['required'] : array(),
							'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
						) )
					);
				}

			// Color Controls
			} elseif ( 'color' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Color_Control( $wp_customize, $control['setting'], array(
						'label'       => isset( $control['label'] ) ? $control['label'] : '',
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => isset( $control['priority'] ) ? $control['priority'] : '',
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Image Controls
			} elseif ( 'image' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Image_Control( $wp_customize, $control['setting'], array(
						'label'       => isset( $control['label'] ) ? $control['label'] : '',
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Radio Controls
			} elseif ( 'radio' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Radio_Control( $wp_customize, $control['setting'], array(
						'label'       => isset( $control['label'] ) ? $control['label'] : '',
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'choices'     => $control['choices'],
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'mode'        => isset( $control['mode'] ) ? $control['mode'] : 'radio', // Can be 'radio', 'image' or 'buttonset'.
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Select Controls
			} elseif ( 'select' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Select_Control( $wp_customize, $control['setting'], array(
						'label'       => isset( $control['label'] ) ? $control['label'] : '',
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'choices'     => $control['choices'],
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Slider Controls
			} elseif ( 'slider' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Sliderui_Control( $wp_customize, $control['setting'], array(
						'label'       => isset( $control['label'] ) ? $control['label'] : '',
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'choices'     => $control['choices'],
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Text Controls
			} elseif ( 'text' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Text_Control( $wp_customize, $control['setting'], array(
						'label'       => isset( $control['label'] ) ? $control['label'] : '',
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Text Controls
			} elseif ( 'textarea' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Textarea_Control( $wp_customize, $control['setting'], array(
						'label'       => $control['label'],
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Upload Controls
			} elseif ( 'upload' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Upload_Control( $wp_customize, $control['setting'], array(
						'label'       => $control['label'],
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'choices'     => $control['choices'],
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Number Controls
			} elseif ( 'number' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Number_Control( $wp_customize, $control['setting'], array(
						'label'       => $control['label'],
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Multicheck Controls
			} elseif ( 'multicheck' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Multicheck_Control( $wp_customize, $control['setting'], array(
						'label'       => $control['label'],
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'choices'     => $control['choices'],
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);

			// Separator Controls
			} elseif ( 'group_title' == $control['type'] ) {

				$wp_customize->add_control( new Kirki_Customize_Group_Title_Control( $wp_customize, $control['setting'], array(
						'label'       => $control['label'],
						'section'     => $control['section'],
						'settings'    => $control['setting'],
						'priority'    => $control['priority'],
						'active_callback'    => isset( $control['active_callback'] ) ? $control['active_callback'] : null,
						'description' => isset( $control['description'] ) ? $control['description'] : null,
						'subtitle'    => isset( $control['subtitle'] ) ? $control['subtitle'] : '',
						'required'    => isset( $control['required'] ) ? $control['required'] : array(),
						'less_var'    => isset( $control['framework_var'] ) ? $control['framework_var'] : null,
					) )
				);
			}
		}
	}
}
add_action( 'customize_register', 'kirki_customizer_controls', 99 );
