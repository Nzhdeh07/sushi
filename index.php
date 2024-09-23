<?php
get_header();

get_template_part('module/widgetes/banner', null, array());
get_template_part('module/mainContent', null, array());

get_footer();

?>



<!--if ( have_posts() ) : while ( have_posts() ) : the_post();-->
<!--get_template_part( 'entry' );-->
<!--comments_template();-->
<!--endwhile; endif;-->
<!--get_template_part( 'nav', 'below' );-->