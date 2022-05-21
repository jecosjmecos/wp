<?php

add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles()
{
	$ver_num = mt_rand();

	wp_enqueue_style('child-style',  get_stylesheet_directory_uri() . '/assets/css/style.css', array('storefront-style', 'storefront-woocommerce-style'), $ver_num, 'all');
}



if (!function_exists('storefront_credit')) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_credit()
	{
		$links_output = '';

		if (apply_filters('storefront_privacy_policy_link', true) && function_exists('the_privacy_policy_link')) {
			$separator    = '<span role="separator" aria-hidden="true"></span>';
			$links_output = get_the_privacy_policy_link('', (!empty($links_output) ? $separator : '')) . $links_output;
		}

		$links_output = apply_filters('storefront_credit_links_output', $links_output);
?>
		<div class="site-info">
			<?php echo esc_html(apply_filters('storefront_copyright_text', $content = '&copy; ' . get_bloginfo('name') . ' ' . gmdate('Y'))); ?>

			<?php if (!empty($links_output)) { ?>
				<br />
				<?php echo wp_kses_post($links_output); ?>
			<?php } ?>
		</div><!-- .site-info -->
<?php
	}
}
?>