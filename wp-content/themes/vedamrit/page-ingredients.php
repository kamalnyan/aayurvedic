<?php
/**
 * Template Name: Ingredients Compendium
 *
 * @package Vedamrit
 */

get_header();

$ingredients  = vedamrit_get_ingredients();
$all_products = vedamrit_get_products();
?>

<main id="main-content" class="site-main ingredients-page-main">
    <div class="vedamrit-container py-12">
        <!-- Header -->
        <div class="section-header-center">
            <span class="subheading-pill">BOTANICAL COMPENDIUM</span>
            <h1 class="page-main-title">The Sacred Botanicals</h1>
            <p class="section-subtitle">
                Every plant carries a distinct energetic footprint (Rasa, Virya, Vipaka). Explore how authentic herbs have been utilized across five millennia to awaken physiological harmony.
            </p>

            <div class="educational-advisory-banner">
                <strong>🌿 Educational Transparency:</strong>
                <p>Traditional uses noted here describe historical Ayurvedic philosophy and energetic balancing principles. They are not intended as medical claims to diagnose, cure, or treat any disease.</p>
            </div>
        </div>

        <!-- Ingredients Directory Grid -->
        <div class="ingredients-directory-grid">
            <?php foreach ($ingredients as $ing) : 
                // Find products containing this ingredient
                $matched_products = array();
                foreach ($all_products as $p) {
                    if (in_array($p['slug'], $ing['product_slugs'])) {
                        $matched_products[] = $p;
                    }
                }
            ?>
                <div class="ingredient-detail-card">
                    <div class="ingredient-detail-img-wrap">
                        <img src="<?php echo esc_url($ing['image']); ?>" alt="<?php echo esc_attr($ing['name']); ?>" loading="lazy">
                        <span class="ingredient-badge-sanskrit"><?php echo esc_html($ing['sanskrit_name']); ?></span>
                    </div>

                    <div class="ingredient-detail-body">
                        <h2 class="ingredient-heading"><?php echo esc_html($ing['name']); ?></h2>
                        <p class="ingredient-botanical-italic"><?php echo esc_html($ing['botanical_name']); ?></p>

                        <div class="ingredient-action-box">
                            <div><strong>Energetics:</strong> <?php echo esc_html($ing['dosha_impact']); ?></div>
                            <div class="mt-1"><strong>Traditional Action:</strong> <?php echo esc_html($ing['traditional_use']); ?></div>
                        </div>

                        <p class="ingredient-paragraph"><?php echo esc_html($ing['description']); ?></p>

                        <?php if (!empty($matched_products)) : ?>
                            <div class="formulated-products-area">
                                <span class="formulated-title">Formulated In:</span>
                                <div class="formulated-links-list">
                                    <?php foreach ($matched_products as $mp) : ?>
                                        <a href="<?php echo esc_url(home_url('/shop/' . $mp['slug'] . '/')); ?>" class="formulated-pill">
                                            <span><?php echo esc_html($mp['name']); ?></span> →
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bottom Banner -->
        <div class="ingredients-bottom-cta">
            <h2 class="bottom-cta-title">Discover Your Personalized Herbal Formula</h2>
            <p class="bottom-cta-desc">Experience the harmony of authentic whole botanicals, cold-pressed oils, and traditional churnas.</p>
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn btn-light btn-large">
                <span>Explore All Botanicals in Shop</span>
                <span class="arrow-symbol">→</span>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
