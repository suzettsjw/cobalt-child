<?php /* Template Name: Touch Calendar Page */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php COBALT_500::get()->html_class( 'no-js' ); ?>" data-dppx="1">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" /><link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/b05259d9-ca62-44a8-8a19-d3facdbd64df.css"/>
  <link href="https://fonticons-free-fonticons.netdna-ssl.com/kits/8903c25b/8903c25b.css" media="all" rel="stylesheet"><link rel="profile" href="http://gmpg.org/xfn/11" />
  <title><?php echo COBALT_500::get()->get_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=yes">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /><?php COBALT_500::get()->social_meta(); wp_head(); ?>
</head>
<body <?php body_class(); ?> style="margin:0;background-color:white;"><?php do_action( 'body_open' ); ?> 
  <section role="main" class="content-primary" id="content-primary" style="height:1000px;overflow:auto;">
    <div class="container">
      <div class="row">
        <section class="col-xs-12 content-section content">
          <article class="page type-page status-publish hentry">
            <div class="entry-content">
              <?php if ( have_posts() ) while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
            </div>
          </article>
        </section>
      </div>
    </div>
  </section>
<footer class="footer-primary">
</footer>
<?php wp_footer(); ?>
<div class="lower-buttons" style="width:100%;display:inline-block;height:180px;font-family: ‘ITC Franklin Gothic W01’,Arial;font-weight: bold;font-size: 4em;line-height: 1em;text-transform: uppercase;"><div style="background-color:#6f777d; width:25%;height:100%;display:inline-block;"><a href="/touch-directory-people/" style="color:#fff;text-decoration:none;padding:20px 0 0 50px;line-height:2.5em;"><span class="touch touch-users" style="font-size: 1.5em;margin-right:10px;"></span> People</a></div><div style="background-color:#d44500;width:25%;height:100%;display:inline-block;"><a href="/map/" style="color:#fff;text-decoration:none;padding:20px 0 0 50px;line-height:2.5em;"><span class="touch touch-map" style="font-size: 1.5em;margin-right:10px;"></span> Map</a></div><div style="background-color:#3e3d3c;width:25%;height:100%;display:inline-block;"><a href="/touch-directory-calendar/" style="color:#fff;text-decoration:none;padding:20px 0 0 50px;line-height:2.5em;"><span class="touch touch-calendar" style="font-size: 1.5em;margin-right:10px;"></span> Events</a></div><div style="background-color:#0d1d37;width:25%;height:100%;display:inline-block;"><a href="/touch-directory-news/" style="color:#fff;text-decoration:none;padding:20px 0 0 50px;line-height:2.5em;"><span class="touch touch-rss" style="font-size:1.5em;margin-right:10px;"></span> News</a></div></div>
</body>
</html>
