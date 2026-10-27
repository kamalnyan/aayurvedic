<?php
/**
 * The template for displaying all default pages
 *
 * @package Vedamrit
 */

get_header();
?>

<main id="main-content" class="site-main default-page-main">
    <div class="vedamrit-container py-12">
        <article class="standard-page-card">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="page-entry-content">
                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </article>
    </div>
</main>

<?php
get_footer();
