<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Home_Final_Cta extends \Elementor\Widget_Base {

    public function get_name() { return 'home_final_cta'; }
    public function get_title() { return __( 'Home – Final CTA', 'plugin-name' ); }
    public function get_icon() { return 'eicon-call-to-action'; }
    public function get_categories() { return [ 'general' ]; }

    protected function _register_controls() {

        /* ── CONTENT ── */
        $this->start_controls_section( 'section_content', [ 'label' => __( 'Content', 'plugin-name' ) ] );
            $this->add_control( 'heading_plain', [
                'label'   => __( 'Heading (Plain Part)', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Get Your Property',
            ] );
            $this->add_control( 'heading_gradient', [
                'label'   => __( 'Heading (Gradient Part)', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Certified Today',
            ] );
            $this->add_control( 'description', [
                'label'   => __( 'Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Join thousands of compliant landlords and property managers. Book online in minutes and get your certificates fast.',
            ] );
        $this->end_controls_section();

        /* ── BUTTONS ── */
        $this->start_controls_section( 'section_buttons', [ 'label' => __( 'Buttons', 'plugin-name' ) ] );
            $this->add_control( 'btn_primary_text', [
                'label'   => __( 'Primary Button Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Get Instant Quote',
            ] );
            $this->add_control( 'btn_primary_url', [
                'label'   => __( 'Primary Button URL', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );
            $this->add_control( 'btn_secondary_text', [
                'label'   => __( 'Secondary Button Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Call 0800 123 456',
            ] );
            $this->add_control( 'btn_secondary_url', [
                'label'   => __( 'Secondary Button URL', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:0800123456' ],
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $primary_url   = isset( $s['btn_primary_url']['url'] )   ? esc_url( $s['btn_primary_url']['url'] )   : '#';
        $secondary_url = isset( $s['btn_secondary_url']['url'] ) ? esc_url( $s['btn_secondary_url']['url'] ) : 'tel:0800123456';
        ?>
        <section class="py-24 bg-white relative overflow-hidden">
            <!-- Background glow -->
            <div class="absolute inset-0 z-0 opacity-10">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-tr from-electric to-safety rounded-full mix-blend-screen filter blur-[100px]"></div>
            </div>

            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center fade-in">
                <h2 class="text-5xl md:text-6xl font-bold text-navy mb-6">
                    <?php echo esc_html( $s['heading_plain'] ); ?>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-electric to-safety">
                        <?php echo esc_html( $s['heading_gradient'] ); ?>
                    </span>
                </h2>
                <p class="text-xl text-navy/70 mb-10 max-w-2xl mx-auto"><?php echo esc_html( $s['description'] ); ?></p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo $primary_url; ?>"
                       class="bg-orange hover:bg-orange/90 text-white px-10 py-5 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(255,122,0,0.4)] flex items-center justify-center gap-2">
                        <?php echo esc_html( $s['btn_primary_text'] ); ?>
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                    <a href="<?php echo $secondary_url; ?>"
                       class="bg-white hover:bg-gray-50 border-2 border-navy text-navy px-10 py-5 rounded-xl font-bold text-lg transition-all flex items-center justify-center gap-2">
                        <?php echo esc_html( $s['btn_secondary_text'] ); ?>
                    </a>
                </div>
            </div>
        </section>
        <?php
    }
}
