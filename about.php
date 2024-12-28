<?php
/* Template Name: About Me */

function enqueue_about_styles() {
    if (is_page('about')) { // This ensures the stylesheet is only loaded on the About page
        wp_enqueue_style('about-style', get_template_directory_uri() . '/about.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_about_styles');

get_header(); 
?>

<main id="about-me">
    <section class="about-header">
    </section>
    <section class="about-section">
        <h1>Who am I?</h1>
        <hr>
        <p>
            My name is Meryem and I'm a Turkish-Muslim college student residing in the Bay Area of California. I
            graduated high school in two years and am majoring in biology now at the age of sixteen. I am interested in
            going to medical school and specializing in anesthesiology.</p>
        <p>I've always had an interest in web development and design. Since 2020, I have been on the internet creating
            websites and pursuing this hobby publicly. I started my first website on Neocities. I have had multiple
            anonymous websites on the internet since starting this journey. Now, I've become interested in dedicating a
            webpage entirely to myself and my thoughts.</p>
    </section>
    <section class="about-section">
        <h1>My Purpose</h1>
        <hr>
        <p>
            Human beings love materials and possessions. It gives us a sense of being and a reason to live for. I count
            myself in this group, having been an owner of probably thousands of items throughout my life so far.
            However, I still feel this slight emptiness in my heart and a lack of belonging. I fear that if I was ever
            asked what I have contributed to the world, I would be at a loss for words. I realize that I have done a lot
            of taking from this world but not enough giving.</p>
        <p>
            My purpose for this website remains to be to give back. By combining my love for the internet/web design and
            my goal of contributing to this Earth, I have come to the conclusion that <a href="http://meryem.local"
                class="gradient-text">meryem<i>.earth</i></a> shall be a corner of the web
            where I will share my possessions and thoughts with the rest of the world. I hope that in the process of
            maintaining this website, I will be able to display the importance of having a balanced sense of
            materialistic belonging through an extension of your mind that allows you to express yourself freely.</p>
    </section>
</main>

<?php get_footer(); ?>