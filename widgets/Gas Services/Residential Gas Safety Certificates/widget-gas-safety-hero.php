<?php
/**
 * Widget: Gas Safety – Hero Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Hero extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-hero'; }
    public function get_title()      { return __( 'HTE – Gas Safety Hero', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-banner'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'hero', 'banner', 'gas', 'safety', 'cp12' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Badge ── */
        $this->start_controls_section( 'sec_badge', [
            'label' => __( 'Trust Badge', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( "London's Most Trusted Gas Safety Partner", 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Heading ── */
        $this->start_controls_section( 'sec_heading', [
            'label' => __( 'Heading', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_plain', [
                'label'   => __( 'Heading – Plain Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Certified', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Gradient Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Gas Safety Certificate', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_suffix', [
                'label'   => __( 'Heading – Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'London', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Description ── */
        $this->start_controls_section( 'sec_description', [
            'label' => __( 'Description', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'desc_plain', [
                'label'   => __( 'Description Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Professional CP12 inspections from', 'html-to-elementor' ),
            ] );

            $this->add_control( 'desc_price', [
                'label'   => __( 'Starting Price', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£57.99',
            ] );

            $this->add_control( 'desc_suffix', [
                'label'   => __( 'Description Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Gas Safe registered engineers, same-day appointments, and instant digital certificates.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Feature Badges ── */
        $this->start_controls_section( 'sec_features', [
            'label' => __( 'Feature Badges', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'feature_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'check',
            ] );

            $repeater->add_control( 'feature_label', [
                'label'   => __( 'Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Gas Safe Registered', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'feature_icon_color_class', [
                'label'       => __( 'Icon Color Class', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'Tailwind color class e.g. text-safety, text-electric, text-orange', 'html-to-elementor' ),
                'default'     => 'text-safety',
            ] );

            $repeater->add_control( 'feature_bg_class', [
                'label'   => __( 'Icon BG Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'bg-safety/20',
            ] );

            $this->add_control( 'features', [
                'label'       => __( 'Features', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'feature_icon' => 'check',   'feature_label' => 'Gas Safe Registered',    'feature_icon_color_class' => 'text-safety',   'feature_bg_class' => 'bg-safety/20' ],
                    [ 'feature_icon' => 'clock',   'feature_label' => 'Fast Appointments',       'feature_icon_color_class' => 'text-electric', 'feature_bg_class' => 'bg-electric/20' ],
                    [ 'feature_icon' => 'mail',    'feature_label' => 'Instant Digital Cert',    'feature_icon_color_class' => 'text-orange',   'feature_bg_class' => 'bg-orange/20' ],
                ],
                'title_field' => '{{{ feature_label }}}',
            ] );

        $this->end_controls_section();

        /* ── Buttons ── */
        $this->start_controls_section( 'sec_buttons', [
            'label' => __( 'Buttons', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'btn_primary_text', [
                'label'   => __( 'Primary Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book Now', 'html-to-elementor' ),
            ] );

            $this->add_control( 'btn_primary_link', [
                'label'   => __( 'Primary Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:02081455369' ],
            ] );

            $this->add_control( 'btn_secondary_text', [
                'label'   => __( 'Secondary Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '020 8145 5369',
            ] );

            $this->add_control( 'btn_secondary_link', [
                'label'   => __( 'Secondary Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:02081455369' ],
            ] );

        $this->end_controls_section();

        /* ── Trust Line ── */
        $this->start_controls_section( 'sec_trust', [
            'label' => __( 'Trust Line', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'trust_rating', [
                'label'   => __( 'Rating Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Trustpilot 4.9/5', 'html-to-elementor' ),
            ] );

            $this->add_control( 'trust_item_2', [
                'label'   => __( 'Trust Item 2', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Limited Time Offer', 'html-to-elementor' ),
            ] );

            $this->add_control( 'trust_item_3', [
                'label'   => __( 'Trust Item 3', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'No Hidden Costs', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Image Panel ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Hero Image', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'hero_image', [
                'label'   => __( 'Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&q=80&w=1000' ],
            ] );

            $this->add_control( 'image_badge_label', [
                'label'   => __( 'Image Badge Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Official Status', 'html-to-elementor' ),
            ] );

            $this->add_control( 'image_badge_value', [
                'label'   => __( 'Image Badge Value', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Gas Safe Registered', 'html-to-elementor' ),
            ] );

            $this->add_control( 'price_tag_label', [
                'label'   => __( 'Price Tag Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Starting From', 'html-to-elementor' ),
            ] );

            $this->add_control( 'price_tag_value', [
                'label'   => __( 'Price Tag Value', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£57',
            ] );

            $this->add_control( 'price_tag_decimal', [
                'label'   => __( 'Price Tag Decimal', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '.99',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();

        $primary_target  = ! empty( $s['btn_primary_link']['is_external'] )  ? ' target="_blank"' : '';
        $primary_norel   = ! empty( $s['btn_primary_link']['nofollow'] )      ? ' rel="nofollow"'  : '';
        $secondary_target = ! empty( $s['btn_secondary_link']['is_external'] ) ? ' target="_blank"' : '';
        $secondary_norel  = ! empty( $s['btn_secondary_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        ?>
        <section class="section-hero relative pt-32 pb-20 lg:pt-48 lg:pb-40 overflow-hidden bg-navy text-white">
            <div class="absolute inset-0 z-0 opacity-30">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-electric rounded-full mix-blend-screen filter blur-[120px] animate-pulse"></div>
                <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-safety rounded-full mix-blend-screen filter blur-[120px] animate-pulse" style="animation-delay: 2s"></div>
            </div>
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6">
                            <span class="flex h-2 w-2 rounded-full bg-safety animate-ping"></span>
                            <span class="text-sm font-medium text-white/90"><?php echo esc_html( $s['badge_text'] ); ?></span>
                        </div>

                        <!-- Heading -->
                        <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-6 font-heading">
                            <?php echo esc_html( $s['heading_plain'] ); ?>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-electric to-safety"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                            <?php echo ' ' . esc_html( $s['heading_suffix'] ); ?>
                        </h1>

                        <!-- Description -->
                        <p class="text-xl text-white/80 mb-8 max-w-xl leading-relaxed">
                            <?php echo esc_html( $s['desc_plain'] ); ?>
                            <span class="text-white font-bold text-2xl"><?php echo esc_html( $s['desc_price'] ); ?></span>.
                            <?php echo esc_html( $s['desc_suffix'] ); ?>
                        </p>

                        <!-- Feature Badges -->
                        <div class="grid sm:grid-cols-3 gap-6 mb-10">
                            <?php foreach ( $s['features'] as $feature ) : ?>
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full <?php echo esc_attr( $feature['feature_bg_class'] ); ?> flex items-center justify-center <?php echo esc_attr( $feature['feature_icon_color_class'] ); ?> shrink-0">
                                        <i data-lucide="<?php echo esc_attr( $feature['feature_icon'] ); ?>" class="w-5 h-5"></i>
                                    </div>
                                    <span class="text-sm font-medium"><?php echo esc_html( $feature['feature_label'] ); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-5 mb-10">
                            <a href="<?php echo esc_url( $s['btn_primary_link']['url'] ); ?>"<?php echo $primary_target . $primary_norel; ?>
                               class="bg-orange hover:bg-orange/90 text-white px-10 py-5 rounded-2xl font-bold text-xl transition-all transform hover:scale-105 shadow-[0_0_30px_rgba(255,122,0,0.4)] flex items-center justify-center gap-3">
                                <?php echo esc_html( $s['btn_primary_text'] ); ?> <i data-lucide="arrow-right" class="w-6 h-6"></i>
                            </a>
                            <a href="<?php echo esc_url( $s['btn_secondary_link']['url'] ); ?>"<?php echo $secondary_target . $secondary_norel; ?>
                               class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-10 py-5 rounded-2xl font-bold text-xl transition-all flex items-center justify-center gap-3 backdrop-blur-md">
                                <i data-lucide="phone" class="w-6 h-6"></i> <?php echo esc_html( $s['btn_secondary_text'] ); ?>
                            </a>
                        </div>

                        <!-- Trust Line -->
                        <div class="flex items-center gap-4 text-sm font-medium text-white/50">
                            <span class="flex items-center gap-1"><i data-lucide="star" class="w-4 h-4 fill-orange text-orange"></i> <?php echo esc_html( $s['trust_rating'] ); ?></span>
                            <span class="w-1 h-1 rounded-full bg-white/20"></span>
                            <span><?php echo esc_html( $s['trust_item_2'] ); ?></span>
                            <span class="w-1 h-1 rounded-full bg-white/20"></span>
                            <span><?php echo esc_html( $s['trust_item_3'] ); ?></span>
                        </div>
                    </div>

                    <!-- Image Panel -->
                    <div class="relative lg:ml-auto w-full max-w-xl group">
                        <div class="aspect-[4/5] rounded-[3rem] overflow-hidden shadow-2xl relative border-8 border-white/10 group-hover:border-electric/20 transition-all duration-700">
                            <?php if ( ! empty( $s['hero_image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $s['hero_image']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $s['image_badge_value'] ); ?>"
                                     class="w-full h-full object-cover scale-110 group-hover:scale-100 transition-all duration-1000" />
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-navy/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-10 left-10 right-10">
                                <div class="flex items-center gap-4 text-white">
                                    <div class="w-16 h-16 rounded-2xl bg-safety flex items-center justify-center shadow-lg">
                                        <i data-lucide="shield-check" class="w-8 h-8"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold uppercase tracking-widest text-white/60 mb-1"><?php echo esc_html( $s['image_badge_label'] ); ?></p>
                                        <p class="text-2xl font-bold font-heading"><?php echo esc_html( $s['image_badge_value'] ); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Price Tag -->
                        <div class="absolute -top-10 -right-10 bg-white p-6 rounded-3xl shadow-2xl z-20 border border-gray-100 hidden sm:block transform rotate-6 hover:rotate-0 transition-transform">
                            <p class="text-xs font-bold text-navy/40 uppercase tracking-widest mb-2"><?php echo esc_html( $s['price_tag_label'] ); ?></p>
                            <p class="text-4xl font-bold text-electric font-heading"><?php echo esc_html( $s['price_tag_value'] ); ?><span class="text-xl"><?php echo esc_html( $s['price_tag_decimal'] ); ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}