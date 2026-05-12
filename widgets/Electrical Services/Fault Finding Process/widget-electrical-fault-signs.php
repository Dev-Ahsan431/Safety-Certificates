<?php
/**
 * Widget: Electrical Fault Finding – Signs Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Electrical_Fault_Signs extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-electrical-fault-signs'; }
    public function get_title()      { return __( 'HTE – Electrical Fault: Signs', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-alert'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'electrical', 'signs', 'warning', 'symptoms', 'fault', 'finding' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Left Column ── */
        $this->start_controls_section( 'sec_left', [
            'label' => __( 'Left Column', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_plain', [
                'label'   => __( 'Heading – Plain Part', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Signs You Need', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted Part', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Electrical Fault Finding', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Sign Items ── */
        $this->start_controls_section( 'sec_signs', [
            'label' => __( 'Sign Items', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'sign_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'zap',
            ] );

            $repeater->add_control( 'sign_text', [
                'label'   => __( 'Sign Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Flickering or Dimming Lights', 'html-to-elementor' ),
            ] );

            $this->add_control( 'sign_items', [
                'label'       => __( 'Signs', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'sign_icon' => 'zap',             'sign_text' => 'Flickering or Dimming Lights' ],
                    [ 'sign_icon' => 'alert-octagon',   'sign_text' => 'Circuit Breakers Tripping Frequently' ],
                    [ 'sign_icon' => 'wind',            'sign_text' => 'Burning Smells Near Outlets or Switches' ],
                    [ 'sign_icon' => 'activity',        'sign_text' => 'Strange Buzzing or Crackling Sounds' ],
                    [ 'sign_icon' => 'mouse-pointer-2', 'sign_text' => 'Mild Shocks When Touching Appliances' ],
                ],
                'title_field' => '{{{ sign_text }}}',
            ] );

        $this->end_controls_section();

        /* ── CTA Card ── */
        $this->start_controls_section( 'sec_cta_card', [
            'label' => __( 'CTA Card (Right)', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'cta_icon', [
                'label'   => __( 'Icon (Lucide)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'phone-call',
            ] );

            $this->add_control( 'cta_heading', [
                'label'   => __( 'CTA Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( "Don't Ignore the Warnings", 'html-to-elementor' ),
            ] );

            $this->add_control( 'cta_desc', [
                'label'   => __( 'CTA Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Electrical faults only get worse with time. If you notice any of these signs, contact us immediately for a professional diagnostic check.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'cta_btn_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Contact Experts Now', 'html-to-elementor' ),
            ] );

            $this->add_control( 'cta_btn_link', [
                'label'   => __( 'Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:+44800123456' ],
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s          = $this->get_settings_for_display();
        $btn_target = ! empty( $s['cta_btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $btn_norel  = ! empty( $s['cta_btn_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        ?>
        <section class="py-24 bg-light-grey">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left: Signs List -->
                    <div>
                        <h2 class="text-4xl font-bold text-navy mb-8">
                            <?php echo esc_html( $s['heading_plain'] ); ?><br>
                            <span class="text-electric"><?php echo esc_html( $s['heading_highlight'] ); ?></span>
                        </h2>
                        <ul class="space-y-4">
                            <?php foreach ( $s['sign_items'] as $sign ) : ?>
                                <li class="flex items-center gap-4 bg-white p-5 rounded-2xl border border-gray-100 shadow-sm transition-all hover:translate-x-2">
                                    <div class="w-10 h-10 bg-electric/10 text-electric rounded-xl flex items-center justify-center shrink-0">
                                        <i data-lucide="<?php echo esc_attr( $sign['sign_icon'] ); ?>"></i>
                                    </div>
                                    <span class="font-bold text-navy"><?php echo esc_html( $sign['sign_text'] ); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Right: CTA Card -->
                    <div class="relative flex justify-center">
                        <div class="bg-navy rounded-full w-80 h-80 lg:w-[450px] lg:h-[450px] absolute z-0 opacity-5 -top-10 -right-10 animate-pulse"></div>
                        <div class="bg-white p-10 lg:p-16 rounded-[60px] shadow-2xl border border-gray-100 relative z-10 text-center max-w-lg">
                            <div class="flex justify-center mb-8">
                                <div class="w-24 h-24 bg-electric text-white rounded-3xl flex items-center justify-center shadow-2xl shadow-electric/30 rotate-3">
                                    <i data-lucide="<?php echo esc_attr( $s['cta_icon'] ); ?>" class="w-10 h-10"></i>
                                </div>
                            </div>
                            <h4 class="text-3xl font-bold text-navy mb-6 italic"><?php echo esc_html( $s['cta_heading'] ); ?></h4>
                            <p class="text-navy/60 leading-relaxed mb-10 text-lg"><?php echo esc_html( $s['cta_desc'] ); ?></p>
                            <a href="<?php echo esc_url( $s['cta_btn_link']['url'] ); ?>"<?php echo $btn_target . $btn_norel; ?>
                               class="inline-block bg-navy text-white px-10 py-5 rounded-2xl font-bold text-xl hover:bg-electric transition-colors shadow-xl">
                                <?php echo esc_html( $s['cta_btn_text'] ); ?>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}