<?php

get_header();
pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'Stay tuned to the latest Art and Music related events in Norfolk'
));
?>

<div class="container page-section">
  <div class="container__narrow">
    <?php

    while (have_posts()) {
      the_post();
      get_template_part('template-parts/content-event');
    }
    echo paginate_links();
    ?>

    <hr class="section-break">

    <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events') ?>">Check out our past events archive</a>.</p>
  </div>
</div>

<?php get_footer();

?>