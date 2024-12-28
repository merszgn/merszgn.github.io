<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
    <h2 class="comments-title">
        <?php
            printf(
                _nx(
                    'one reply to "%2$s"',
                    '%1$s replies to "%2$s"',
                    get_comments_number(),
                    'comments title',
                    'textdomain'
                ),
                number_format_i18n(get_comments_number()),
                get_the_title()
            );
            ?>
    </h2>

    <ol class="comment-list">
        <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
            ));
            ?>
    </ol>
    <?php endif; ?>

    <?php
    if (!comments_open()) :
        echo '<p class="no-comments">' . esc_html__('Replies are closed.', 'textdomain') . '</p>';
    endif;

    comment_form(array(
        'logged_in_as' => '', // Removes the "Logged in as..." line
        'comment_notes_before' => '', // Removes "Required fields are marked *"
        'title_reply' => __('Reply'),
        'comment_notes_before' => '',
        'label_submit' => __('Post Reply'),
    ));    
    ?>
</div>