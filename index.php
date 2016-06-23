<?php get_header() ?>

<?php 
if ( ! is_active_sidebar( 'widget-1' ) ) {
  return;
}
?>

<?php if ( is_active_sidebar( 'widget-1' ) ) : ?>
  <div class="widget-area">
    <?php dynamic_sidebar( 'widget-1' ); ?>
  </div><!-- .widget-area -->
<?php endif; ?>


<div id="js-rendere"></div>








<?php get_footer() ?>