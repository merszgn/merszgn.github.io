<?php
/* Template Name: Prof Exp */

function enqueue_about_styles() {
    if (is_page('experiences')) {
        wp_enqueue_style('experiences-style', get_template_directory_uri() . '/profexp.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_about_styles');

get_header(); 
?>

<main id="profexp">
    <section class="prof-header">
    </section>
    <section class="prof-section">
        <h1>Experiences</h1>
        <hr>
        <p>
            This page will be filled soon. Keep an eye out.</p>
    </section>
</main>

<?php get_footer(); ?>