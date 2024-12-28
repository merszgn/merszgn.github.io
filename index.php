<?php get_header(); ?>
<!-- This includes the content from header.php -->

<main>
    <!-- First Column -->
    <div class="columns-container">
        <div class="column1">
            <?php
    $post_count = 0; // Track how many posts we've displayed
    if (have_posts()) :  // WordPress Loop
        while (have_posts()) : the_post();
            if ($post_count % 2 == 1) : // Check if it's the second post (for first column)
                ?>
            <div class="post"
                style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
                <!-- Post title with link -->
                <div class="posts-content">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <!-- Display the post publish date and time -->
                    <div class="post-date">
                        <p><?php the_time('F j, Y \: g:i a'); ?></p>
                        <!-- This will show something like: "Published on: December 25, 2024 at 5:30 pm" -->
                    </div>
                    <!-- Display a post snippet (first 20 words) -->
                    <div class="post-snippet">
                        <?php 
                    $content = wp_trim_words(get_the_content(), 20);  // Limit to 50 words
                    echo $content;
                    ?>
                        <!-- "Read More" button -->
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
            <?php
            endif;
            $post_count++; // Increment the post counter
        endwhile;
    else :
        echo '<p>No posts found. Check back later.</p>';
    endif;
    ?>
        </div>

        <!-- Second Column -->
        <div class="column2">
            <?php
    $post_count = 0; // Reset the post counter for the second column
    if (have_posts()) :  // WordPress Loop
        while (have_posts()) : the_post();
            if ($post_count % 2 == 0) : // Check if it's the first post (for second column)
                ?>
            <div class="post"
                style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
                <!-- Post title with link -->
                <div class="posts-content">
                    <h2 class="post-title"><?php the_title(); ?></h2>
                    <!-- Display the post publish date and time -->
                    <div class="post-date">
                        <p><?php the_time('F j, Y \: g:i a'); ?></p>
                        <!-- This will show something like: "Published on: December 25, 2024 at 5:30 pm" -->
                    </div>
                    <!-- Display a post snippet (first 20 words) -->
                    <div class="post-snippet">
                        <?php 
                    $content = wp_trim_words(get_the_content(), 20);  // Limit to 50 words
                    echo $content;
                    ?>
                        <!-- "Read More" button -->
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
            <?php
            endif;
            $post_count++; // Increment the post counter
        endwhile;
    else :
        echo '';
    endif;
    ?>
        </div>
    </div>

    <!-- Pagination Outside Columns -->
    <div id="pagination">
        <?php
    if (get_previous_posts_link()) : ?>
        <?php previous_posts_link('previous'); ?>
        <?php endif; ?>

        <?php
    if (get_next_posts_link()) : ?>
        <?php next_posts_link('next'); ?>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
<!-- This includes the content from footer.php -->