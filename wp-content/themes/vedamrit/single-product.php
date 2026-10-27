<?php
/**
 * Single Product Template for VEDAMRIT Theme
 *
 * @package Vedamrit
 */

get_header();

$all_products = vedamrit_get_products();
$current_slug = get_query_var('product_slug', '');

// Match product by slug or default to first product (Amla Capsules)
$product = null;
if (!empty($current_slug)) {
    foreach ($all_products as $p) {
        if ($p['slug'] === $current_slug) {
            $product = $p;
            break;
        }
    }
}
if (!$product) {
    // Default to Amla Capsules for demo if not specified
    $product = $all_products[0];
}

$discount = $product['original_price'] ? round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) : 0;
$related  = array_slice($all_products, 1, 3);
?>

<main id="main-content" class="site-main product-detail-main">
    <div class="vedamrit-container py-12">
        <!-- Breadcrumbs -->
        <nav class="breadcrumb-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <span>/</span>
            <a href="<?php echo esc_url(home_url('/shop/')); ?>">Shop</a>
            <span>/</span>
            <a href="<?php echo esc_url(home_url('/shop/?category=' . urlencode($product['category_slug']))); ?>">
                <?php echo esc_html($product['category']); ?>
            </a>
            <span>/</span>
            <span class="active-crumb"><?php echo esc_html($product['name']); ?></span>
        </nav>

        <!-- Product Hero Card -->
        <div class="product-detail-card" data-product-id="<?php echo esc_attr($product['id']); ?>">
            <div class="product-detail-grid">
                <!-- Left: Multi-Image Gallery -->
                <div class="detail-gallery-col">
                    <div class="main-gallery-view">
                        <img id="detail-main-img" src="<?php echo esc_url($product['images'][0]); ?>" alt="<?php echo esc_attr($product['name']); ?>">
                        <div class="detail-badges-overlay">
                            <span class="badge-dosha-detail"><?php echo esc_html($product['dosha']); ?> Balance</span>
                            <?php if ($discount > 0) : ?>
                                <span class="badge-discount-detail"><?php echo esc_html($discount); ?>% OFF</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (count($product['images']) > 1) : ?>
                        <div class="gallery-thumbs-row">
                            <?php foreach ($product['images'] as $idx => $img) : ?>
                                <button class="thumb-btn <?php echo $idx === 0 ? 'active' : ''; ?>" data-img-src="<?php echo esc_url($img); ?>">
                                    <img src="<?php echo esc_url($img); ?>" alt="Thumbnail <?php echo $idx + 1; ?>">
                                </button>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="ethical-harvest-pledge">
                        <span class="pledge-icon">🌿</span>
                        <div class="pledge-text">
                            <strong>Ethical Indian Harvest:</strong>
                            <span>Sustainably foraged and organically farmed with full batch traceability.</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Purchasing & Botanical Info -->
                <div class="detail-info-col">
                    <span class="detail-category"><?php echo esc_html($product['category']); ?></span>
                    <h1 class="detail-title"><?php echo esc_html($product['name']); ?></h1>

                    <?php if (!empty($product['sanskrit_name'])) : ?>
                        <p class="detail-sanskrit">Classical Name: <?php echo esc_html($product['sanskrit_name']); ?></p>
                    <?php endif; ?>

                    <div class="detail-rating-row">
                        <span class="star-icon">★★★★★</span>
                        <strong class="rating-num"><?php echo esc_html($product['rating']); ?></strong>
                        <span class="rating-reviews">(<?php echo esc_html($product['review_count']); ?> verified customer reviews)</span>
                        <span class="stock-status-pill">Ready to Dispatch</span>
                    </div>

                    <div class="detail-price-box">
                        <span class="price-amount">₹<?php echo esc_html($product['price']); ?></span>
                        <?php if (!empty($product['original_price'])) : ?>
                            <span class="price-strikethrough">₹<?php echo esc_html($product['original_price']); ?></span>
                        <?php endif; ?>
                        <span class="price-tax-note">(Inclusive of all taxes)</span>
                    </div>

                    <p class="detail-description"><?php echo esc_html($product['description']); ?></p>

                    <!-- Key Benefits -->
                    <div class="detail-benefits-list">
                        <?php foreach ($product['benefits'] as $b) : ?>
                            <div class="benefit-item">
                                <span class="check-icon">✓</span>
                                <span><?php echo esc_html($b); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Size Selector -->
                    <?php if (!empty($product['sizes'])) : ?>
                        <div class="size-selector-area">
                            <label class="size-label">Select Size / Volume:</label>
                            <div class="size-options-row">
                                <?php foreach ($product['sizes'] as $i => $sz) : ?>
                                    <button class="size-opt-btn <?php echo $i === 0 ? 'active' : ''; ?>" data-size="<?php echo esc_attr($sz); ?>">
                                        <?php echo esc_html($sz); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Action Controls -->
                    <div class="detail-actions-area">
                        <div class="quantity-stepper">
                            <button id="qty-minus" class="qty-btn" aria-label="Decrease quantity">-</button>
                            <span id="qty-val" class="qty-val">1</span>
                            <button id="qty-plus" class="qty-btn" aria-label="Increase quantity">+</button>
                        </div>

                        <button id="detail-add-to-cart-btn" class="btn btn-primary btn-large add-to-cart-main-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="btn-icon-svg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                            <span id="detail-add-btn-text">Add to Bag (₹<?php echo esc_html($product['price']); ?>)</span>
                        </button>
                    </div>

                    <button id="detail-buy-now-btn" class="btn btn-outline btn-block buy-now-btn">
                        ⚡ Instant Checkout
                    </button>

                    <div class="detail-perks-row">
                        <span>🚚 Free Delivery over ₹999</span>
                        <span>•</span>
                        <span>🛡️ 30-Day Purity Guarantee</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deep-Dive Botanical Accordions -->
        <div class="detail-accordions-card">
            <h2 class="accordions-main-title">Detailed Botanical Insights & Usage</h2>

            <!-- Heritage -->
            <div class="accordion-item active">
                <button class="accordion-trigger">
                    <span>Classical Ayurvedic Heritage</span>
                    <span class="chevron">▼</span>
                </button>
                <div class="accordion-panel">
                    <p><?php echo esc_html($product['description']); ?></p>
                    <div class="dosha-panel-highlight">
                        <strong>Dosha Energetics:</strong>
                        This formula is formulated primarily for <strong><?php echo esc_html($product['dosha']); ?></strong> balancing. In Ayurveda, maintaining balance in your governing dosha creates the foundation for long-lasting vitality.
                    </div>
                </div>
            </div>

            <!-- Key Botanicals & Full Ingredients -->
            <div class="accordion-item">
                <button class="accordion-trigger">
                    <span>Key Botanical Ingredients & Sourcing</span>
                    <span class="chevron">▼</span>
                </button>
                <div class="accordion-panel">
                    <div class="botanical-cards-grid">
                        <?php foreach ($product['key_ingredients'] as $k) : ?>
                            <div class="botanical-micro-card">
                                <div class="micro-header">
                                    <strong><?php echo esc_html($k['name']); ?></strong>
                                    <em><?php echo esc_html($k['sanskrit']); ?></em>
                                </div>
                                <p><?php echo esc_html($k['purpose']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="full-ingredients-box">
                        <strong>Complete Ingredient Transparency:</strong>
                        <p><?php echo esc_html($product['full_ingredients']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Suggested Ritual / Directions -->
            <div class="accordion-item">
                <button class="accordion-trigger">
                    <span>How to Use & Suggested Ritual (Dinacharya)</span>
                    <span class="chevron">▼</span>
                </button>
                <div class="accordion-panel">
                    <ul class="ritual-steps-list">
                        <?php foreach ($product['directions'] as $d) : ?>
                            <li><?php echo esc_html($d); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Safety & Medical Advisory -->
            <div class="accordion-item">
                <button class="accordion-trigger">
                    <span>Safety Precautions & Medical Advisory</span>
                    <span class="chevron">▼</span>
                </button>
                <div class="accordion-panel">
                    <div class="advisory-alert-box">
                        <strong>🌿 Important Health Guidance:</strong>
                        <p>
                            Ayurvedic herbs are natural dietary supplements and botanical body care essentials. They are not intended to diagnose, treat, cure, or prevent any medical disease. If you are pregnant, lactating, or taking pharmaceuticals, consult a qualified practitioner.
                        </p>
                    </div>
                    <ul class="safety-points-list">
                        <?php foreach ($product['safety_precautions'] as $sp) : ?>
                            <li><?php echo esc_html($sp); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Shipping Timelines -->
            <div class="accordion-item">
                <button class="accordion-trigger">
                    <span>Shipping & Delivery Timelines</span>
                    <span class="chevron">▼</span>
                </button>
                <div class="accordion-panel">
                    <p>• <strong>Complimentary Shipping:</strong> Automatically applied at checkout on all orders exceeding ₹999 within India.</p>
                    <p>• <strong>Standard Shipping:</strong> ₹99 flat rate for orders below ₹999.</p>
                    <p>• <strong>Dispatch Schedule:</strong> Packed in biodegradable packaging and dispatched within 24 to 48 hours from Rishikesh, Uttarakhand.</p>
                    <p>• <strong>Delivery Timeframe:</strong> 3 to 5 business days for major Indian metros; 5 to 7 days for regional districts.</p>
                </div>
            </div>
        </div>

        <!-- FAQs Accordion -->
        <?php if (!empty($product['faqs'])) : ?>
            <div class="detail-faqs-card">
                <h3 class="faqs-title">Frequently Asked Questions</h3>
                <div class="faqs-list">
                    <?php foreach ($product['faqs'] as $faq) : ?>
                        <div class="faq-accordion-item">
                            <button class="faq-trigger">
                                <span><?php echo esc_html($faq['question']); ?></span>
                                <span class="chevron">▼</span>
                            </button>
                            <div class="faq-panel">
                                <p><?php echo esc_html($faq['answer']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Related Remedies -->
        <div class="related-remedies-section">
            <h3 class="related-title">Complementary Formulations</h3>
            <div class="products-grid">
                <?php foreach ($related as $rel) : ?>
                    <div class="product-card" data-product-id="<?php echo esc_attr($rel['id']); ?>">
                        <div class="product-image-container">
                            <a href="<?php echo esc_url(home_url('/shop/' . $rel['slug'] . '/')); ?>">
                                <img src="<?php echo esc_url($rel['images'][0]); ?>" alt="<?php echo esc_attr($rel['name']); ?>" loading="lazy">
                            </a>
                            <span class="badge-dosha"><?php echo esc_html($rel['dosha']); ?></span>
                        </div>
                        <div class="product-card-body">
                            <h4 class="product-title">
                                <a href="<?php echo esc_url(home_url('/shop/' . $rel['slug'] . '/')); ?>">
                                    <?php echo esc_html($rel['name']); ?>
                                </a>
                            </h4>
                            <div class="product-price-action-row">
                                <span class="current-price">₹<?php echo esc_html($rel['price']); ?></span>
                                <button class="btn btn-cart add-to-cart-btn" data-product-id="<?php echo esc_attr($rel['id']); ?>">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
