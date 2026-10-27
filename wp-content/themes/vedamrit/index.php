<?php
/**
 * The main template file / Wellness Journal
 *
 * @package Vedamrit
 */

get_header();

$articles = vedamrit_get_articles();
?>

<main id="main-content" class="site-main journal-page-main">
    <div class="vedamrit-container py-12">
        <div class="section-header-center">
            <span class="subheading-pill">DISPATCHES & ESSAYS</span>
            <h1 class="page-main-title">The Wellness Journal</h1>
            <p class="section-subtitle">
                Thoughtful essays, classical philosophies, and realistic lifestyle rituals to help you weave the wisdom of Ayurveda into contemporary life.
            </p>
        </div>

        <div class="journal-articles-grid">
            <?php foreach ($articles as $art) : ?>
                <article class="article-card">
                    <div class="article-img-wrap">
                        <img src="<?php echo esc_url($art['image']); ?>" alt="<?php echo esc_attr($art['title']); ?>" loading="lazy">
                        <span class="article-category-badge"><?php echo esc_html($art['category']); ?></span>
                    </div>
                    <div class="article-card-body">
                        <div class="article-meta">
                            <span><?php echo esc_html($art['date']); ?></span>
                            <span>•</span>
                            <span><?php echo esc_html($art['read_time']); ?></span>
                        </div>
                        <h2 class="article-title">
                            <a href="<?php echo esc_url(home_url('/journal/' . $art['slug'] . '/')); ?>">
                                <?php echo esc_html($art['title']); ?>
                            </a>
                        </h2>
                        <p class="article-excerpt"><?php echo esc_html($art['excerpt']); ?></p>
                        <div class="article-footer-row">
                            <span class="article-author-name">By <?php echo esc_html($art['author']); ?></span>
                            <a href="<?php echo esc_url(home_url('/journal/' . $art['slug'] . '/')); ?>" class="article-read-more">
                                <span>Read Article</span> →
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php
get_footer();
