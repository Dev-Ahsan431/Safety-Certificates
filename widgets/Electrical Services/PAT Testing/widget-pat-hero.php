<?php
/**
 * Widget: PAT Testing – Hero Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_PAT_Hero extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-hero'; }
    public function get_title()      { return __( 'HTE – PAT: Hero', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-banner'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'hero', 'banner', 'testing', 'electrical' ]; }

    protected function register_controls() {

        /* ── Background ── */
        $this->start_controls_section( 'sec_bg', [
            'label' => __( 'Background Image', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'bg_image', [
                'label'   => __( 'Background Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=2070&auto=format&fit=crop' ],
            ] );

            $this->add_control( 'bg_image_alt', [
                'label'   => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Engineer performing PAT testing', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Badge ── */
        $this->start_controls_section( 'sec_badge', [
            'label' => __( 'Trust Badge', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( "London's #1 Compliance Partner", 'html-to-elementor' ),
            ] );

            $this->add_control( 'badge_stars', [
                'label'   => __( 'Number of Stars', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 5,
                'default' => 5,
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
                'default' => __( 'Fully Compliant', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted Part', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'PAT Testing', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_suffix', [
                'label'   => __( 'Heading – Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'in London with Same-Day Certificate', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Professional Portable Appliance Testing for landlords, offices, and businesses. Starting from just £59. Digital certificates issued within hours.', 'html-to-elementor' ),
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
                'default' => __( 'Book Your Test Now', 'html-to-elementor' ),
            ] );

            $this->add_control( 'btn_primary_link', [
                'label'   => __( 'Primary Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#booking' ],
            ] );

            $this->add_control( 'btn_secondary_text', [
                'label'   => __( 'Secondary Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Call An Expert', 'html-to-elementor' ),
            ] );

            $this->add_control( 'btn_secondary_link', [
                'label'   => __( 'Secondary Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:+442081455369' ],
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $p_target = ! empty( $s['btn_primary_link']['is_external'] )   ? ' target="_blank"' : '';
        $p_norel  = ! empty( $s['btn_primary_link']['nofollow'] )       ? ' rel="nofollow"'  : '';
        $s_target = ! empty( $s['btn_secondary_link']['is_external'] )  ? ' target="_blank"' : '';
        $s_norel  = ! empty( $s['btn_secondary_link']['nofollow'] )     ? ' rel="nofollow"'  : '';
        $stars    = max( 1, min( 5, intval( $s['badge_stars'] ) ) );
        ?>
        <section class="relative py-24 lg:py-32 overflow-hidden bg-navy">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <?php if ( ! empty( $s['bg_image']['url'] ) ) : ?>
                    <img src="<?php echo esc_url( $s['bg_image']['url'] ); ?>"
                         alt="<?php echo esc_attr( $s['bg_image_alt'] ); ?>"
                         class="w-full h-full object-cover opacity-20">
                <?php endif; ?>
                <div class="absolute inset-0 bg-gradient-to-r from-navy via-navy/90 to-transparent"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="max-w-3xl">

                    <!-- Trust Badge -->
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6">
                        <div class="flex text-orange">
                            <?php for ( $i = 0; $i < $stars; $i++ ) : ?>
                                <i data-lucide="star" class="w-3 h-3 fill-current"></i>
                            <?php endfor; ?>
                        </div>
                        <span class="text-sm font-medium text-white/90"><?php echo esc_html( $s['badge_text'] ); ?></span>
                    </div>

                    <!-- Heading -->
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-white mb-6 leading-tight">
                        <?php echo esc_html( $s['heading_plain'] ); ?>
                        <span class="text-electric"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                        <?php echo ' ' . esc_html( $s['heading_suffix'] ); ?>
                    </h1>

                    <!-- Sub-heading -->
                    <p class="text-xl text-white/70 mb-10 leading-relaxed"><?php echo esc_html( $s['subheading'] ); ?></p>

                    <!-- Buttons -->
                    <div class="flex flex-wrap gap-4">
                        <a href="<?php echo esc_url( $s['btn_primary_link']['url'] ); ?>"<?php echo $p_target . $p_norel; ?>
                           class="bg-orange hover:bg-orange/90 text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-2xl transition-all flex items-center gap-3">
                            <?php echo esc_html( $s['btn_primary_text'] ); ?>
                            <i data-lucide="arrow-right"></i>
                        </a>
                        <a href="<?php echo esc_url( $s['btn_secondary_link']['url'] ); ?>"<?php echo $s_target . $s_norel; ?>
                           class="bg-white/10 backdrop-blur-md text-white border border-white/20 px-10 py-5 rounded-2xl font-bold text-lg hover:bg-white/20 transition-all flex items-center gap-3">
                            <i data-lucide="phone"></i>
                            <?php echo esc_html( $s['btn_secondary_text'] ); ?>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}