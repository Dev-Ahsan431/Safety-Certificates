<?php
/**
 * Widget: Gas Safety – Final CTA Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Cta_Final extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-cta-final'; }
    public function get_title()      { return __( 'HTE – Gas Safety Final CTA', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-call-to-action'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'cta', 'call to action', 'book', 'final', 'gas', 'safety' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Content ── */
        $this->start_controls_section( 'sec_content', [
            'label' => __( 'Content', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_plain', [
                'label'   => __( 'Heading – Plain Part', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Secure Your', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Gradient Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Gas Safety Certificate', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_suffix', [
                'label'   => __( 'Heading – Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Today', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( "London's most reliable team. Book your inspection in under 60 seconds.", 'html-to-elementor' ),
            ] );

            $this->add_control( 'trust_note', [
                'label'   => __( 'Bottom Trust Note', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'No Payment upfront required • Pay after inspection', 'html-to-elementor' ),
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
                'default' => __( 'Book Appointment', 'html-to-elementor' ),
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
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        
        $s = $this->get_settings_for_display();

        $primary_target   = ! empty( $s['btn_primary_link']['is_external'] )   ? ' target="_blank"' : '';
        $primary_norel    = ! empty( $s['btn_primary_link']['nofollow'] )       ? ' rel="nofollow"'  : '';
        $secondary_target = ! empty( $s['btn_secondary_link']['is_external'] )  ? ' target="_blank"' : '';
        $secondary_norel  = ! empty( $s['btn_secondary_link']['nofollow'] )     ? ' rel="nofollow"'  : '';
        ?>
        <section class="section-cta-final py-24 bg-navy relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-tr from-electric/20 to-transparent"></div>
            <div class="container max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">

                <!-- Heading -->
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 font-heading">
                    <?php echo esc_html( $s['heading_plain'] ); ?>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-electric to-safety"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                    <?php echo ' ' . esc_html( $s['heading_suffix'] ); ?>
                </h2>

                <!-- Sub-heading -->
                <p class="text-xl text-white/60 mb-12 max-w-2xl mx-auto"><?php echo esc_html( $s['subheading'] ); ?></p>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="<?php echo esc_url( $s['btn_primary_link']['url'] ); ?>"<?php echo $primary_target . $primary_norel; ?>
                       class="bg-orange hover:bg-orange/90 text-white px-12 py-6 rounded-[2rem] font-bold text-2xl shadow-[0_0_40px_rgba(255,122,0,0.4)] transition-all transform hover:scale-105">
                        <?php echo esc_html( $s['btn_primary_text'] ); ?>
                    </a>
                    <a href="<?php echo esc_url( $s['btn_secondary_link']['url'] ); ?>"<?php echo $secondary_target . $secondary_norel; ?>
                       class="bg-white/10 text-white border-2 border-white/20 px-12 py-6 rounded-[2rem] font-bold text-2xl hover:bg-white/20 transition-all flex items-center justify-center gap-3">
                        <i data-lucide="phone"></i>
                        <?php echo esc_html( $s['btn_secondary_text'] ); ?>
                    </a>
                </div>

                <!-- Trust Note -->
                <p class="mt-12 text-sm font-bold text-white/30 uppercase tracking-[0.3em]"><?php echo esc_html( $s['trust_note'] ); ?></p>

            </div>
        </section>
        <?php
    }
}