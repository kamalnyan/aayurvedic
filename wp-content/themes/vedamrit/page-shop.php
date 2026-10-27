<?php
/**
 * Template Name: Shop Apothecary Catalog
 *
 * @package Vedamrit
 */

get_header();

$products   = vedamrit_get_products();
$categories = vedamrit_get_categories();
?>

<main id="main-content" class="site-main shop-page-main">
    <div class="vedamrit-container py-12">
        <!-- Shop Header -->
        <div class="shop-header-intro">
            <span class="subheading-pill">THE VEDAMRIT APOTHECARY</span>
            <h1 class="shop-title">Ayurvedic Botanical Essentials</h1>
            <p class="shop-subtitle">
                Formulations rooted in classical knowledge and purity. Filter by your constitution (Dosha), category, or botanical ingredients.
            </p>

            <!-- Category Filter Pills -->
            <div class="category-pills-bar">
                <button class="cat-pill-btn active" data-category="All">All Formulations (<?php echo count($products); ?>)</button>
                <?php foreach ($categories as $cat) : ?>
                    <button class="cat-pill-btn" data-category="<?php echo esc_attr($cat['name']); ?>">
                        <?php echo esc_html($cat['name']); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Action Control Bar -->
        <div class="shop-controls-bar">
            <div class="controls-left">
                <!-- Mobile Filter Trigger -->
                <button id="mobile-filter-open-btn" class="btn btn-outline btn-filter-mobile">
                    <span>⚙ Filter Catalog</span>
                </button>

                <!-- In-Page Herb Search -->
                <div class="search-input-wrap">
                    <input type="text" id="shop-live-filter-input" placeholder="Filter by herb or remedy..." class="shop-search-input">
                </div>

                <button id="shop-reset-filters-btn" class="reset-filters-link" style="display: none;">
                    ↺ Clear Filters
                </button>
            </div>

            <div class="controls-right">
                <span id="shop-results-count" class="results-count-text">Showing <?php echo count($products); ?> remedies</span>
                <div class="sort-wrap">
                    <label for="shop-sort-select">Sort by:</label>
                    <select id="shop-sort-select" class="shop-sort-select">
                        <option value="featured">Featured Curations</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="rating">Highest Rated</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Shop Layout: Sidebar + Grid -->
        <div class="shop-layout-grid">
            <!-- Desktop Sidebar Filter -->
            <aside class="shop-sidebar">
                <div class="sidebar-header">
                    <h3 class="sidebar-title">Filter Catalog</h3>
                    <button id="sidebar-clear-btn" class="clear-btn">Clear All</button>
                </div>

                <!-- Dosha Filter -->
                <div class="filter-group">
                    <h4 class="filter-title">Dosha Constitution</h4>
                    <div class="dosha-radio-group">
                        <label class="radio-label">
                            <input type="radio" name="dosha_filter" value="All" checked>
                            <span>All Doshas</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="dosha_filter" value="Vata">
                            <span>Vata Balancing</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="dosha_filter" value="Pitta">
                            <span>Pitta Balancing</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="dosha_filter" value="Kapha">
                            <span>Kapha Balancing</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="dosha_filter" value="Tridoshic">
                            <span>Tridoshic (All Three)</span>
                        </label>
                    </div>
                </div>

                <!-- Price Range Filter -->
                <div class="filter-group">
                    <div class="price-header">
                        <h4 class="filter-title">Max Price</h4>
                        <span id="price-slider-val" class="price-val-display">₹1500</span>
                    </div>
                    <input type="range" id="shop-price-slider" min="300" max="1500" step="50" value="1500" class="range-slider">
                    <div class="range-extremes">
                        <span>₹300</span>
                        <span>₹1500</span>
                    </div>
                </div>

                <!-- Quality Standards Pledge -->
                <div class="sidebar-quality-box">
                    <strong>Vedamrit Standard:</strong>
                    <p>✓ Sustainably harvested herbs</p>
                    <p>✓ Heavy-metal lab tested</p>
                    <p>✓ 100% vegetarian capsule shells</p>
                </div>
            </aside>

            <!-- Products Catalog Grid -->
            <div class="shop-products-col">
                <div id="shop-catalog-grid" class="products-grid">
                    <?php foreach ($products as $prod) : 
                        $discount = $prod['original_price'] ? round((($prod['original_price'] - $prod['price']) / $prod['original_price']) * 100) : 0;
                    ?>
                        <div class="product-card" 
                             data-product-id="<?php echo esc_attr($prod['id']); ?>" 
                             data-category="<?php echo esc_attr($prod['category']); ?>" 
                             data-dosha="<?php echo esc_attr($prod['dosha']); ?>" 
                             data-price="<?php echo esc_attr($prod['price']); ?>" 
                             data-rating="<?php echo esc_attr($prod['rating']); ?>" 
                             data-name="<?php echo esc_attr(strtolower($prod['name'])); ?>">
                            
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

                <!-- Empty State Message -->
                <div id="shop-no-results" class="no-results-card" style="display: none;">
                    <h3 class="no-results-title">No remedies match your current filters</h3>
                    <p class="no-results-desc">Try widening your price range or switching your Dosha selection.</p>
                    <button id="empty-state-reset-btn" class="btn btn-primary">Clear All Filters</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
