<?php
get_header(); // Include the header

if (have_posts()) : ?>
    <h1><?php post_type_archive_title(); // Display the archive title ?></h1>
    <div class="services-archive">
        <?php while (have_posts()) : the_post(); ?>
            <div class="service-post">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('thumbnail'); // Display the post thumbnail ?>
                    </div>
                <?php endif; ?>
                <p><?php the_excerpt(); // Display the excerpt ?></p>
            </div>
        <?php endwhile; ?>
    </div>
else :
    echo '<p>No services found.</p>';
endif;

get_footer(); // Include the footer
