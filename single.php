<?php
/* Template Name: Prof Exp */

function enqueue_single_styles() {
    if (is_single()) {  // Check if it's a single post page
        wp_enqueue_style('single-styles', get_template_directory_uri() . '/single.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_single_styles');

get_header(); 
?>

<main id="single-post-main">
    <article class="single-post-container" style="border: 1px solid #48383A70;">
        <?php if (has_post_thumbnail()) : ?>
        <div id="post-thumbnail">
            <?php the_post_thumbnail('custom-thumbnail'); ?>
            <!-- Use custom size -->
        </div>
        <?php endif; ?>
        <h1 class="post-title"><?php the_title(); ?><span class="post-date">
                <?php the_time('F j, Y \: g:i a'); ?>
            </span>
        </h1> <!-- Display the post title -->
        <hr>
        <div class="post-content">
            <?php the_content(); ?>
            <!-- Display the full post content -->
        </div>
        <div class="post-meta">
            <p><small>Categories: <?php the_category(', '); ?></small></p> <!-- Post categories -->
            <p><small><?php the_tags(); ?></small></p> <!-- Post tags -->
        </div>
    </article>
</main>

<?php get_footer(); ?>
<!-- Include the footer.php -->