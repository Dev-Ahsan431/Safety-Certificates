<?php
/**
 * Widget: Fire Alarms Final CTA
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Fire_Alarm_Installation_Fire_Cta extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-fire-cta'; }
    public function get_title()      { return __( 'HTE – Fire: Final CTA', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-call-to-action'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fire', 'cta', 'call to action', 'booking', 'Fire Alarm Installation Fire Cta' ]; }

    protected function register_controls() {

        /* ── Content ── */
        $this->start_controls_section( 'sec_content', [
            'label' => __( 'Content', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Protect What', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Matters', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Subheading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Expert fire alarm installation across London. Fully certified, compliant, and starting from just £210 per alarm.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Buttons ── */
        $this->start_controls_section( 'sec_buttons', [
            'label' => __( 'Buttons', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'primary_btn_text', [
                'label'   => __( 'Primary Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book Now', 'html-to-elementor' ),
            ] );

            $this->add_control( 'primary_btn_link', [
                'label'         => __( 'Primary Button Link', 'html-to-elementor' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'default'       => [ 'url' => '#booking' ],
                'show_external' => true,
            ] );

            $this->add_control( 'secondary_btn_text', [
                'label'   => __( 'Phone Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '020 8145 5369', 'html-to-elementor' ),
            ] );

            $this->add_control( 'secondary_btn_link', [
                'label'   => __( 'Phone Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:02081455369' ],
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $pri_target = ! empty( $s['primary_btn_link']['is_external'] )  ? ' target="_blank"' : '';
        $pri_norel  = ! empty( $s['primary_btn_link']['nofollow'] )      ? ' rel="nofollow"'  : '';
        ?>
        <section class="py-24 bg-white overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="bg-navy p-12 lg:p-20 rounded-[80px] text-white text-center shadow-2xl relative overflow-hidden">

                    <!-- Decorative blobs -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute -top-10 -left-10 w-64 h-64 bg-orange rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-electric rounded-full blur-3xl"></div>
                    </div>

                    <div class="relative z-10">
                        <h2 class="text-4xl lg:text-7xl font-black mb-8 italic leading-tight uppercase">
                            <?php echo esc_html( $s['heading_before'] ); ?>
                            <?php if ( ! empty( $s['heading_highlight'] ) ) : ?>
                                <span class="text-orange"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                            <?php endif; ?>
                        </h2>

                        <?php if ( ! empty( $s['subheading'] ) ) : ?>
                            <p class="text-xl text-white/50 italic font-medium mb-12 max-w-2xl mx-auto leading-relaxed">
                                <?php echo wp_kses_post( $s['subheading'] ); ?>
                            </p>
                        <?php endif; ?>

                        <div class="flex flex-col sm:flex-row justify-center gap-6">
                            <?php if ( ! empty( $s['primary_btn_text'] ) ) : ?>
                                <a href="<?php echo esc_url( $s['primary_btn_link']['url'] ); ?>"
                                   class="bg-orange text-white px-12 py-6 rounded-[30px] font-black text-xl hover:scale-105 transition-all shadow-2xl shadow-orange/30"
                                   <?php echo $pri_target . $pri_norel; ?>>
                                    <?php echo esc_html( $s['primary_btn_text'] ); ?>
                                </a>
                            <?php endif; ?>

                            <?php if ( ! empty( $s['secondary_btn_text'] ) ) : ?>
                                <a href="<?php echo esc_url( $s['secondary_btn_link']['url'] ); ?>"
                                   class="bg-white/10 text-white px-12 py-6 rounded-[30px] font-black text-xl hover:bg-white/20 transition-all flex items-center justify-center gap-3 backdrop-blur-md">
                                    <i data-lucide="phone" class="w-6 h-6 text-orange"></i>
                                    <?php echo esc_html( $s['secondary_btn_text'] ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}