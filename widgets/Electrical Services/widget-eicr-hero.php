<?php
/**
 * Widget: EICR Hero
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Eicr_Hero extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-eicr-hero'; }
    public function get_title()      { return __( 'HTE – EICR Hero', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-banner'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'hero', 'eicr', 'banner', 'eicr' ]; }

    protected function register_controls() {

        /* ── Badge ─────────────────────────────────────────────────── */
        $this->start_controls_section( 'sec_badge', [
            'label' => __( 'Badge', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'badge_icon', [
                'label'   => __( 'Badge Icon (Lucide)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'zap',
            ] );

            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Expert Electrical Services', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Heading ────────────────────────────────────────────────── */
        $this->start_controls_section( 'sec_heading', [
            'label' => __( 'Heading', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_line1', [
                'label'   => __( 'Heading Line 1', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Electrical Installation', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_line2_gradient', [
                'label'   => __( 'Heading Line 2 (Gradient)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Condition Reports (EICR)', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Body ───────────────────────────────────────────────────── */
        $this->start_controls_section( 'sec_body', [
            'label' => __( 'Description & CTA', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Ensure your property is safe, compliant, and fully certified. We provide professional fault-finding, PAT testing, and comprehensive EICR inspections.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'button_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book Inspection', 'html-to-elementor' ),
            ] );

            $this->add_control( 'button_icon', [
                'label'   => __( 'Button Icon (Lucide)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'arrow-right',
            ] );

            $this->add_control( 'button_link', [
                'label'         => __( 'Button Link', 'html-to-elementor' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'default'       => [ 'url' => '#' ],
                'show_external' => true,
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s      = $this->get_settings_for_display();
        $target = ! empty( $s['button_link']['is_external'] ) ? ' target="_blank"' : '';
        $norel  = ! empty( $s['button_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        ?>
        <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-navy text-white clip-diagonal">
            <div class="absolute inset-0 z-0 opacity-20">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-electric rounded-full mix-blend-screen filter blur-[100px] animate-pulse"></div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">

                <?php if ( ! empty( $s['badge_text'] ) ) : ?>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6 slide-in-right">
                    <?php if ( ! empty( $s['badge_icon'] ) ) : ?>
                        <i data-lucide="<?php echo esc_attr( $s['badge_icon'] ); ?>" class="w-4 h-4 text-electric"></i>
                    <?php endif; ?>
                    <span class="text-sm font-medium text-white/90"><?php echo esc_html( $s['badge_text'] ); ?></span>
                </div>
                <?php endif; ?>

                <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-6 slide-in-left">
                    <?php echo esc_html( $s['heading_line1'] ); ?><br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-electric to-safety">
                        <?php echo esc_html( $s['heading_line2_gradient'] ); ?>
                    </span>
                </h1>

                <?php if ( ! empty( $s['description'] ) ) : ?>
                <p class="text-lg text-white/80 mb-8 max-w-2xl mx-auto leading-relaxed fade-in delay-100">
                    <?php echo esc_html( $s['description'] ); ?>
                </p>
                <?php endif; ?>

                <?php if ( ! empty( $s['button_text'] ) ) : ?>
                <div class="flex justify-center gap-4 fade-in delay-200">
                    <a href="<?php echo esc_url( $s['button_link']['url'] ); ?>"
                       class="bg-orange hover:bg-orange/90 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(255,122,0,0.4)] flex items-center gap-2"
                       <?php echo $target . $norel; ?>>
                        <?php echo esc_html( $s['button_text'] ); ?>
                        <?php if ( ! empty( $s['button_icon'] ) ) : ?>
                            <i data-lucide="<?php echo esc_attr( $s['button_icon'] ); ?>" class="w-5 h-5"></i>
                        <?php endif; ?>
                    </a>
                </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
    }
}
