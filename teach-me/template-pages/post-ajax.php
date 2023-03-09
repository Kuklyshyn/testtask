<?php
/*
Template Name: Post ajax
*/
get_header();
?>

<div class="post-wrapper">
    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' =>3,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php  endwhile;
    endif;
    wp_reset_postdata();
    ?>
</div>
<div class="btn-group">
    <button id="load-more" data-page="0">Load More</button>
    <button id="back-more" data-page="0">Back More</button>
</div>

<div class="overlay active">
    <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<?php
get_footer();
?>

