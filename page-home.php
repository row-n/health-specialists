<?php
  /* Template Name: Home */
?>

<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('page--'); ?>>

  <?php the_content(); ?>

  <?php
    $images = get_field('slide_image');
    $size = 'full'; // (thumbnail, medium, large, full or custom size)

    if( $images ): ?>
      <div id="carousel" class="carousel">
          <?php foreach( $images as $image ): ?>
            <figure class="carousel__slide">
              <?php echo wp_get_attachment_image( $image['ID'], $size, '', ['class' => 'carousel__image'] ); ?>
              <figcaption class="carousel__caption">
                <h1><?php echo trim($image['title']); ?></h1>
                <p><?php echo trim($image['caption']); ?></p>
              </figcaption>
            </figure>
          <?php endforeach; ?>
      </div>
  <?php endif; ?>

  </article>

  <?php endwhile; ?>

  <?php else : ?>

  <?php get_template_part( 'inc/none' ); ?>

  <?php endif; ?>

<?php get_footer(); ?>
