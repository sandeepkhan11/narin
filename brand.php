<?php
/**
 * Template Name: Brand New Page
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 
while(have_posts()): the_post();
endwhile;
	$image =wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'single-post-thumbnail' ); 
?>
<div class="container">
  <div class="inner-wrapper">
    <div class="hdr-banner brands">
      <div class="page-title-over">
        <h2><?php echo get_the_title();?></h2>
      </div>
      <img src="<?php echo  $image[0]?>"></div>
    <div class="brands-container">
      <div class="breadcrumbs clearfix">
       <?php echo custom_breadcrumbs(); ?>
      </div>
      <div class="brands-content">
        <div class="row">
          <div class="col-md-8">
           <?php echo the_content();?>
          </div>
          <div class="col-md-4">
            <div class="pull-right"><a href="<?php echo get_permalink(129)?>" class="get-quote-btn">Get a Quote Now</a></div>
          </div>
        </div>
      </div>
      <div class="brands-listing clearfix">
     
		  <?php
		  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;										
			$args = array(
			'orderby' => 'post_date',
			'order' => 'ASC',
			'post_type' => 'brands',
			'post_status' => 'publish',
			'paged' => $paged,
			'posts_per_page' => -1
			);
		    // now executing query with query_posts					
			query_posts($args);
			while(have_posts()):the_post(); 		  
		  ?>
		   <div class="brand-post"> 
          
            <a href="<?php the_permalink(); ?>">
            <div class="brand-media">
			<?php if(has_post_thumbnail()){
				echo the_post_thumbnail('blog_thumb');
				}
				else
				{								
				echo '<img src="http://placehold.it/220x220/e1e1e1">';
				}
				 ?>
		    </div> 
            <h3><span><?php the_title(); ?></span></h3>          
            </a>
          </div>
		<?php  endwhile;
		
		wp_reset_query(); ?>
		
        
      </div>
      <div class="contact-div">
        <div class="row">
          <div class="col-md-9 col-sm-8">
           <?php the_field('contact_us_area')?>
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="call-today"><img src="<?php echo get_field('call_today');?>"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer();  ?>

