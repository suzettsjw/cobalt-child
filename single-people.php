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

//new custom code to load fields for person page
$academic_unit = types_render_field ("academic-unit", array("raw"=>"true"));
$credentials = types_render_field ("credentials", array("raw"=>"true"));
$website = types_render_field ("website", array("raw"=>"true"));
$bio = types_render_field ("biography", array("raw"=>"true"));
$bio_char = types_render_field("biography");
$course = types_render_field("courses-teaching-taught", array("raw"=>"true"));
$education = types_render_field("educationalhistory", array("raw"=>"true"));
$specialization = types_render_field("specialization", array("raw"=>"true"));
$recent_publications = types_render_field ("recent-publications", array("raw"=>"true")); 
$cv = types_render_field ("cv", array("raw"=>"true"));

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
        <div class="row"><?php
        
          //left collumn image and sometimes information ?>
          <div class="col-sm-3"><?php    
              echo types_render_field("image", array("class"=>"margin-top-30"));  
        
        //if  person is a faculty member list contact information and CV in left collumn below image 
              if ($bio !='' || $education !='' || $specialization !='' || $course !='' || strlen($bio_char) > 2000) { ?>
                <p class="margin-top-30"><?php 
          echo types_render_field("department"); ?><br><?php 
          if ($academic_unit !=''){ 
          echo types_render_field("academic-unit"); ?><br><?php 
          }
                  echo types_render_field("officelocation"); ?><br><?php 
          echo types_render_field("city"); ?>, <?php 
                  echo types_render_field("state"); ?>&nbsp;&nbsp;<?php 
                  echo types_render_field("zip"); ?><br><br><?php 
          echo types_render_field("phone"); ?><br><?php 
          echo types_render_field("email"); 
          if ($website !=''){ ?>
                    <br><?php 
          echo types_render_field("website"); 
          } 
                  if ($cv !=''){ ?>
                    <br><br><a href="<?php echo types_render_field("cv", array("html"=>"true")); ?>" class="falk_button" target="_blank">CV &nbsp;<i class="fa fa-file-pdf-o"></i></a><?php 
          } ?>
                </p><?php 
        } 
        
        //if person is a faculty member with long Biography list Education, Specialization and Courses also in left collumn
              if ($bio !='' && strlen($bio_char) > 2000) {      
        if ($education !='') { ?>
                  <h4 class="margin-top-40">Education:</h4>
                  <p><?php 
          echo types_render_field("educationalhistory", array("separator"=>"</p><p>")); ?>
                  </p><?php 
        }
                if ($specialization !='') { ?>
                  <h4 class="margin-top-40">Specialization:</h4>
                  <p><?php 
          echo types_render_field("specialization"); ?>
                  </p><?php 
        }
                if ($course !='') { ?> 
                  <h4 class="margin-top-40">Courses:</h4>
                  <p><?php 
          echo types_render_field("courses-teaching-taught", array("separator"=>"</p><p>")); ?>
                  </p><?php 
        }   
        } ?>
            </div><?php 
      
      //right collumn: Name, Credentials, Title, Biography and other biographical information ?>
            <div class="col-sm-6"><?php
        //First Name, Last Name ?>
              <h1 style="margin-bottom:0;" class="title"><?php 
        echo types_render_field("firstname"); ?>&nbsp;<?php echo types_render_field("lastname"); ?>
              </h1><?php
        //Credentials 
        if ($credentials !='') { ?>
                <h5 style="margin:0;"><?php 
          echo types_render_field("credentials"); ?>
                </h5> <?php 
        } 
        //Title ?>   
              <h4 style="margin-top:10px;line-height:30px;"><?php 
        echo types_render_field("title", array("separator"=>"<br>")); ?>
              </h4><?php 
        
        //if person is a staff member list contact information in right collumn below name and title (this means person does not have Biography, Courses, Education or Specialization listed)
        if ($bio =='' && $course =='' && $education =='' && $specialization ==''){ ?>
        <p class="margin-top-30"><?php 
          echo types_render_field("department"); ?><br><?php 
          if ($academic_unit !=''){ 
          echo types_render_field("academic-unit"); ?><br><?php 
          }
          echo types_render_field("officelocation"); ?><br><?php 
          echo types_render_field("city"); ?>, <?php 
          echo types_render_field("state"); ?>&nbsp;&nbsp;<?php 
          echo types_render_field("zip"); ?><br><br><?php 
          echo types_render_field("phone"); ?><br><?php 
          echo types_render_field("email");  
          if ($website !=''){ ?>
          <br><?php 
          echo types_render_field("website"); 
          } 
          if ($cv !=''){ ?>
          <br><br><a href="<?php echo types_render_field("cv", array("html"=>"true")); ?>" class="falk_button" target="_blank">CV &nbsp;<i class="fa fa-file-pdf-o"></i></a><?php 
          } ?>
        </p><?php
        }
        
        //if person is faculty member with Biography list this in right hand collumn
        if ($bio !='') { ?>
        <p> <?php echo types_render_field("biography"); ?> </p><?php
        }
        
        //if person is a faculty member with a short Biography or no Biography also list Courses, Education and Specialization in right collumn
        if ($bio !='' && strlen($bio_char) < 2000 || $bio =='') {  
        //if there is no Biography list Specialization first
        if ($specialization !='' && $bio =='') { ?>
          <h4 class="margin-top-40">Specialization</h4>
          <p><?php 
          echo types_render_field("specialization"); ?>
          </p> <?php 
        }
        if ($education !='') { ?>
          <h4 class="margin-top-40">Education</h4>
          <p><?php 
          echo types_render_field("educationalhistory", array("separator"=>"</p><p>")); ?>
          </p><?php 
        }
        //if there is a Biography list Specialization second
        if ($specialization !='' && $bio !='') { ?>
          <h4 class="margin-top-40">Specialization</h4>
          <p><?php 
          echo types_render_field("specialization"); ?>
          </p> <?php 
        }
        if ($course !='') { ?> 
          <h4 class="margin-top-40">Courses</h4>
          <p><?php 
          echo types_render_field("courses-teaching-taught", array("separator"=>"</p><p>")); ?>
          </p><?php 
        }
        }
        
        //if person is a faculty member with Recent Publications list these last in right collumn     
        if ($recent_publications !=''){ ?>
        <h4 class="margin-top-40">Recent Publications</h4>
        <ul><li><?php echo types_render_field("recent-publications", array("separator"=>"</li><li>")); ?></li></ul><?php 
        } ?>  
            </div>
          </div>
        </div>
    </article>

<?php
//from template-parts/content.php file date 12-12-15
get_template_part( 'template-parts/paginate' );

?></section><?php
//standard
get_footer();
