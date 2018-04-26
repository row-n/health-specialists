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

  <!-- <div class="tiles container margin--lg">
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
  </div> -->

  <div class="container margin--lg">
    <h2 class="heading-shadow" data-shadow-text="Services">What we do</h2>
    <div id="tabs" class="tabs">
      <ul class="tabs__list">
        <li class="tabs__item tabs__item--pink">
          <a href="#tab-1" class="tabs__link">
            <span class="tabs__icon">
              <svg role="img" class="icon icon--md"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#scale-1"></use></svg>
            </span>
            <h5>Weight management</h5>
          </a>
        </li>
        <li class="tabs__item tabs__item--blue">
          <a href="#tab-2" class="tabs__link">
            <span class="tabs__icon">
              <svg role="img" class="icon icon--md"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#diet"></use></svg>
            </span>
            <h5>Support with weight loss surgery</h5>
          </a>
        </li>
        <li class="tabs__item tabs__item--orange">
          <a href="#tab-3" class="tabs__link">
            <span class="tabs__icon">
              <svg role="img" class="icon icon--md"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cutlery-dish"></use></svg>
            </span>
            <h5>Eating psychology</h5>
          </a>
        </li>
        <li class="tabs__item tabs__item--green">
          <a href="#tab-4" class="tabs__link">
            <span class="tabs__icon">
              <svg role="img" class="icon icon--md"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#bike-person"></use></svg>
            </span>
            <h5>Exercise physiology</h5>
          </a>
        </li>
        <li class="tabs__item tabs__item--yellow">
          <a href="#tab-5" class="tabs__link">
            <span class="tabs__icon">
              <svg role="img" class="icon icon--md"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#onion-1"></use></svg>
            </span>
            <h5>Food intolerances / FODMAP diets</h5>
          </a>
        </li>
      </ul>
      <div id="tab-1" class="tabs__content">
        <img src="http://placehold.it/500x350" alt="" class="tabs__img" />
        <div class="tabs__copy">
          <h4>One</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum pellentesque porta.</p>
          <p>Vestibulum congue placerat diam, quis consectetur metus. Vivamus faucibus a orci ut maximus. Curabitur facilisis est id nisi vehicula, et dignissim magna mattis.</p>
          <p>Etiam ullamcorper bibendum leo, vel interdum lectus placerat in. Integer rhoncus nibh id felis blandit tempor.</p>
        </div>
      </div>
      <div id="tab-2" class="tabs__content">
        <img src="http://placehold.it/500x350" alt="" class="tabs__img" />
        <div class="tabs__copy">
          <h4>Two</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum pellentesque porta.</p>
          <p>Vestibulum congue placerat diam, quis consectetur metus. Vivamus faucibus a orci ut maximus. Curabitur facilisis est id nisi vehicula, et dignissim magna mattis.</p>
          <p>Etiam ullamcorper bibendum leo, vel interdum lectus placerat in. Integer rhoncus nibh id felis blandit tempor.</p>
        </div>
      </div>
      <div id="tab-3" class="tabs__content">
        <img src="http://placehold.it/500x350" alt="" class="tabs__img" />
        <div class="tabs__copy">
          <h4>Three</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum pellentesque porta.</p>
          <p>Vestibulum congue placerat diam, quis consectetur metus. Vivamus faucibus a orci ut maximus. Curabitur facilisis est id nisi vehicula, et dignissim magna mattis.</p>
          <p>Etiam ullamcorper bibendum leo, vel interdum lectus placerat in. Integer rhoncus nibh id felis blandit tempor.</p>
        </div>
      </div>
      <div id="tab-4" class="tabs__content">
        <img src="http://placehold.it/500x350" alt="" class="tabs__img" />
        <div class="tabs__copy">
          <h4>Four</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum pellentesque porta.</p>
          <p>Vestibulum congue placerat diam, quis consectetur metus. Vivamus faucibus a orci ut maximus. Curabitur facilisis est id nisi vehicula, et dignissim magna mattis.</p>
          <p>Etiam ullamcorper bibendum leo, vel interdum lectus placerat in. Integer rhoncus nibh id felis blandit tempor.</p>
        </div>
      </div>
      <div id="tab-5" class="tabs__content">
        <img src="http://placehold.it/500x350" alt="" class="tabs__img" />
        <div class="tabs__copy">
          <h4>Five</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum pellentesque porta.</p>
          <p>Vestibulum congue placerat diam, quis consectetur metus. Vivamus faucibus a orci ut maximus. Curabitur facilisis est id nisi vehicula, et dignissim magna mattis.</p>
          <p>Etiam ullamcorper bibendum leo, vel interdum lectus placerat in. Integer rhoncus nibh id felis blandit tempor.</p>
        </div>
      </div>
    </div>
  </div>

  <?php if( have_rows('logo') ): ?>
    <div class="container margin--lg">
    <h2 class="heading-shadow" data-shadow-text="Affiliates">Trusted partners</h2>
    <div id="logos" class="logos">
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
