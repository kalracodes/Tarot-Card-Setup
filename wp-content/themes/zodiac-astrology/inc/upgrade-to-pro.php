<?php
/**
 * Upgrade to pro options
 */
function zodiac_astrology_upgrade_pro_options( $wp_customize ) {

	$wp_customize->add_section(
		'upgrade_premium',
		array(
			'title'    => esc_html__( 'About Zodiac Astrology', 'zodiac-astrology' ),
			'priority' => 1,
		)
	);

	class Zodiac_Astrology_Pro_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="pro_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( ZODIACASTROLOGY_THEME_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-admin-appearance"></i><?php esc_html_e( 'Theme Page', 'zodiac-astrology' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( ZODIACASTROLOGY_SUPPORT ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php esc_html_e( 'Support Forum', 'zodiac-astrology' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( ZODIACASTROLOGY_REVIEW ); ?>" target="_blank"><i class="dashicons dashicons-star-filled"></i><?php esc_html_e( 'Rate Us', 'zodiac-astrology' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( ZODIACASTROLOGY_PRO_DEMO ); ?>" target="_blank"><i class="dashicons dashicons-awards"></i><?php esc_html_e( 'Premium Demo', 'zodiac-astrology' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( ZODIACASTROLOGY_PREMIUM_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Upgrade Pro', 'zodiac-astrology' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( ZODIACASTROLOGY_THEME_DOCUMENTATION ); ?>" target="_blank"><i class="dashicons dashicons-visibility"></i><?php esc_html_e( 'Theme Documentation', 'zodiac-astrology' ); ?> </a></li>

				</ul>
			</div>
			<?php
		}
	}

	$wp_customize->add_setting(
		'pro_info_buttons',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'zodiac_astrology_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Zodiac_Astrology_Pro_Button_Customize_Control(
			$wp_customize,
			'pro_info_buttons',
			array(
				'section' => 'upgrade_premium',
			)
		)
	);
}
add_action( 'customize_register', 'zodiac_astrology_upgrade_pro_options' );
