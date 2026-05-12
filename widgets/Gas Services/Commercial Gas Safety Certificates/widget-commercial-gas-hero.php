<?php
/**
 * Widget: Commercial Gas Safety – Hero Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Commercial_Gas_Hero extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-commercial-gas-hero'; }
    public function get_title()      { return __( 'HTE – Commercial Gas: Hero', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-banner'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'commercial', 'gas', 'hero', 'banner', 'cp42', 'cp17', 'safety', 'commercial gas hero' ]; }

    protected function register_controls() {

        /* ── Badge ── */
        $this->start_controls_section( 'sec_badge', [
            'label' => __( 'Trust Badge', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Certified Commercial Gas Engineers', 'html-to-elementor' ),
            ] );
        $this->end_controls_section();

        /* ── Heading ── */
        $this->start_controls_section( 'sec_heading', [
            'label' => __( 'Heading', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'heading_plain', [
                'label'   => __( 'Heading – Plain Part', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Commercial',
            ] );
            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Gradient Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Gas Safety Certificate',
            ] );
            $this->add_control( 'heading_suffix', [
                'label'   => __( 'Heading – Suffix (price etc.)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'London at £199.99',
            ] );
            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Professional Gas Safety Certificates (CP42 & CP17) for restaurants, hotels, offices, and commercial kitchens by Gas Safe engineers.', 'html-to-elementor' ),
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
                'default' => __( 'Book Inspection', 'html-to-elementor' ),
            ] );
            $this->add_control( 'btn_primary_link', [
                'label'   => __( 'Primary Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#pricing' ],
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

        /* ── Trust Tags ── */
        $this->start_controls_section( 'sec_tags', [
            'label' => __( 'Trust Tags', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'tag_icon', [
                'label'   => __( 'Lucide Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'shield-check',
            ] );
            $rep->add_control( 'tag_icon_color', [
                'label'   => __( 'Icon Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-safety',
            ] );
            $rep->add_control( 'tag_text', [
                'label'   => __( 'Tag Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'COCN1 Qualified Engineers',
            ] );
            $this->add_control( 'trust_tags', [
                'label'       => __( 'Trust Tags', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $rep->get_controls(),
                'default'     => [
                    [ 'tag_icon' => 'shield-check', 'tag_icon_color' => 'text-safety',   'tag_text' => 'COCN1 Qualified Engineers' ],
                    [ 'tag_icon' => 'zap',          'tag_icon_color' => 'text-electric', 'tag_text' => 'Fast 24h Digital Certificate' ],
                ],
                'title_field' => '{{{ tag_text }}}',
            ] );
        $this->end_controls_section();

        /* ── Image Panel ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Image Panel', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'hero_image', [
                'label'   => __( 'Hero Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&q=80&w=1200' ],
            ] );
            $this->add_control( 'hero_image_alt', [
                'label'   => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Commercial Gas Inspection',
            ] );
            $this->add_control( 'rating_label', [
                'label'   => __( 'Rating Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '5.0 Client Rating',
            ] );
            $this->add_control( 'rating_sublabel', [
                'label'   => __( 'Rating Sub-label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Professional & Fast',
            ] );
            $this->add_control( 'rating_stars', [
                'label'   => __( 'Number of Stars', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1, 'max' => 5,
                'default' => 5,
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s        = $this->get_settings_for_display();
        $p_target = ! empty( $s['btn_primary_link']['is_external'] )  ? ' target="_blank"' : '';
        $p_norel  = ! empty( $s['btn_primary_link']['nofollow'] )      ? ' rel="nofollow"'  : '';
        $s_target = ! empty( $s['btn_secondary_link']['is_external'] ) ? ' target="_blank"' : '';
        $s_norel  = ! empty( $s['btn_secondary_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        $stars    = max( 1, min( 5, intval( $s['rating_stars'] ) ) );
        ?>
        <section class="relative bg-navy text-white py-24 overflow-hidden">
            <!-- Ambient blobs -->
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <div class="absolute top-0 right-0 w-96 h-96 bg-electric rounded-full blur-[100px] animate-pulse"></div>
                <div class="absolute bottom-0 left-0 w-96 h-96 bg-safety rounded-full blur-[100px] animate-pulse"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 items-center text-center lg:text-left">

                    <!-- Left: Text -->
                    <div>
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6">
                            <span class="flex h-2 w-2 rounded-full bg-safety animate-pulse"></span>
                            <span class="text-sm font-medium text-white/90 uppercase tracking-widest"><?php echo esc_html( $s['badge_text'] ); ?></span>
                        </div>

                        <!-- Heading -->
                        <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-6">
                            <?php echo esc_html( $s['heading_plain'] ); ?>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-electric to-safety"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                            <?php echo ' ' . esc_html( $s['heading_suffix'] ); ?>
                        </h1>

                        <!-- Subheading -->
                        <p class="text-xl text-white/80 mb-8 max-w-xl leading-relaxed mx-auto lg:mx-0"><?php echo esc_html( $s['subheading'] ); ?></p>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <a href="<?php echo esc_url( $s['btn_primary_link']['url'] ); ?>"<?php echo $p_target . $p_norel; ?>
                               class="bg-orange hover:bg-orange/90 text-white px-8 py-4 rounded-full font-bold text-lg transition-all shadow-lg flex items-center justify-center gap-2">
                                <?php echo esc_html( $s['btn_primary_text'] ); ?>
                                <i data-lucide="arrow-right" class="w-5 h-5"></i>
                            </a>
                            <a href="<?php echo esc_url( $s['btn_secondary_link']['url'] ); ?>"<?php echo $s_target . $s_norel; ?>
                               class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-8 py-4 rounded-full font-bold text-lg transition-all flex items-center justify-center gap-2 backdrop-blur-sm">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                                <?php echo esc_html( $s['btn_secondary_text'] ); ?>
                            </a>
                        </div>

                        <!-- Trust Tags -->
                        <div class="flex flex-wrap items-center justify-center lg:justify-start gap-6 text-sm font-medium text-white/70 mt-10">
                            <?php foreach ( $s['trust_tags'] as $tag ) : ?>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="<?php echo esc_attr( $tag['tag_icon'] ); ?>" class="<?php echo esc_attr( $tag['tag_icon_color'] ); ?>"></i>
                                    <?php echo esc_html( $tag['tag_text'] ); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Right: Image + Rating Card -->
                    <div class="relative hidden lg:block">
                        <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10">
                            <?php if ( ! empty( $s['hero_image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $s['hero_image']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $s['hero_image_alt'] ); ?>"
                                     class="w-full h-auto">
                            <?php endif; ?>
                        </div>

                        <!-- Rating Floating Card -->
                        <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-2xl shadow-2xl text-navy z-20 font-bold">
                            <div class="flex items-center gap-1 text-orange mb-2">
                                <?php for ( $i = 0; $i < $stars; $i++ ) : ?>
                                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <?php endfor; ?>
                            </div>
                            <p><?php echo esc_html( $s['rating_label'] ); ?></p>
                            <p class="text-sm text-navy/60 font-medium"><?php echo esc_html( $s['rating_sublabel'] ); ?></p>
                        </div>

                        <!-- Decorative blur circles -->
                        <div class="absolute -top-20 -left-20 w-64 h-64 bg-safety/20 rounded-full blur-[100px] pointer-events-none"></div>
                        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-orange/20 rounded-full blur-[100px] pointer-events-none"></div>
                    </div>

                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 hidden lg:flex flex-col items-center gap-2 opacity-30 animate-pulse pointer-events-none">
                <span class="text-[10px] font-bold uppercase tracking-[0.3em]">Services</span>
                <div class="w-px h-12 bg-white"></div>
            </div>
        </section>
        <?php
    }
}