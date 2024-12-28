<?php
/* Template Name: Contact Me */

function enqueue_about_styles() {
    if (is_page('contact')) {
        wp_enqueue_style('contact-style', get_template_directory_uri() . '/contact.css');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_about_styles');

get_header(); 
?>

<main id="contact-me">
    <section class="contact-header">
    </section>
    <section class="contact-section">
        <h1>Contact Me</h1>
        <hr>
        <p>If you have any inquiries or something else you would like to share with me, please fill out the form below!
        </p>
        <p>
            <strong>Please double-check that you included your email and name correctly so I can contact you with a
                reply :]</strong>
        </p>
    </section>
    <section class="contact-section">
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
            <input type="hidden" name="action" value="custom_contact_form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <br>
            <button type="submit">Send</button>
        </form>
    </section>
</main>

<?php get_footer(); ?>