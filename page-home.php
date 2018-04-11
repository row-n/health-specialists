<?php
  /* Template Name: Home */
?>

<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('page--'); ?>>

  <?php the_content(); ?>

  <?php if( have_rows('slide') ): ?>
    <div id="carousel">
      <?php while( have_rows('slide') ): the_row();
        $image = get_sub_field('image');
        $heading = get_sub_field('heading');
        $subheading = get_sub_field('sub_heading');
        $link = get_sub_field('link'); ?>
        <div class="slick-item" style="background-image: url(<?php echo $image['url']; ?>);">
          <div class="slick-content container">
            <div class="slick-caption">
              <?php if($heading): ?>
                <h1><?php echo trim($heading); ?></h1>
              <?php endif; ?>
              <?php if($subheading): ?>
                <h3><?php echo trim($subheading); ?></h3>
              <?php endif; ?>
              <?php if($link): ?>
                <div class="slick-button">
                  <a href="<?php echo $link['url']; ?>" class="button button--primary" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  <?php if( have_rows('logo') ): ?>
    <div id="logos" class="logos container">
      <?php while( have_rows('logo') ): the_row();
        $image = get_sub_field('image'); ?>
          <?php if($image): ?>
            <div class="logos__item">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="logos__image" />
            </div>
          <?php endif; ?>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  </article>

  <?php endwhile; ?>

  <?php else : ?>

  <?php get_template_part( 'inc/none' ); ?>

  <?php endif; ?>

<?php get_footer(); ?>
