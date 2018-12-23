<?php get_header(); ?>
<main role="main" class="container">
  <div class="row">
    <div class="col-md-12 blog-main">
        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
        
            get_template_part( 'content-single', get_post_format() );

          if ( comments_open() || get_comments_number() ) :
            comments_template();
          endif;

        endwhile; endif;
        ?>

    </div><!-- /.blog-main -->

  </div><!-- /.row -->

</main><!-- /.container -->
<?php get_footer(); ?>