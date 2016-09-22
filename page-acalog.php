<?php
/**
 * People Template
 *
 * @package WordPress
 * @subpackage Cobalt
 */

//Deny direct file access.
if ( ! defined( 'ABSPATH' ) ) { exit(); }

//from template-parts/content.php file date 12-12-15
$page_menu = COBALT_500::get()->get_page_menu();
$page_sidebar = COBALT_500::get()->get_sidebar_meta( COBALT_500::get()->get_page_ID() );

//standard Wordpress
get_header();

//from template-parts/content.php file date 12-12-15 - Partly for future development, section and header kept to maintain space above the profile. ?>
<section class="col-md-3 content-section sidebar">
  <header><?php
    /* For future development - submenu with departments at top of page
    <h1>    $parent_id = COBALT_500::get()->get_parent_ID_or_this();
      echo get_the_title( $parent_id ); ?>
    </h1> */ ?>
  </header><?php 
  /* For future development - submenu with departments at top of page
  <nav class="page-menu"><?php 
  echo $page_menu; ?>
    <select>
      <option value="" disabled="enabled"><?php _e( 'In This Section', 'cobalt' ) ?></option>
    </select>
  </nav> */ ?>
</section>

<section class="<?php echo $page_menu ? 'col-md-9' : 'col-xs-12'; ?> content-section content"><?php 

  //from template-parts/article.php file date 12-12-15 ?>
    <article <?php post_class(); ?> >
      <div class="entry-content"><?php 
    
    //new custom code to load fields for people page ?>
        <div class="row">

<?php   
//testing acalog API
$key = "e79d154884ac4a196b80bca7fec34b2ee50ca0bb";  
$base = "http://syr.apis.acalog.com/";  
$url1 = $base . "v1/content?format=xml&key=$key&method=getCatalogs";   
$xml = simplexml_load_file($url1);  

$xml->registerXPathNamespace('a', 'http://www.w3.org/2005/Atom'); 
$xml->registerXPathNamespace('c', 'http://acalog.com/catalog/1.0');  

if(!$xml){
   echo("Service not available."); 
}   

$artsID = $xml->xpath("c:catalog[@id]/@id"); 
$count = 0;  

foreach ($artsID as $artID){ 
  $count = $count + 1;   
  $id[$count] = $artID; 
}   

$artsTitle = $xml->xpath("c:catalog[@id]/a:title"); 
$count = 0;  

foreach ($artsTitle as $artTitle){   
  $count = $count + 1;   
  $title[$count] = $artTitle; 
}      

$arts = $xml->xpath("c:catalog[@id]"); 
$count = 0; 
foreach ($arts as $art) {
   $count = $count + 1;
     $published = $art->state->published;
    $archived = $art->state->archived; 
   if($archived == "No") { 
      $pos = strpos($title[$count], 'Undergraduate'); 
     if($pos === FALSE){ 
       $gradCatalog = str_replace("acalog-catalog-", "", $id[$count]);
      } else { 
       $undergradCatalog = str_replace("acalog-catalog-", "", $id[$count]);
      }

     } // end if($archived == "No")

    } // end foreach ($arts as $art) 

?>         

        </div>
      </div>
    </article>

<?php
//from template-parts/content.php file date 12-12-15
get_template_part( 'template-parts/paginate' );

?></section><?php
//standard
get_footer();

