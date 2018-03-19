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
      <ul id="carousel" class="carousel">
          <?php foreach( $images as $image ): ?>
              <li class="carousel__slide">
                <figure class="carousel__item">
                  <?php echo wp_get_attachment_image( $image['ID'], $size, '', ['class' => 'carousel__image'] ); ?>
                  <figcaption class="carousel__caption"><?php echo trim($image['caption']); ?></figcaption>
                </figure>
              </li>
          <?php endforeach; ?>
      </ul>
  <?php endif; ?>

  </article>

  <?php endwhile; ?>

  <?php else : ?>

  <?php get_template_part( 'inc/none' ); ?>

  <?php endif; ?>

<?php get_footer(); ?>
