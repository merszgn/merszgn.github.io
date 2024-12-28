<?php get_header(); ?>

<main>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
    <article>
        <h1><?php the_title(); ?></h1> <!-- Page title -->
        <div><?php the_content(); ?></div> <!-- Page content -->
    </article>
    <?php
        endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>