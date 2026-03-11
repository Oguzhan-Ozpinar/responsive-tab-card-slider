<?php
/**
 * Responsive Tab Card Slider widget.
 *
 * @package responsive-tab-card-slider
 */

namespace RTCS\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Responsive Tab to Card Slider widget for Elementor.
 */
class Responsive_Tab_Card_Slider_Widget extends Widget_Base {
	/**
	 * Widget slug.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'responsive_tab_card_slider';
	}

	/**
	 * Widget title in editor.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Responsive Tab Card Slider', 'responsive-tab-card-slider' );
	}

	/**
	 * Widget icon in editor.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-slider-push';
	}

	/**
	 * Elementor category.
	 *
	 * @return string[]
	 */
	public function get_categories() {
		return array( 'general' );
	}

	/**
	 * Frontend script dependencies.
	 *
	 * @return string[]
	 */
	public function get_script_depends() {
		return array( 'rtcs-widget' );
	}

	/**
	 * Frontend style dependencies.
	 *
	 * @return string[]
	 */
	public function get_style_depends() {
		return array( 'rtcs-widget' );
	}

	/**
	 * Register editor controls.
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_slides',
			array(
				'label' => esc_html__( 'Slides', 'responsive-tab-card-slider' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'heading_tab_group',
			array(
				'label'     => esc_html__( 'Tab Area', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$repeater->add_control(
			'tab_icon',
			array(
				'label'   => esc_html__( 'Tab Icon', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'heading_content_group',
			array(
				'label'     => esc_html__( 'Main Content', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$repeater->add_control(
			'tab_title',
			array(
				'label'       => esc_html__( 'Tab Title', 'responsive-tab-card-slider' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Ramazan', 'responsive-tab-card-slider' ),
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'tab_text_color',
			array(
				'label'   => esc_html__( 'Tab Text Color', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#374151',
			)
		);

		$repeater->add_control(
			'tab_bg_color',
			array(
				'label'   => esc_html__( 'Tab Background Color', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#ffffff',
			)
		);

		$repeater->add_control(
			'tab_active_color',
			array(
				'label'   => esc_html__( 'Tab Active Accent Color', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#dc2626',
			)
		);

		$repeater->add_control(
			'main_title',
			array(
				'label'       => esc_html__( 'Main Title', 'responsive-tab-card-slider' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Bir yetimi sevindir', 'responsive-tab-card-slider' ),
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Açıklama metninizi buraya ekleyin.', 'responsive-tab-card-slider' ),
			)
		);

		$repeater->add_control(
			'heading_cta_group',
			array(
				'label'     => esc_html__( 'Buttons (CTAs)', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$repeater->add_control(
			'link1_text',
			array(
				'label'       => esc_html__( 'Link 1 Text', 'responsive-tab-card-slider' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Detaylı Bilgi >', 'responsive-tab-card-slider' ),
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'link1',
			array(
				'label'         => esc_html__( 'Link 1 URL', 'responsive-tab-card-slider' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_url( home_url( '/' ) ),
				'show_external' => true,
			)
		);

		$repeater->add_control(
			'link2_text',
			array(
				'label'       => esc_html__( 'Link 2 Text', 'responsive-tab-card-slider' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Bağışla', 'responsive-tab-card-slider' ),
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'link2',
			array(
				'label'         => esc_html__( 'Link 2 URL', 'responsive-tab-card-slider' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_url( home_url( '/' ) ),
				'show_external' => true,
			)
		);

		$repeater->add_control(
			'link2_icon',
			array(
				'label'   => esc_html__( 'Link 2 Icon', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-heart',
					'library' => 'fa-solid',
				),
			)
		);

		$repeater->add_control(
			'link2_color',
			array(
				'label'   => esc_html__( 'Link 2 Highlight Color', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::COLOR,
				'default' => '#e02b20',
			)
		);

		$repeater->add_control(
			'heading_slide_link_group',
			array(
				'label'     => esc_html__( 'Slide Click Link', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$repeater->add_control(
			'slide_link',
			array(
				'label'         => esc_html__( 'Slide Click URL', 'responsive-tab-card-slider' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_url( home_url( '/' ) ),
				'show_external' => true,
				'description'   => esc_html__( 'If set, clicking empty areas of this slide navigates to this URL.', 'responsive-tab-card-slider' ),
			)
		);

		$repeater->add_control(
			'heading_bg_group',
			array(
				'label'     => esc_html__( 'Desktop Background', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$repeater->add_control(
			'desktop_bg_mode',
			array(
				'label'   => esc_html__( 'Desktop Background Type', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'color',
				'options' => array(
					'color'    => esc_html__( 'Solid Color', 'responsive-tab-card-slider' ),
					'gradient' => esc_html__( 'Gradient', 'responsive-tab-card-slider' ),
					'image'    => esc_html__( 'Background Image', 'responsive-tab-card-slider' ),
				),
			)
		);

		$repeater->add_control(
			'desktop_bg_color',
			array(
				'label'     => esc_html__( 'Desktop Background Color', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#f5f6f8',
				'condition' => array(
					'desktop_bg_mode' => 'color',
				),
			)
		);

		$repeater->add_control(
			'desktop_bg_gradient_start',
			array(
				'label'     => esc_html__( 'Gradient Start', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'condition' => array(
					'desktop_bg_mode' => 'gradient',
				),
			)
		);

		$repeater->add_control(
			'desktop_bg_gradient_end',
			array(
				'label'     => esc_html__( 'Gradient End', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#e7ebf1',
				'condition' => array(
					'desktop_bg_mode' => 'gradient',
				),
			)
		);

		$repeater->add_control(
			'desktop_bg_gradient_angle',
			array(
				'label'     => esc_html__( 'Gradient Angle (deg)', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 135,
				'min'       => 0,
				'max'       => 360,
				'step'      => 1,
				'condition' => array(
					'desktop_bg_mode' => 'gradient',
				),
			)
		);

		$repeater->add_control(
			'desktop_bg_image',
			array(
				'label'     => esc_html__( 'Desktop Background Image', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => array(
					'desktop_bg_mode' => 'image',
				),
			)
		);

		$repeater->add_control(
			'heading_image_group',
			array(
				'label'     => esc_html__( 'Images', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$repeater->add_control(
			'right_image',
			array(
				'label'   => esc_html__( 'Right/Main Image', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'mobile_image',
			array(
				'label' => esc_html__( 'Mobile Top Image (Optional)', 'responsive-tab-card-slider' ),
				'type'  => Controls_Manager::MEDIA,
			)
		);

		$this->add_control(
			'slides',
			array(
				'label'       => esc_html__( 'Slide Items', 'responsive-tab-card-slider' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ tab_title }}}',
				'default'     => array(
						array(
							'tab_title'      => esc_html__( 'Ramazan', 'responsive-tab-card-slider' ),
							'tab_text_color' => '#374151',
							'tab_bg_color'   => '#ffffff',
							'tab_active_color' => '#dc2626',
							'main_title'     => esc_html__( 'Bir yetimi sevindir', 'responsive-tab-card-slider' ),
							'link1_text'     => esc_html__( 'Detaylı Bilgi >', 'responsive-tab-card-slider' ),
							'link2_text'     => esc_html__( 'Bağışla', 'responsive-tab-card-slider' ),
							'link2_color'    => '#e02b20',
						),
						array(
							'tab_title'      => esc_html__( 'Zekat', 'responsive-tab-card-slider' ),
							'tab_text_color' => '#374151',
							'tab_bg_color'   => '#ffffff',
							'tab_active_color' => '#dc2626',
							'main_title'     => esc_html__( 'İyiliğini paylaş', 'responsive-tab-card-slider' ),
							'link1_text'     => esc_html__( 'Detaylı Bilgi >', 'responsive-tab-card-slider' ),
							'link2_text'     => esc_html__( 'Bağışla', 'responsive-tab-card-slider' ),
							'link2_color'    => '#e02b20',
						),
					),
				)
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_settings',
			array(
				'label' => esc_html__( 'Slider Behavior', 'responsive-tab-card-slider' ),
			)
		);

		$this->add_control(
			'heading_behavior_group',
			array(
				'label' => esc_html__( 'Playback', 'responsive-tab-card-slider' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_control(
			'autoplay_enabled',
			array(
				'label'        => esc_html__( 'Autoplay', 'responsive-tab-card-slider' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'responsive-tab-card-slider' ),
				'label_off'    => esc_html__( 'Off', 'responsive-tab-card-slider' ),
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'autoplay_delay',
			array(
				'label'     => esc_html__( 'Autoplay Delay (ms)', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 5000,
				'min'       => 500,
				'step'      => 100,
				'condition' => array(
					'autoplay_enabled' => 'yes',
				),
			)
		);

		$this->add_control(
			'transition_speed',
			array(
				'label'   => esc_html__( 'Transition Speed (ms)', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 600,
				'min'     => 100,
				'step'    => 50,
			)
		);

		$this->add_control(
			'infinite_loop',
			array(
				'label'        => esc_html__( 'Infinite Loop', 'responsive-tab-card-slider' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'responsive-tab-card-slider' ),
				'label_off'    => esc_html__( 'Off', 'responsive-tab-card-slider' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'heading_responsive_group',
			array(
				'label'     => esc_html__( 'Responsive', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'mobile_breakpoint',
			array(
				'label'   => esc_html__( 'Mobile Breakpoint (px)', 'responsive-tab-card-slider' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 768,
				'min'     => 320,
				'max'     => 1440,
				'step'    => 1,
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_shadows',
			array(
				'label' => esc_html__( 'Card Shadows', 'responsive-tab-card-slider' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'heading_shadow_desktop',
			array(
				'label' => esc_html__( 'Desktop', 'responsive-tab-card-slider' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'desktop_card_shadow',
				'selector' => '{{WRAPPER}} .rtcs-slide-shell',
			)
		);

		$this->add_control(
			'heading_shadow_mobile',
			array(
				'label'     => esc_html__( 'Mobile', 'responsive-tab-card-slider' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'mobile_card_shell_shadow',
				'selector' => '{{WRAPPER}} .rtcs-widget.is-mobile .rtcs-slide-shell',
			)
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'mobile_content_shadow',
				'selector' => '{{WRAPPER}} .rtcs-widget.is-mobile .rtcs-text',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$slides   = isset( $settings['slides'] ) && is_array( $settings['slides'] ) ? $settings['slides'] : array();

		if ( empty( $slides ) ) {
			return;
		}

		$autoplay   = ( isset( $settings['autoplay_enabled'] ) && 'yes' === $settings['autoplay_enabled'] );
		$delay      = max( 500, (int) ( $settings['autoplay_delay'] ?? 5000 ) );
		$speed      = max( 100, (int) ( $settings['transition_speed'] ?? 600 ) );
		$loop       = ( isset( $settings['infinite_loop'] ) && 'yes' === $settings['infinite_loop'] );
		$breakpoint = max( 320, (int) ( $settings['mobile_breakpoint'] ?? 768 ) );
		$wrapper_id = 'rtcs-' . $this->get_id();

		$classes = array( 'rtcs-widget' );

		if ( 1 >= count( $slides ) ) {
			$classes[] = 'is-single-slide';
		}

		$this->add_render_attribute(
			'wrapper',
			array(
				'id'              => $wrapper_id,
				'class'           => $classes,
				'data-autoplay'   => $autoplay ? 'true' : 'false',
				'data-delay'      => (string) $delay,
				'data-speed'      => (string) $speed,
				'data-loop'       => $loop ? 'true' : 'false',
				'data-breakpoint' => (string) $breakpoint,
			)
		);
		?>
		<div <?php echo $this->get_render_attribute_string( 'wrapper' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<div class="rtcs-slider-area">
				<div class="rtcs-main-slider-wrap">
					<div class="rtcs-main-slider swiper">
						<div class="swiper-wrapper">
							<?php foreach ( $slides as $index => $slide ) : ?>
								<?php
								$slide_id           = $wrapper_id . '-slide-' . $index;
								$tab_id             = $wrapper_id . '-tab-' . $index;
								$desktop_image_url  = $this->get_media_url( $slide['right_image'] ?? array() );
								$mobile_image_url   = $this->get_media_url( $slide['mobile_image'] ?? array() );
								$rendered_image_url = $desktop_image_url ?: $mobile_image_url;
								$background_style   = $this->get_desktop_background_style( $slide );
								$slide_link         = isset( $slide['slide_link'] ) && is_array( $slide['slide_link'] ) ? $slide['slide_link'] : array();
								$slide_click_url    = ! empty( $slide_link['url'] ) ? esc_url( $slide_link['url'] ) : '';
								$slide_click_target = ! empty( $slide_link['is_external'] ) ? '_blank' : '_self';
								$slide_classes      = 'rtcs-slide swiper-slide' . ( '' !== $slide_click_url ? ' is-clickable' : '' );
								?>
								<article
									class="<?php echo esc_attr( $slide_classes ); ?>"
									id="<?php echo esc_attr( $slide_id ); ?>"
									role="tabpanel"
									aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
									<?php if ( '' !== $slide_click_url ) : ?>
										data-slide-url="<?php echo esc_url( $slide_click_url ); ?>"
										data-slide-target="<?php echo esc_attr( $slide_click_target ); ?>"
										tabindex="0"
									<?php endif; ?>
								>
									<div class="rtcs-slide-shell" style="<?php echo esc_attr( $background_style ); ?>">
										<div class="rtcs-slide-layout">
											<div class="rtcs-text">
												<div class="rtcs-mobile-tab">
													<?php $this->render_tab_icon( $slide ); ?>
													<?php if ( ! empty( $slide['tab_title'] ) ) : ?>
														<span class="rtcs-mobile-tab-title"><?php echo esc_html( $slide['tab_title'] ); ?></span>
													<?php endif; ?>
												</div>

												<?php if ( ! empty( $slide['main_title'] ) ) : ?>
													<h3 class="rtcs-main-title"><?php echo esc_html( $slide['main_title'] ); ?></h3>
												<?php endif; ?>

												<?php if ( ! empty( $slide['description'] ) ) : ?>
													<div class="rtcs-description"><?php echo wp_kses_post( $slide['description'] ); ?></div>
												<?php endif; ?>

												<div class="rtcs-button-row">
													<?php
													$primary_text = isset( $slide['link1_text'] ) ? trim( (string) $slide['link1_text'] ) : '';
													$primary_link = isset( $slide['link1'] ) && is_array( $slide['link1'] ) ? $slide['link1'] : array();

													if ( '' !== $primary_text && ! empty( $primary_link['url'] ) ) :
														?>
														<a class="rtcs-link1" <?php echo $this->build_link_attributes( $primary_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
															<?php echo esc_html( $primary_text ); ?>
														</a>
													<?php endif; ?>

													<?php
													$secondary_text  = isset( $slide['link2_text'] ) ? trim( (string) $slide['link2_text'] ) : '';
													$secondary_link  = isset( $slide['link2'] ) && is_array( $slide['link2'] ) ? $slide['link2'] : array();
													$secondary_color = ! empty( $slide['link2_color'] ) ? sanitize_hex_color( $slide['link2_color'] ) : '';
													$secondary_style = '--rtcs-link2-bg:' . ( $secondary_color ?: '#e02b20' ) . ';';

													if ( '' !== $secondary_text && ! empty( $secondary_link['url'] ) ) :
														?>
														<a class="rtcs-link2" style="<?php echo esc_attr( $secondary_style ); ?>" <?php echo $this->build_link_attributes( $secondary_link ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
															<?php if ( ! empty( $slide['link2_icon']['value'] ) ) : ?>
																<span class="rtcs-link2-icon" aria-hidden="true">
																	<?php Icons_Manager::render_icon( $slide['link2_icon'], array( 'aria-hidden' => 'true' ) ); ?>
																</span>
															<?php endif; ?>
															<span><?php echo esc_html( $secondary_text ); ?></span>
														</a>
													<?php endif; ?>
												</div>
											</div>

											<div class="rtcs-visual">
												<?php if ( ! empty( $rendered_image_url ) ) : ?>
													<?php
													$desktop_alt = $this->get_attachment_alt(
														$slide['right_image']['id'] ?? 0,
														(string) ( $slide['main_title'] ?? '' )
													);
													$mobile_alt  = $this->get_attachment_alt(
														$slide['mobile_image']['id'] ?? 0,
														$desktop_alt
													);
													?>
													<?php if ( ! empty( $mobile_image_url ) && ! empty( $desktop_image_url ) && $mobile_image_url !== $desktop_image_url ) : ?>
														<picture class="rtcs-picture">
															<source media="<?php echo esc_attr( '(max-width: ' . $breakpoint . 'px)' ); ?>" srcset="<?php echo esc_url( $mobile_image_url ); ?>">
															<img src="<?php echo esc_url( $desktop_image_url ); ?>" alt="<?php echo esc_attr( $desktop_alt ); ?>" loading="lazy" decoding="async">
														</picture>
													<?php else : ?>
														<img src="<?php echo esc_url( $rendered_image_url ); ?>" alt="<?php echo esc_attr( $mobile_alt ); ?>" loading="lazy" decoding="async">
													<?php endif; ?>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</article>
							<?php endforeach; ?>
						</div>
					</div>

					<button type="button" class="rtcs-nav rtcs-nav-prev" aria-label="<?php echo esc_attr__( 'Previous slide', 'responsive-tab-card-slider' ); ?>">
						<span aria-hidden="true">&#10094;</span>
					</button>
					<button type="button" class="rtcs-nav rtcs-nav-next" aria-label="<?php echo esc_attr__( 'Next slide', 'responsive-tab-card-slider' ); ?>">
						<span aria-hidden="true">&#10095;</span>
					</button>
				</div>

				<div class="rtcs-pagination" aria-hidden="true"></div>
			</div>

				<div class="rtcs-tabs" role="tablist" aria-label="<?php echo esc_attr__( 'Slide tabs', 'responsive-tab-card-slider' ); ?>">
					<?php foreach ( $slides as $index => $slide ) : ?>
						<?php
						$tab_id   = $wrapper_id . '-tab-' . $index;
						$slide_id = $wrapper_id . '-slide-' . $index;
						$tab_style = $this->build_tab_style( $slide );
						?>
						<button
							type="button"
							class="rtcs-tab<?php echo 0 === $index ? ' is-active' : ''; ?>"
							id="<?php echo esc_attr( $tab_id ); ?>"
							style="<?php echo esc_attr( $tab_style ); ?>"
							role="tab"
							data-index="<?php echo esc_attr( (string) $index ); ?>"
							aria-controls="<?php echo esc_attr( $slide_id ); ?>"
							aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
							tabindex="<?php echo 0 === $index ? '0' : '-1'; ?>"
					>
						<?php $this->render_tab_icon( $slide ); ?>
						<span class="rtcs-tab-title">
							<?php echo esc_html( ! empty( $slide['tab_title'] ) ? $slide['tab_title'] : (string) ( $index + 1 ) ); ?>
						</span>
					</button>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Resolve media URL from Elementor media array.
	 *
	 * @param array $media Media array.
	 * @return string
	 */
	private function get_media_url( $media ) {
		if ( ! is_array( $media ) ) {
			return '';
		}

		$url = isset( $media['url'] ) ? trim( (string) $media['url'] ) : '';

		if ( '' === $url ) {
			return '';
		}

		return $url;
	}

	/**
	 * Resolve attachment alt text.
	 *
	 * @param int    $attachment_id Attachment ID.
	 * @param string $fallback      Fallback alt text.
	 * @return string
	 */
	private function get_attachment_alt( $attachment_id, $fallback = '' ) {
		$attachment_id = (int) $attachment_id;

		if ( $attachment_id > 0 ) {
			$alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );

			if ( is_string( $alt ) && '' !== trim( $alt ) ) {
				return trim( $alt );
			}
		}

		return trim( (string) $fallback );
	}

	/**
	 * Build desktop background style string.
	 *
	 * @param array $slide Slide settings.
	 * @return string
	 */
	private function get_desktop_background_style( $slide ) {
		$mode = isset( $slide['desktop_bg_mode'] ) ? $slide['desktop_bg_mode'] : 'color';

		if ( 'gradient' === $mode ) {
			$start = ! empty( $slide['desktop_bg_gradient_start'] ) ? sanitize_hex_color( $slide['desktop_bg_gradient_start'] ) : '#ffffff';
			$end   = ! empty( $slide['desktop_bg_gradient_end'] ) ? sanitize_hex_color( $slide['desktop_bg_gradient_end'] ) : '#e7ebf1';
			$angle = isset( $slide['desktop_bg_gradient_angle'] ) ? (int) $slide['desktop_bg_gradient_angle'] : 135;
			$angle = max( 0, min( 360, $angle ) );

			return sprintf(
				'background-image:linear-gradient(%ddeg,%s,%s);',
				$angle,
				$start ? $start : '#ffffff',
				$end ? $end : '#e7ebf1'
			);
		}

		if ( 'image' === $mode ) {
			$image_url = $this->get_media_url( $slide['desktop_bg_image'] ?? array() );

			if ( '' !== $image_url ) {
				return 'background-image:url(' . esc_url_raw( $image_url ) . ');background-size:cover;background-position:center;background-repeat:no-repeat;';
			}
		}

		$color = ! empty( $slide['desktop_bg_color'] ) ? sanitize_hex_color( $slide['desktop_bg_color'] ) : '#f5f6f8';

		return 'background-color:' . ( $color ? $color : '#f5f6f8' ) . ';';
	}

	/**
	 * Build escaped link attributes.
	 *
	 * @param array $link Link control value.
	 * @return string
	 */
	private function build_link_attributes( $link ) {
		if ( ! is_array( $link ) || empty( $link['url'] ) ) {
			return '';
		}

		$attrs   = array();
		$rel     = array();
		$target  = ! empty( $link['is_external'] ) ? '_blank' : '_self';
		$attrs[] = 'href="' . esc_url( $link['url'] ) . '"';
		$attrs[] = 'target="' . esc_attr( $target ) . '"';

		if ( ! empty( $link['nofollow'] ) ) {
			$rel[] = 'nofollow';
		}

		if ( '_blank' === $target ) {
			$rel[] = 'noopener';
		}

		if ( ! empty( $rel ) ) {
			$attrs[] = 'rel="' . esc_attr( implode( ' ', array_unique( $rel ) ) ) . '"';
		}

		if ( ! empty( $link['custom_attributes'] ) && is_string( $link['custom_attributes'] ) ) {
			$pairs = explode( ',', $link['custom_attributes'] );

			foreach ( $pairs as $pair ) {
				$parts = explode( '|', $pair, 2 );

				if ( 2 !== count( $parts ) ) {
					continue;
				}

				$key   = sanitize_key( trim( $parts[0] ) );
				$value = sanitize_text_field( trim( $parts[1] ) );

				if ( '' !== $key ) {
					$attrs[] = sprintf( '%s="%s"', esc_attr( $key ), esc_attr( $value ) );
				}
			}
		}

		return implode( ' ', $attrs );
	}

	/**
	 * Render the tab icon markup.
	 *
	 * @param array $slide Slide settings.
	 */
	private function render_tab_icon( $slide ) {
		$icon_url = $this->get_media_url( $slide['tab_icon'] ?? array() );

		if ( '' === $icon_url ) {
			return;
		}

		$alt = ! empty( $slide['tab_title'] ) ? (string) $slide['tab_title'] : '';
		?>
		<span class="rtcs-tab-icon">
			<img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $alt ) ); ?>" loading="lazy" decoding="async">
		</span>
		<?php
	}

	/**
	 * Build per-tab CSS variables.
	 *
	 * @param array $slide Slide settings.
	 * @return string
	 */
	private function build_tab_style( $slide ) {
		$text_color   = ! empty( $slide['tab_text_color'] ) ? sanitize_hex_color( $slide['tab_text_color'] ) : '#374151';
		$bg_color     = ! empty( $slide['tab_bg_color'] ) ? sanitize_hex_color( $slide['tab_bg_color'] ) : '#ffffff';
		$active_color = ! empty( $slide['tab_active_color'] ) ? sanitize_hex_color( $slide['tab_active_color'] ) : '#dc2626';

		return sprintf(
			'--rtcs-tab-text:%1$s;--rtcs-tab-bg:%2$s;--rtcs-tab-accent:%3$s;',
			$text_color ? $text_color : '#374151',
			$bg_color ? $bg_color : '#ffffff',
			$active_color ? $active_color : '#dc2626'
		);
	}
}
