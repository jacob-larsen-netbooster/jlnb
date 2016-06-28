<?php
if ( 'page' == get_option('show_on_front') ) {
  $page_id = get_option('page_on_front');
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>

<body 
  data-frontpageid="<?php echo $page_id; ?>"
>

  <header class="jlnb">
    <h2>Header</h2>
    
    <div id="jlnb-logo"></div>
    <div id="jlnb-topMenu"></div>
    <div id="jlnb-burgerMenu"></div>

  </header>

<div class="jlnb-content">
  <div id="jlnb-mainPage"></div>
</div> <!-- content -->

<footer class="jlnb">footer</footer>




<?php wp_footer(); ?>
</body>
</html>
