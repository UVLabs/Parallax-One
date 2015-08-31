<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package parallax-one
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php hybrid_attr('body'); ?>>

	<!-- =========================
     PRE LOADER       
    ============================== -->
	<?php
		
	 global $wp_customize;

	 if(is_front_page() && !isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page' ): 
	 
		$parallax_one_disable_preloader = get_theme_mod('paralax_one_disable_preloader');
		
		if( isset($parallax_one_disable_preloader) && ($parallax_one_disable_preloader != 1)):
			 
			echo '<div class="preloader">';
				echo '<div class="status">&nbsp;</div>';
			echo '</div>';
			
		endif;	

	endif; ?>


	<!-- =========================
     SECTION: HOME / HEADER  
    ============================== -->
	<header <?php hybrid_attr('header','',array('data-stellar-background-ratio' => '0.5','class' => 'header header-style-one')); ?> >

        <!-- COLOR OVER IMAGE -->
        <?php
			$paralax_one_sticky_header = get_theme_mod('paralax_one_sticky_header','parallax-one');
			if( isset($paralax_one_sticky_header) && ($paralax_one_sticky_header != 1)){
				$fixedheader = 'sticky-navigation-open';
			} else {
				if( !is_front_page() ){
					$fixedheader = 'sticky-navigation-open';
				}else{
					$fixedheader = '';
					if ( 'posts' != get_option( 'show_on_front' ) ) {
						if( isset($paralax_one_sticky_header) && ($paralax_one_sticky_header != 1)){
							$fixedheader = 'sticky-navigation-open';
						} else {
							$fixedheader = '';
						}
					}
				}
			}
        ?>
		<div class="overlay-layer-nav <?php if(!empty($fixedheader)) {echo esc_attr($fixedheader);} ?>">

            <!-- STICKY NAVIGATION -->
            <div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation appear-on-scroll">
				<!-- CONTAINER -->
                <div class="container">
				
                    <div class="navbar-header">
                     
                        <!-- LOGO -->
						
                        <button title='<?php _e( 'Toggle Menu', 'parallax-' ); ?>' aria-controls='menu-main-menu' aria-expanded='false' type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-primary">
                            <span class="sr-only"><?php esc_html_e('Toggle navigation','parallax-one'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
						
						<?php
							
							$parallax_one = get_theme_mod('paralax_one_logo', parallax_get_file('/images/logo-nav.png') );

							
							
							if(!empty($parallax_one)):

								echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand" title="'.get_bloginfo('title').'">';

									echo '<img src="'.esc_url($parallax_one).'" alt="'.get_bloginfo('title').'">';

								echo '</a>';

								echo '<div class="header-logo-wrap text-header paralax_one_only_customizer">';

									echo "<h1 ".hybrid_get_attr('site-title','',array('class' => 'site-title'))."><a href='".esc_url( home_url( '/' ) )."' title='".esc_attr( get_bloginfo( 'name', 'display' ) )."' rel='home'>".get_bloginfo( 'name' )."</a></h1>";
								
									echo "<h2 ".hybrid_get_attr('site-description','',array('class' => 'site-description')).">".get_bloginfo( 'description' )."</h2>";

								echo '</div>';	
							
							else:
							
								if( isset( $wp_customize ) ):
								
									echo '<a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand paralax_one_only_customizer" title="'.get_bloginfo('title').'">';

										echo '<img src="" alt="'.get_bloginfo('title').'">';

									echo '</a>';
								
								endif;
							
								echo '<div class="header-logo-wrap text-header">';

									echo "<h1 ".hybrid_get_attr('site-title','',array('class' => 'site-title'))."><a href='".esc_url( home_url( '/' ) )."' title='".esc_attr( get_bloginfo( 'name', 'display' ) )."' rel='home'>".get_bloginfo( 'name' )."</a></h1>";
								
									echo "<h2 ".hybrid_get_attr('site-description','',array('class' => 'site-description')).">".get_bloginfo( 'description' )."</h2>";

								echo '</div>';							
							endif;	

						?>

                    </div>
                    
                    <!-- MENU -->
					<div <?php hybrid_attr('menu','primary',array('aria-label' => esc_html__('Primary Menu','parallax-one'), 'class' => 'navbar-collapse collapse')) ?>>		
						<h1 class="screen-reader-text"><?php _e( 'Primary Menu', 'parallax-one' ); ?></h1>
						<!-- LOGO ON STICKY NAV BAR -->
    					<?php 
    						wp_nav_menu( 
                                array( 
                                    'theme_location'    => 'primary',
                                    'container'         => false,
                                    'menu_class'        => 'nav navbar-nav navbar-right main-navigation small-text', 
                                    'fallback_cb'       => 'parallax_one_wp_page_menu' ) 
							);
    					?>
                    </div>
					
					
                </div>
                <!-- /END CONTAINER -->
            </div>
            <!-- /END STICKY NAVIGATION -->