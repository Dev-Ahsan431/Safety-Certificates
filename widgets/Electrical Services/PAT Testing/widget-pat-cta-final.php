<?php
/**
 * Widget: PAT Testing – Final CTA Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_PAT_CTA_Final extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-cta-final'; }
    public function get_title()      { return __( 'HTE – PAT: Final CTA', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-call-to-action'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'cta', 'call to action', 'book', 'final', 'electrical', 'testing' ]; }

    protected function register_controls() {

        /* ── Content ── */
        $this->start_controls_section( 'sec_content', [
            'label' => __( 'Content', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Book PAT Testing Today with Reliable Local Service', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Covering all London boroughs. Same-day certificates. NICEIC expert engineers.', 'html-to-elementor' ),
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
                'default' => __( 'Get Inspected Now', 'html-to-elementor' ),
            ] );

            $this->add_control( 'btn_primary_link', [
                'label'   => __( 'Primary Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#booking' ],
            ] );

            $this->add_control( 'btn_secondary_text', [
                'label'   => __( 'Secondary Button Text (Phone Number)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '+44 20 8145 5369',
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
        ?>
        <section class="py-24 bg-electric text-white text-center relative overflow-hidden">

            <!-- Decorative radial overlay -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_transparent_0%,_rgba(10,17,40,0.4)_100%)]"></div>

            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

                <!-- Heading -->
                <h3 class="text-5xl font-extrabold mb-8 italic leading-tight"><?php echo esc_html( $s['heading'] ); ?></h3>

                <!-- Sub-heading -->
                <p class="text-xl opacity-80 mb-12"><?php echo esc_html( $s['subheading'] ); ?></p>

                <!-- Buttons -->
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="<?php echo esc_url( $s['btn_primary_link']['url'] ); ?>"<?php echo $p_target . $p_norel; ?>
                       class="bg-white text-navy px-12 py-6 rounded-2xl font-black text-xl hover:bg-navy hover:text-white transition-all shadow-2xl">
                        <?php echo esc_html( $s['btn_primary_text'] ); ?>
                    </a>
                    <a href="<?php echo esc_url( $s['btn_secondary_link']['url'] ); ?>"<?php echo $s_target . $s_norel; ?>
                       class="bg-navy text-white px-12 py-6 rounded-2xl font-black text-xl flex items-center gap-4 hover:scale-105 transition-transform">
                        <i data-lucide="phone"></i>
                        <?php echo esc_html( $s['btn_secondary_text'] ); ?>
                    </a>
                </div>

            </div>
        </section>
        <?php
    }
}