<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
 <meta charset="<?php bloginfo( 'charset' ); ?>">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <link rel="profile" href="http://gmpg.org/xfn/11">
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,700&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
 <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
 
 // WordPress 5.2 wp_body_open implementation
 if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
 } else {
	do_action( 'wp_body_open' );
 }

?>

<div id="page" class="site">
 <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
 <?php if(!is_page_template( array( 'blank-page.php', 'video-template.php') ) && !is_page_template( 'blank-page-with-container.php' )): ?>
 <header id="masthead" class="narf site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
	<div class="container-fluid">
	 <nav class="navbar navbar-expand-xl p-0">
		<div class="navbar-brand">
		 <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
			<a href="<?php echo esc_url( home_url( '/' )); ?>">
			 <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			</a>
		 <?php else : ?>
			<a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
		 <?php endif; ?>
		
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
		 <span class="navbar-toggler-icon"></span>
		</button>
		
		<?php
		 wp_nav_menu(array(
			 'theme_location'    => 'primary',
			 'container'       => 'div',
			 'container_id'    => 'main-nav',
			 'container_class' => 'collapse navbar-collapse justify-content-end',
			 'menu_id'         => false,
			 'menu_class'      => 'navbar-nav',
			 'depth'           => 3,
			 'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
			 'walker'          => new wp_bootstrap_navwalker()
		 ));
		?>
	 
	 </nav>
	</div>
 </header><!-- #masthead -->
 <?php endif; ?>
 
 <?php if(is_page_template('video-template.php')): ?>
 
 <div id="masthead-video" class="<?php echo wp_bootstrap_starter_bg_class(); ?>">
  <div class="container header-video">
    <div class="row">
     <a href="javascript: history.go(-1)">
     <i class="lni lni-arrow-left"></i>
     </a>
    </div>
  </div>
 </div><!-- #masthead -->
 
 
 
 <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
	<div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
	 <div class="container">
		<h1>
		 <?php
			if(get_theme_mod( 'header_banner_title_setting' )){
			 echo esc_attr( get_theme_mod( 'header_banner_title_setting' ) );
			}else{
			 echo 'WordPress + Bootstrap';
			}
		 ?>
		</h1>
		<p>
		 <?php
			if(get_theme_mod( 'header_banner_tagline_setting' )){
			 echo esc_attr( get_theme_mod( 'header_banner_tagline_setting' ) );
			}else{
			 echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
			}
		 ?>
		</p>
		<a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
	 </div>
	</div>
 <?php endif; ?>
 <div id="content" class="site-content">
	<div class="container">
	 <div class="row">
		<?php endif; ?>
