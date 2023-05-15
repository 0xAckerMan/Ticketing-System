<?php get_header();?>
<h1> This is the index page</h1>

<?php
    if (have_posts()):
        while(have_posts()):the_post();
        
        the_title();
        the_content();
    endwhile;
endif;
?>

<?php get_footer();?>