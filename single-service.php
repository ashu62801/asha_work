<?php
get_header(); // Include the header

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <div class="service-post">
            <h1><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            <?php endif; ?>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
        
        <aside id="secondary" class="widget-area">
            <?php if (is_active_sidebar('custom-sidebar')) : ?>
                <?php dynamic_sidebar('custom-sidebar'); ?>
            <?php endif; ?>
        </aside>

    <?php endwhile;
else :
    echo '<p>No services found.</p>';
endif;

get_footer(); // Include the footer
