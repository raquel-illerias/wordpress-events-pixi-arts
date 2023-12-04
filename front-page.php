<?php get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/hero-background.jpg') ?>);"></div>
  <div class="page-banner__content container__front-page t-center c-white">
    <h1 class="headline headline--large">Art Events in Norfolk</h1>
    <a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--large btn--blue bubbly-button">Find Events</a>
  </div>
</div>

<div class="full-width-split group">
  <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,288L48,245.3C96,203,192,117,288,112C384,107,480,181,576,213.3C672,245,768,235,864,202.7C960,171,1056,117,1152,117.3C1248,117,1344,171,1392,197.3L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

    <div class="full-width-split__one">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">UPCOMING EVENTS</h2>

        <?php
        $today = date('Ymd');
        $homepageEvents = new WP_Query(array(
          'posts_per_page' => 2,
          'post_type' => 'event',
          'meta_key' => 'event_date',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'event_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
            )
          )
        ));

        while ($homepageEvents->have_posts()) {
          $homepageEvents->the_post();
          get_template_part('template-parts/content', 'event');
        }
        ?>

        <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a></p>

      </div>
    </div>
    <div class="full-width-split__two">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">FROM OUR BLOGS</h2>
        <?php
        $homepagePosts = new WP_Query(array(
          'posts_per_page' => 2
        ));

        while ($homepagePosts->have_posts()) {
          $homepagePosts->the_post(); ?>
          <div class="event-summary">
            <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
              <span class="event-summary__month"><?php the_time('M'); ?></span>
              <span class="event-summary__day"><?php the_time('d'); ?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(), 18);
                  } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
            </div>
          </div>
        <?php }
        wp_reset_postdata();
        ?>

        <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
      </div>
    </div>
  </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fffade" fill-opacity="1" d="M0,96L48,106.7C96,117,192,139,288,128C384,117,480,75,576,85.3C672,96,768,160,864,181.3C960,203,1056,181,1152,176C1248,171,1344,181,1392,186.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>


<?php get_footer();

?>