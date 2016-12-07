<?php
/*
 * This is the template file for the gallery taxonomy
 */

 get_header();?>

 <div id="mainContainerWrapper">
   <div id="mainContainer">
     <div id="mainContainerShadow">
       <div id="contentContainer" class="temp-fullwidth">
         <div id="contentContainerInside" class="temp-fullwidth">
           <section class="temp-fullwidth">
             <div class="breadcrumb">
       			  <ul id="breadcrumbs" class="breadcrumbs">
       			  <li><a href="<?php bloginfo('url') ?>">Home</a></li>
       			  <li class="separator">&raquo;</li>
       			  <li><a href="<?php bloginfo('url') ?>/blog/">Blog</a></li>
       			  <li class="separator">&raquo;</li>
       			  <li class="item-current item-archive"><strong>Archive for <?php the_time('F Y'); ?></strong></li>
       			  </ul>
             </div>
             <div class="clear"></div>
             <h1><?php single_term_title(); ?></h1>
             <?php if (have_posts()) : ?>
               <div class="gallery-wrapper">
             <?php while (have_posts()) : the_post(); ?>
                 <a class="gallery-item" href="<?php the_post_thumbnail_url('full')?>">
                   <?php the_post_thumbnail('medium'); ?>
                 </a>
             <?php endwhile; ?>
              </div>
             <?php else : ?>
             <div class="post">
               <h2 class="posttitle">
                 <?php _e('Not Found') ?>
               </h2>
               <div class="postentry">
                 <p>
                   <?php _e('Sorry, no posts matched your criteria.'); ?>
                 </p>
               </div>
             </div>
             <?php endif; ?>
             <div class="clr"></div>
             <div style="width:100%; overflow:hidden; margin-bottom:40px;">
               <?php wp_pagenavi(); ?>
               <a href="#top" class="top backtotop"><img src="<?php bloginfo('template_url'); ?>/images/button-top.png" alt="Back to Top"></a> </div>
           </section>
           <div class="clear"></div>
         </div>
       </div>
     </div>
   </div>
 </div>

 <script>
  jQuery(document).ready(function($){
    $('.gallery-wrapper').magnificPopup({
      delegate: 'a', // child items selector, by clicking on it popup will open
      type: 'image'
      // other options
    });
  });
 </script>

<?php get_footer();
