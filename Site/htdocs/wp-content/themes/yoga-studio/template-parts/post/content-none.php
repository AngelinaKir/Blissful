<?php
/**
 * Template part for displaying a message that posts cannot be found
 * 
 * @subpackage Yoga Studio
 * @since 1.0
 */
?>

<section class="no-results not-found">
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
				<?php
				/* translators: %s: Post editor URL. */
				printf( esc_html__( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'yoga-studio' ), esc_url( admin_url( 'post-new.php' ) ) );
				?>
			</p>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'yoga-studio' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div>
</section>