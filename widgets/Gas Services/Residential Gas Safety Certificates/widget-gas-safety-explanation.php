<?php
/**
 * Widget: Gas Safety – CP12 Explanation Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Explanation extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-explanation'; }
    public function get_title()      { return __( 'HTE – Gas Safety CP12 Explanation', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-info-box'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'cp12', 'explanation', 'info', 'gas', 'safety', 'certificate' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Main Content ── */
        $this->start_controls_section( 'sec_content', [
            'label' => __( 'Main Content', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'What is a CP12 Certificate?', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description_part1', [
                'label'   => __( 'Description – Part 1 (before highlight)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'A', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description_highlight', [
                'label'   => __( 'Description – Underline Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Landlord Gas Safety Record', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description_part2', [
                'label'   => __( 'Description – Part 2 (after highlight)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( '(CP12) is the report provided by a Gas Safe registered engineer after they have checked all gas appliances in your property. It is legally mandatory under the', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description_regulation', [
                'label'   => __( 'Regulation Name (highlighted)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Gas Safety (Installation and Use) Regulations 1998', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Info Boxes ── */
        $this->start_controls_section( 'sec_info_boxes', [
            'label' => __( 'Info Boxes', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'box_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'info',
            ] );

            $repeater->add_control( 'box_icon_color', [
                'label'   => __( 'Icon Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-safety',
            ] );

            $repeater->add_control( 'box_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Why it matters', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'box_description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Failing to provide a valid CP12 is a criminal offence that can lead to large fines, imprisonment, and invalidated property insurance.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'info_boxes', [
                'label'       => __( 'Info Boxes', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'box_icon'        => 'info',
                        'box_icon_color'  => 'text-safety',
                        'box_title'       => 'Why it matters',
                        'box_description' => 'Failing to provide a valid CP12 is a criminal offence that can lead to large fines, imprisonment, and invalidated property insurance.',
                    ],
                    [
                        'box_icon'        => 'calendar',
                        'box_icon_color'  => 'text-electric',
                        'box_title'       => 'How often?',
                        'box_description' => 'Gas safety checks must be performed every 12 months. New tenants must receive a copy before moving in.',
                    ],
                ],
                'title_field' => '{{{ box_title }}}',
            ] );

        $this->end_controls_section();

        /* ── CTA ── */
        $this->start_controls_section( 'sec_cta', [
            'label' => __( 'CTA Link', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'cta_text', [
                'label'   => __( 'CTA Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Secure your CP12 today', 'html-to-elementor' ),
            ] );

            $this->add_control( 'cta_link', [
                'label'   => __( 'CTA Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:02081455369' ],
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        $cta_target = ! empty( $s['cta_link']['is_external'] ) ? ' target="_blank"' : '';
        $cta_norel  = ! empty( $s['cta_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        ?>
        <section class="section-explanation py-24 bg-light-grey">
            <div class="container max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-navy rounded-[3rem] p-12 lg:p-20 text-white relative overflow-hidden shadow-[0_40px_100px_-20px_rgba(11,31,58,0.5)]">
                    <div class="absolute -top-20 -right-20 w-80 h-80 bg-electric/20 rounded-full blur-[80px]"></div>
                    <div class="relative z-10 text-center">

                        <h2 class="text-3xl md:text-5xl font-bold mb-8 font-heading"><?php echo esc_html( $s['heading'] ); ?></h2>

                        <p class="text-xl text-white/70 mb-12 leading-relaxed">
                            <?php echo esc_html( $s['description_part1'] ); ?>
                            <span class="text-white font-bold underline decoration-safety underline-offset-8"><?php echo esc_html( $s['description_highlight'] ); ?></span>
                            <?php echo ' ' . esc_html( $s['description_part2'] ); ?>
                            <span class="text-electric font-bold"><?php echo ' ' . esc_html( $s['description_regulation'] ); ?></span>.
                        </p>

                        <!-- Info Boxes -->
                        <div class="grid md:grid-cols-2 gap-8 text-left">
                            <?php foreach ( $s['info_boxes'] as $box ) : ?>
                                <div class="bg-white/5 p-8 rounded-3xl border border-white/10 backdrop-blur-sm">
                                    <h4 class="text-xl font-bold mb-4 flex items-center gap-3">
                                        <i data-lucide="<?php echo esc_attr( $box['box_icon'] ); ?>" class="<?php echo esc_attr( $box['box_icon_color'] ); ?>"></i>
                                        <?php echo esc_html( $box['box_title'] ); ?>
                                    </h4>
                                    <p class="text-sm text-white/60 leading-relaxed"><?php echo esc_html( $box['box_description'] ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- CTA -->
                        <div class="mt-16 pt-12 border-t border-white/10 text-center">
                            <a href="<?php echo esc_url( $s['cta_link']['url'] ); ?>"<?php echo $cta_target . $cta_norel; ?>
                               class="inline-flex items-center gap-4 text-electric font-bold text-xl hover:gap-6 transition-all">
                                <?php echo esc_html( $s['cta_text'] ); ?>
                                <i data-lucide="arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}