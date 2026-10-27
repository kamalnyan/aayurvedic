<?php
/**
 * The template for displaying all single posts / Journal Articles
 *
 * @package Vedamrit
 */

get_header();

$articles     = vedamrit_get_articles();
$current_slug = get_query_var('name', '');

$article = null;
if (!empty($current_slug)) {
    foreach ($articles as $a) {
        if ($a['slug'] === $current_slug) {
            $article = $a;
            break;
        }
    }
}
if (!$article) {
    $article = $articles[0];
}

$related = array_slice($articles, 1, 2);
?>

<main id="main-content" class="site-main article-detail-main">
    <div class="vedamrit-container article-container py-12">
        <a href="<?php echo esc_url(home_url('/journal/')); ?>" class="back-link">
            ← Back to All Articles
        </a>

        <div class="article-header-center">
            <span class="subheading-pill"><?php echo esc_html($article['category']); ?> • <?php echo esc_html($article['read_time']); ?></span>
            <h1 class="article-headline"><?php echo esc_html($article['title']); ?></h1>
            <p class="article-lead"><?php echo esc_html($article['excerpt']); ?></p>
            <div class="article-author-byline">
                <span>By <strong><?php echo esc_html($article['author']); ?></strong></span> • Published on <?php echo esc_html($article['date']); ?>
            </div>
        </div>

        <div class="article-featured-image-card">
            <img src="<?php echo esc_url($article['image']); ?>" alt="<?php echo esc_attr($article['title']); ?>">
        </div>

        <div class="article-prose-body">
            <?php foreach ($article['content'] as $para) : ?>
                <p><?php echo esc_html($para); ?></p>
            <?php endforeach; ?>

            <div class="article-quote-callout">
                <strong class="quote-title">VEDAMRIT Living Principle:</strong>
                <p class="quote-italic">
                    &ldquo;When diet and daily rhythm are harmonious, medicine is of no need. When daily rhythm is corrupted, medicine is of no avail.&rdquo;
                </p>
            </div>
        </div>

        <!-- Author Bio Box -->
        <div class="author-bio-card">
            <div class="author-avatar"><?php echo substr($article['author'], 0, 1); ?></div>
            <div>
                <h4 class="author-bio-name"><?php echo esc_html($article['author']); ?></h4>
                <p class="author-bio-text">
                    Contributing researcher for VEDAMRIT Botanicals, focusing on Classical Ayurveda, Dinacharya rhythms, and sustainable ethnobotany.
                </p>
            </div>
        </div>

        <!-- Related Reads -->
        <?php if (!empty($related)) : ?>
            <div class="related-reads-section">
                <h3 class="related-reads-title">More From The Journal</h3>
                <div class="related-reads-grid">
                    <?php foreach ($related as $r) : ?>
                        <div class="related-read-card">
                            <span class="related-cat"><?php echo esc_html($r['category']); ?></span>
                            <h4 class="related-card-title">
                                <a href="<?php echo esc_url(home_url('/journal/' . $r['slug'] . '/')); ?>">
                                    <?php echo esc_html($r['title']); ?>
                                </a>
                            </h4>
                            <p class="related-desc"><?php echo esc_html($r['excerpt']); ?></p>
                            <a href="<?php echo esc_url(home_url('/journal/' . $r['slug'] . '/')); ?>" class="related-link">Read Article →</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
