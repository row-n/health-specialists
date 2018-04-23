<?php
  /* Template Name: Home */
?>

<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('page--'); ?>>

  <?php the_content(); ?>

  <?php if( have_rows('slide') ): ?>
    <div id="carousel" data-0="opacity: 1;" data-700="opacity: .5;">
      <?php while( have_rows('slide') ): the_row();
        $image = get_sub_field('image');
        $heading = get_sub_field('heading');
        $subheading = get_sub_field('sub_heading');
        $link = get_sub_field('link'); ?>
        <div class="slick-item" data-0="background-size: 100%;" data-700="background-size: 105%;" style="background-image: url(<?php echo $image['url']; ?>);">
          <div class="slick-content container">
            <div class="slick-caption" data-0="opacity: 1;" data-300="opacity: 0;">
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

  <div class="tiles container margin--lg">
    <h2 class="heading-shadow" data-shadow-text="Services">What we do</h2>
    <div class="tiles__list">
      <div class="tiles__item tiles__item--sm tiles__item--green">
        <h4>Weight management</h4>
      </div>
      <div class="tiles__item tiles__item--lg tiles__item--green">
        <h4>Support with weight loss surgery</h4>
      </div>
      <div class="tiles__item tiles__item--sm tiles__item--green">
        <h4>Eating psychology</h4>
      </div>
      <div class="tiles__item tiles__item--sm tiles__item--green">
        <h4>Exercise physiology</h4>
      </div>
      <div class="tiles__item tiles__item--sm tiles__item--green">
        <h4>Food intolerances / FODMAP diets</h4>
      </div>
    </div>
  </div>

  <div id="tabs" class="tabs container">
    <ul class="tabs__list">
      <li class="tabs__item">
        <a href="#tab-1">
          <h4>Weight management</h4>
        </a>
      </li>
      <li class="tabs__item">
        <a href="#tab-2">
          <h4>Support with weight loss surgery</h4>
        </a>
      </li>
      <li class="tabs__item">
        <a href="#tab-3">
          <h4>Eating psychology</h4>
        </a>
      </li>
      <li class="tabs__item">
        <a href="#tab-4">
          <h4>Exercise physiology</h4>
        </a>
      </li>
      <li class="tabs__item">
        <a href="#tab-5">
          <h4>Food intolerances / FODMAP diets</h4>
        </a>
      </li>
    </ul>
    <div id="tab-1">
      One
    </div>
    <div id="tab-2">
      Two
    </div>
    <div id="tab-3">
      Three
    </div>
    <div id="tab-4">
      Four
    </div>
    <div id="tab-5">
      Five
    </div>
  </div>

  <?php if( have_rows('logo') ): ?>
    <div id="logos" class="logos container margin--lg">
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
