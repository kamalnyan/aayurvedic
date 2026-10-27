<?php
/**
 * The Front Page template for VEDAMRIT Theme
 *
 * @package Vedamrit
 */

get_header();

$products    = vedamrit_get_products();
$categories  = vedamrit_get_categories();
$ingredients = vedamrit_get_ingredients();
$articles    = vedamrit_get_articles();
$bestsellers = array_slice($products, 0, 6);
?>

<main id="main-content" class="site-main">

    <!-- 1. HERO SECTION -->
    <section class="vedamrit-hero-section">
        <div class="vedamrit-container hero-container">
            <div class="hero-grid">
                <!-- Left Editorial Text -->
                <div class="hero-text-content">
                    <div class="hero-badge">
                        <span class="badge-leaf">🌿</span>
                        <span>Small-Batch • Classical Indian Formulations</span>
                    </div>

                    <h1 class="hero-headline">
                        Ancient Wisdom. <br>
                        <span class="hero-headline-italic">Everyday Wellness.</span>
                    </h1>

                    <p class="hero-subtext">
                        Discover thoughtfully crafted Ayurvedic essentials inspired by nature and rooted in traditional Indian wellness. Formulated with authentic whole herbs to harmonize mind, body, and spirit.
                    </p>

                    <div class="hero-cta-group">
                        <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn btn-primary btn-large">
                            <span>Explore Our Collection</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="btn-icon-svg"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </a>
                        <a href="<?php echo esc_url(home_url('/philosophy/')); ?>" class="btn btn-outline btn-large">
                            <span>Our Philosophy</span>
                        </a>
                    </div>

                    <!-- Trust Checklist -->
                    <div class="hero-checklist">
                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <span>100% Vegetarian Capsules</span>
                        </div>
                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <span>Zero Chemical Fillers</span>
                        </div>
                        <div class="check-item">
                            <span class="check-icon">✓</span>
                            <span>Cold-Extracted Botanicals</span>
                        </div>
                    </div>
                </div>

                <!-- Right Hero Image with Floating Badge -->
                <div class="hero-image-wrapper">
                    <div class="hero-image-card">
                        <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&q=80&w=1200" alt="Ayurvedic herbs, glass jars, and natural sunlight" class="hero-img" loading="eager">
                        <div class="hero-floating-card">
                            <div class="floating-icon">✦</div>
                            <div>
                                <h4 class="floating-title">Rooted in Classical Texts</h4>
                                <p class="floating-desc">Formulated according to Charaka & Sushruta Samhita guidelines.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. TRUST HIGHLIGHTS -->
    <section class="trust-highlights-section">
        <div class="vedamrit-container">
            <div class="trust-grid">
                <div class="trust-card">
                    <div class="trust-icon">🧭</div>
                    <div class="trust-info">
                        <h4 class="trust-title">Inspired by Ayurveda</h4>
                        <p class="trust-desc">Honoring the 5,000-year Vedic tradition of balance & bio-energies.</p>
                    </div>
                </div>
                <div class="trust-card">
                    <div class="trust-icon">🌱</div>
                    <div class="trust-info">
                        <h4 class="trust-title">Thoughtfully Sourced</h4>
                        <p class="trust-desc">Wild-harvested roots and organic herbs from their native Indian soil.</p>
                    </div>
                </div>
                <div class="trust-card">
                    <div class="trust-icon">🛡️</div>
                    <div class="trust-info">
                        <h4 class="trust-title">Quality Formulations</h4>
                        <p class="trust-desc">Free from artificial dyes, sulfates, synthetic fragrances, and heavy toxins.</p>
                    </div>
                </div>
                <div class="trust-card">
                    <div class="trust-icon">☀️</div>
                    <div class="trust-info">
                        <h4 class="trust-title">Everyday Wellness</h4>
                        <p class="trust-desc">Gentle remedies easily woven into modern morning & evening rituals.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. FEATURED CATEGORIES -->
    <section class="categories-section">
        <div class="vedamrit-container">
            <div class="section-header-flex">
                <div>
                    <span class="subheading-pill">RITUALS BY NEED</span>
                    <h2 class="section-title">Explore by Category</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="view-all-link">
                    <span>View All Remedies</span>
                    <span class="arrow-symbol">→</span>
                </a>
            </div>

            <div class="categories-grid">
                <?php foreach ($categories as $cat) : ?>
                    <a href="<?php echo esc_url(home_url('/shop/?category=' . $cat['slug'])); ?>" class="category-card">
                        <div class="category-img-wrap">
                            <img src="<?php echo esc_url($cat['image']); ?>" alt="<?php echo esc_attr($cat['name']); ?>" loading="lazy">
                        </div>
                        <div class="category-card-body">
                            <h3 class="category-name"><?php echo esc_html($cat['name']); ?></h3>
                            <p class="category-desc"><?php echo esc_html($cat['description']); ?></p>
                            <span class="category-explore-link">
                                <span>Explore</span>
                                <span class="arrow-symbol">→</span>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 4. BESTSELLING PRODUCTS -->
    <section class="products-section">
        <div class="vedamrit-container">
            <div class="section-header-center">
                <span class="subheading-pill">TIME-TESTED ESSENTIALS</span>
                <h2 class="section-title">Our Bestselling Formulations</h2>
                <p class="section-subtitle">
                    Classical whole-herb supplements, cold-pressed head oils, and gentle clarifying cleansers celebrated for daily balance.
                </p>
            </div>

            <div class="products-grid">
                <?php foreach ($bestsellers as $prod) : 
                    $discount = $prod['original_price'] ? round((($prod['original_price'] - $prod['price']) / $prod['original_price']) * 100) : 0;
                ?>
                    <div class="product-card" data-product-id="<?php echo esc_attr($prod['id']); ?>" data-slug="<?php echo esc_attr($prod['slug']); ?>">
                        <div class="product-image-container">
                            <a href="<?php echo esc_url(home_url('/shop/' . $prod['slug'] . '/')); ?>" class="product-img-link">
                                <img src="<?php echo esc_url($prod['images'][0]); ?>" alt="<?php echo esc_attr($prod['name']); ?>" loading="lazy">
                            </a>

                            <div class="product-badges-top">
                                <?php if (!empty($prod['is_bestseller'])) : ?>
                                    <span class="badge-bestseller">Bestseller</span>
                                <?php endif; ?>
                                <?php if ($discount > 0) : ?>
                                    <span class="badge-discount"><?php echo esc_html($discount); ?>% OFF</span>
                                <?php endif; ?>
                            </div>

                            <span class="badge-dosha"><?php echo esc_html($prod['dosha']); ?></span>

                            <!-- Quick View Overlay Button -->
                            <button class="quick-view-btn" data-product-id="<?php echo esc_attr($prod['id']); ?>">
                                <span>👁 Quick View</span>
                            </button>
                        </div>

                        <div class="product-card-body">
                            <div class="product-category-row">
                                <span class="prod-cat"><?php echo esc_html($prod['category']); ?></span>
                                <div class="prod-rating">
                                    <span class="star-icon">★</span>
                                    <span><?php echo esc_html($prod['rating']); ?></span>
                                    <span class="review-count">(<?php echo esc_html($prod['review_count']); ?>)</span>
                                </div>
                            </div>

                            <h3 class="product-title">
                                <a href="<?php echo esc_url(home_url('/shop/' . $prod['slug'] . '/')); ?>">
                                    <?php echo esc_html($prod['name']); ?>
                                </a>
                            </h3>

                            <?php if (!empty($prod['sanskrit_name'])) : ?>
                                <p class="product-sanskrit"><?php echo esc_html($prod['sanskrit_name']); ?></p>
                            <?php endif; ?>

                            <p class="product-tagline"><?php echo esc_html($prod['tagline']); ?></p>

                            <div class="product-price-action-row">
                                <div class="price-box">
                                    <span class="current-price">₹<?php echo esc_html($prod['price']); ?></span>
                                    <?php if (!empty($prod['original_price'])) : ?>
                                        <span class="original-price">₹<?php echo esc_html($prod['original_price']); ?></span>
                                    <?php endif; ?>
                                    <span class="product-size-label"><?php echo esc_html($prod['default_size']); ?></span>
                                </div>

                                <button class="btn btn-cart add-to-cart-btn" data-product-id="<?php echo esc_attr($prod['id']); ?>">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="btn-icon-svg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                    <span>Add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="section-footer-center">
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn btn-primary btn-large">
                    <span>Explore All Ayurvedic Products</span>
                    <span class="arrow-symbol">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 5. OUR PHILOSOPHY -->
    <section id="philosophy" class="philosophy-section">
        <div class="vedamrit-container">
            <div class="philosophy-grid">
                <!-- Left Image Composition -->
                <div class="philosophy-image-col">
                    <div class="philosophy-image-card">
                        <img src="https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&q=80&w=1000" alt="Ayurvedic herbs and glass jars" loading="lazy">
                    </div>
                    <div class="transparency-badge-card">
                        <span class="transparency-number">100%</span>
                        <span class="transparency-label">Ingredient Transparency</span>
                        <p class="transparency-desc">Full disclosure of every botanical root, carrier oil, and method.</p>
                    </div>
                </div>

                <!-- Right Editorial Text -->
                <div class="philosophy-text-col">
                    <span class="subheading-pill light-pill">THE VEDAMRIT WAY</span>
                    <h2 class="philosophy-headline">
                        Rooted in Nature. <br>
                        <span class="headline-light">Guided by Ayurveda.</span>
                    </h2>

                    <p class="philosophy-body">
                        In a world rushing after synthetic fixes and instant stimulants, VEDAMRIT returns to the timeless wisdom of classical Ayurveda. We believe health is not merely the absence of disease, but the luminous equilibrium of body, breath, mind, and soul.
                    </p>

                    <div class="philosophy-pillars-grid">
                        <div class="pillar-card">
                            <h4 class="pillar-title">💧 Whole-Plant Synergy</h4>
                            <p class="pillar-desc">We use whole herbs with all their naturally occurring co-factors, allowing gentle absorption without digestive distress.</p>
                        </div>
                        <div class="pillar-card">
                            <h4 class="pillar-title">☀️ Ethical Indian Sourcing</h4>
                            <p class="pillar-desc">Partnering directly with smallholder farming cooperatives in Madhya Pradesh, Kerala, and Uttarakhand.</p>
                        </div>
                    </div>

                    <div class="philosophy-cta-wrap">
                        <a href="<?php echo esc_url(home_url('/philosophy/')); ?>" class="btn btn-light">
                            <span>Read Our Complete Story</span>
                            <span class="arrow-symbol">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. INGREDIENT SPOTLIGHT -->
    <section class="ingredients-section">
        <div class="vedamrit-container">
            <div class="section-header-center">
                <span class="subheading-pill">SACRED BOTANICALS</span>
                <h2 class="section-title">Ingredient Spotlight</h2>
                <p class="section-subtitle">
                    Explore the revered botanicals at the heart of our formulations. We clearly distinguish traditional Ayurvedic properties from clinical statements.
                </p>
            </div>

            <div class="ingredients-grid">
                <?php foreach ($ingredients as $ing) : ?>
                    <div class="ingredient-card">
                        <div class="ingredient-img-wrap">
                            <img src="<?php echo esc_url($ing['image']); ?>" alt="<?php echo esc_attr($ing['name']); ?>" loading="lazy">
                            <span class="ingredient-sanskrit-tag"><?php echo esc_html($ing['sanskrit_name']); ?></span>
                        </div>
                        <div class="ingredient-card-body">
                            <h3 class="ingredient-title"><?php echo esc_html($ing['name']); ?></h3>
                            <p class="ingredient-botanical"><?php echo esc_html($ing['botanical_name']); ?></p>

                            <div class="ingredient-action-box">
                                <strong>Traditional Action:</strong> <?php echo esc_html($ing['traditional_use']); ?>
                            </div>

                            <p class="ingredient-desc"><?php echo esc_html($ing['description']); ?></p>

                            <div class="ingredient-card-footer">
                                <span class="ingredient-dosha"><?php echo esc_html($ing['dosha_impact']); ?></span>
                                <a href="<?php echo esc_url(home_url('/ingredients/')); ?>" class="ingredient-link">Directory →</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="section-footer-center">
                <a href="<?php echo esc_url(home_url('/ingredients/')); ?>" class="btn btn-outline">
                    <span>Explore Complete Botanical Directory</span>
                    <span class="arrow-symbol">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 7. LIFESTYLE BANNER -->
    <section class="lifestyle-banner-section">
        <div class="lifestyle-banner-bg" style="background-image: url('https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&q=80&w=1600');"></div>
        <div class="vedamrit-container lifestyle-content-wrap">
            <div class="lifestyle-text-box">
                <span class="subheading-pill light-pill">THE DAILY RITUAL</span>
                <h2 class="lifestyle-title">Make Wellness a Daily Ritual.</h2>
                <p class="lifestyle-desc">
                    When living in harmony with your natural constitution, vibrant energy and quiet serenity follow effortlessly. Awaken to mindful daily care.
                </p>
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn btn-light btn-large">
                    <span>Find Your Essentials</span>
                    <span class="arrow-symbol">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 8. CUSTOMER TESTIMONIALS / VERIFIED REVIEWS PREVIEW -->
    <section class="testimonials-section">
        <div class="vedamrit-container">
            <div class="section-header-center">
                <span class="subheading-pill">COMMUNITY REFLECTIONS</span>
                <h2 class="section-title">Rituals in Practice</h2>
                <p class="section-subtitle">*Designed for future verified customer reviews. Sample reflection states for client preview:*</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="review-stars">★★★★★</div>
                    <p class="testimonial-quote">
                        &ldquo;The Keshya Hair Oil has completely transformed my Sunday self-care ritual. The earthy herbal scent of Bhringraj and cold-pressed sesame feels so grounding after a hectic work week.&rdquo;
                    </p>
                    <div class="testimonial-author">
                        <div>
                            <strong class="author-name">Meera R.</strong>
                            <span class="author-location">Verified Purchaser • Bengaluru</span>
                        </div>
                        <span class="product-tagged">Keshya Hair Oil</span>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="review-stars">★★★★★</div>
                    <p class="testimonial-quote">
                        &ldquo;Unlike other supplements with synthetic binders, these Amla and Ashwagandha capsules are clean and easy on the stomach. The packaging is gorgeous and recyclable glass.&rdquo;
                    </p>
                    <div class="testimonial-author">
                        <div>
                            <strong class="author-name">Dr. Siddharth M.</strong>
                            <span class="author-location">Verified Purchaser • Mumbai</span>
                        </div>
                        <span class="product-tagged">Amla Capsules</span>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="review-stars">★★★★★</div>
                    <p class="testimonial-quote">
                        &ldquo;The Triphala Churna has been a gentle staple in my evening wind-down routine. It is refreshing to find an Ayurvedic brand that prioritizes quality testing without aggressive marketing claims.&rdquo;
                    </p>
                    <div class="testimonial-author">
                        <div>
                            <strong class="author-name">Pooja V.</strong>
                            <span class="author-location">Verified Purchaser • Delhi NCR</span>
                        </div>
                        <span class="product-tagged">Triphala Churna</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. JOURNAL / WELLNESS BLOG -->
    <section class="journal-section">
        <div class="vedamrit-container">
            <div class="section-header-flex">
                <div>
                    <span class="subheading-pill">WISDOM & RITUALS</span>
                    <h2 class="section-title">The Wellness Journal</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/journal/')); ?>" class="view-all-link">
                    <span>Explore All Articles</span>
                    <span class="arrow-symbol">→</span>
                </a>
            </div>

            <div class="journal-grid">
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
                            <h3 class="article-title">
                                <a href="<?php echo esc_url(home_url('/journal/' . $art['slug'] . '/')); ?>">
                                    <?php echo esc_html($art['title']); ?>
                                </a>
                            </h3>
                            <p class="article-excerpt"><?php echo esc_html($art['excerpt']); ?></p>
                            <a href="<?php echo esc_url(home_url('/journal/' . $art['slug'] . '/')); ?>" class="article-read-more">
                                <span>Read Article</span>
                                <span class="arrow-symbol">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
