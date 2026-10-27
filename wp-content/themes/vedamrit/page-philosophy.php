<?php
/**
 * Template Name: Our Philosophy
 *
 * @package Vedamrit
 */

get_header();
?>

<main id="main-content" class="site-main philosophy-page-main">
    <!-- Hero Banner -->
    <section class="philosophy-page-hero">
        <div class="vedamrit-container">
            <span class="subheading-pill light-pill">THE VEDAMRIT FOUNDATION</span>
            <h1 class="page-hero-title">
                Rooted in Nature. <br>
                <span class="headline-light">Guided by Ayurveda.</span>
            </h1>
            <p class="page-hero-subtitle">
                We exist to make the timeless wisdom of classical Indian wellness accessible, transparent, and effortlessly compatible with modern living.
            </p>
        </div>
    </section>

    <!-- Origin Story -->
    <section class="philosophy-origin-section">
        <div class="vedamrit-container">
            <div class="origin-grid">
                <div class="origin-text-col">
                    <span class="subheading-pill">OUR ORIGIN</span>
                    <h2 class="section-title">Restoring the Living Soul of Indian Botanical Medicine</h2>
                    <p class="origin-p">
                        Ayurveda is not a primitive folklore; it is one of the world’s most sophisticated systems of preventative lifestyle medicine. For more than five millennia, Vedic physicians observed how natural cycles, elemental forces, and botanicals influence human vitality.
                    </p>
                    <p class="origin-p">
                        However, in recent decades, many commercial products reduced this rich heritage to chemical isolates, artificial dyes, and mass-manufactured shortcuts. VEDAMRIT was founded to reclaim the authentic path: honoring classical preparation methods like <em>Sneha Pak Vidhi</em> (slow oil decoction) while enforcing contemporary standards of purity and transparency.
                    </p>
                </div>
                <div class="origin-image-col">
                    <div class="origin-img-card">
                        <img src="https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&q=80&w=1000" alt="Ayurvedic herbs and apothecary bottles" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The 3 Doshas -->
    <section class="philosophy-doshas-section">
        <div class="vedamrit-container">
            <div class="section-header-center">
                <span class="subheading-pill">BIO-ENERGETIC HARMONY</span>
                <h2 class="section-title">The Three Doshas: Nature Within Us</h2>
                <p class="section-subtitle">
                    According to Ayurveda, every person carries a distinct elemental constitution. When our governing energies are in balance, vibrant wellness flows naturally.
                </p>
            </div>

            <div class="dosha-cards-grid">
                <!-- VATA -->
                <div class="dosha-card">
                    <span class="dosha-elements-pill">Air & Space</span>
                    <h3 class="dosha-card-title">Vata (Motion)</h3>
                    <p class="dosha-governs">Governs breathing, nervous impulses, and circulation.</p>
                    <p class="dosha-char"><strong>Characteristics:</strong> Quick-minded, creative, light, prone to dry skin and restless thoughts when elevated.</p>
                    <div class="dosha-balance-box">
                        <strong>Balancing Remedies:</strong> Warming Ashwagandha, nourishing sesame oil massage (Abhyanga), and grounding warm cooked foods.
                    </div>
                    <a href="<?php echo esc_url(home_url('/shop/?dosha=Vata')); ?>" class="dosha-shop-link">
                        <span>Explore Vata Balancers</span> →
                    </a>
                </div>

                <!-- PITTA -->
                <div class="dosha-card">
                    <span class="dosha-elements-pill">Fire & Water</span>
                    <h3 class="dosha-card-title">Pitta (Metabolism)</h3>
                    <p class="dosha-governs">Governs digestion, enzyme transformation, and intellect.</p>
                    <p class="dosha-char"><strong>Characteristics:</strong> Sharp, ambitious, warm, prone to acidity, skin flare-ups, and irritability when aggravated.</p>
                    <div class="dosha-balance-box">
                        <strong>Balancing Remedies:</strong> Cooling Aloe Vera, bitter wild Neem, cooling vetiver hydrosols, and calming Kannauj rose water.
                    </div>
                    <a href="<?php echo esc_url(home_url('/shop/?dosha=Pitta')); ?>" class="dosha-shop-link">
                        <span>Explore Pitta Balancers</span> →
                    </a>
                </div>

                <!-- KAPHA -->
                <div class="dosha-card">
                    <span class="dosha-elements-pill">Earth & Water</span>
                    <h3 class="dosha-card-title">Kapha (Structure)</h3>
                    <p class="dosha-governs">Governs bodily strength, cellular lubrication, and immunity.</p>
                    <p class="dosha-char"><strong>Characteristics:</strong> Patient, deeply nurturing, strong stamina, prone to lethargy, sinus congestion, and fluid retention.</p>
                    <div class="dosha-balance-box">
                        <strong>Balancing Remedies:</strong> Warming Holy Basil (Tulsi), invigorating Triphala churna, and daily dynamic movement.
                    </div>
                    <a href="<?php echo esc_url(home_url('/shop/?dosha=Kapha')); ?>" class="dosha-shop-link">
                        <span>Explore Kapha Balancers</span> →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Standards of Integrity -->
    <section id="quality" class="philosophy-standards-section">
        <div class="vedamrit-container">
            <div class="section-header-center">
                <span class="subheading-pill">THE VEDAMRIT PROMISE</span>
                <h2 class="section-title">Our Four Standards of Integrity</h2>
            </div>

            <div class="standards-grid">
                <div class="standard-card">
                    <div class="standard-icon">💧</div>
                    <h3 class="standard-title">Whole Herb Synergy</h3>
                    <p class="standard-desc">We avoid harsh chemical solvents. We prioritize full-spectrum botanicals where nature’s protective co-factors remain intact for gentle digestion.</p>
                </div>
                <div class="standard-card">
                    <div class="standard-icon">☀️</div>
                    <h3 class="standard-title">Ethical Sourcing</h3>
                    <p class="standard-desc">Direct partnerships with certified organic farms and forest tribals in native micro-climates, guaranteeing fair trade compensation.</p>
                </div>
                <div class="standard-card">
                    <div class="standard-icon">🛡️</div>
                    <h3 class="standard-title">Rigorous Testing</h3>
                    <p class="standard-desc">Every harvest batch undergoes third-party ICP-MS heavy metal testing (lead, arsenic, mercury, cadmium) and microbial safety screening.</p>
                </div>
                <div class="standard-card">
                    <div class="standard-icon">🌿</div>
                    <h3 class="standard-title">Conscious Packaging</h3>
                    <p class="standard-desc">Recyclable UV-protective amber glass containers that preserve phytochemical potency without leaching plastic phthalates.</p>
                </div>
            </div>

            <div class="section-footer-center">
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="btn btn-primary btn-large">
                    <span>Explore the Apothecary</span>
                    <span class="arrow-symbol">→</span>
                </a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
