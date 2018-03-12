<article class="error-404 not-found">

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'healthspecialists' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php else : ?>

		<p><strong><?php _e( 'Oops! That page can&rsquo;t be found.', 'healthspecialists' ); ?></strong></p>
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'healthspecialists' ); ?></p>

	<?php endif; ?>

</article>
