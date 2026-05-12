<?php
/**
 * Widget: EICR Coding System
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Eicr_Coding extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-eicr-coding'; }
    public function get_title()      { return __( 'HTE – EICR Coding System', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-posts-grid'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'eicr', 'coding', 'classification' ]; }

    protected function register_controls() {

        /* ── Section Header ─────────────────────────────────────────── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Classification', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Understanding EICR Coding', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'When your report is generated, any issues found are categorized using a standard coding system.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Codes Repeater ─────────────────────────────────────────── */
        $this->start_controls_section( 'sec_codes', [
            'label' => __( 'Code Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'code_label', [
                'label'   => __( 'Code (e.g. C1)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'C1',
            ] );

            $repeater->add_control( 'code_color', [
                'label'   => __( 'Accent Color', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'default' => '#ef4444',
            ] );

            $repeater->add_control( 'code_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Danger Present', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'code_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Indicates immediate danger. Urgent action is needed to make the installation safe.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'codes', [
                'label'       => __( 'Codes', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'code_label' => 'C1', 'code_color' => '#ef4444', 'code_title' => 'Danger Present',           'code_desc' => 'Indicates immediate danger. Urgent action is needed to make the installation safe.' ],
                    [ 'code_label' => 'C2', 'code_color' => '#FF7A00', 'code_title' => 'Potentially Dangerous',    'code_desc' => 'Highlights a potentially dangerous issue. Remedial electrical work is required.' ],
                    [ 'code_label' => 'C3', 'code_color' => '#eab308', 'code_title' => 'Improvement Recommended',  'code_desc' => 'Indicates recommended improvements for issues that are not immediately dangerous.' ],
                    [ 'code_label' => 'F1', 'code_color' => '#60a5fa', 'code_title' => 'Further Investigation',   'code_desc' => 'Indicates that further investigation is required without delay to determine safety.' ],
                ],
                'title_field' => '{{{ code_label }}} – {{{ code_title }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-light-grey">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                        <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['heading'] ) ) : ?>
                        <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['description'] ) ) : ?>
                        <p class="text-lg text-navy/70"><?php echo esc_html( $s['description'] ); ?></p>
                    <?php endif; ?>
                </div>

                <?php if ( ! empty( $s['codes'] ) ) : ?>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ( $s['codes'] as $item ) :
                        $color = ! empty( $item['code_color'] ) ? esc_attr( $item['code_color'] ) : '#ef4444';
                    ?>
                        <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-md transition-shadow fade-in"
                             style="border-top: 4px solid <?php echo $color; ?>">
                            <div class="text-4xl font-heading font-bold mb-4"
                                 style="color: <?php echo $color; ?>">
                                <?php echo esc_html( $item['code_label'] ); ?>
                            </div>
                            <h4 class="text-xl font-bold text-navy mb-2"><?php echo esc_html( $item['code_title'] ); ?></h4>
                            <p class="text-navy/60 text-sm"><?php echo esc_html( $item['code_desc'] ); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
    }
}
