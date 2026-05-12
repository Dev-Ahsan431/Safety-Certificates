<?php
/**
 * Widget: Gas Safety – Process / How We Work Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Process extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-process'; }
    public function get_title()      { return __( 'HTE – Gas Safety Process', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-flow'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'process', 'steps', 'workflow', 'how', 'gas', 'safety' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'The Workflow', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'How We Certify Your Property', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Steps ── */
        $this->start_controls_section( 'sec_steps', [
            'label' => __( 'Process Steps', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'step_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'list-checks',
            ] );

            $repeater->add_control( 'step_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Count Appliances', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'step_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Confirm the number of gas appliances to be tested.', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'step_is_final', [
                'label'        => __( 'Is Final / Highlighted Step?', 'html-to-elementor' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'html-to-elementor' ),
                'label_off'    => __( 'No', 'html-to-elementor' ),
                'return_value' => 'yes',
                'default'      => '',
            ] );

            $this->add_control( 'steps', [
                'label'       => __( 'Steps', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'step_icon' => 'list-checks', 'step_title' => 'Count Appliances',  'step_desc' => 'Confirm the number of gas appliances to be tested.',          'step_is_final' => '' ],
                    [ 'step_icon' => 'eye',          'step_title' => 'Visual Inspection', 'step_desc' => 'Engineers check appliances, flues, and pipework.',              'step_is_final' => '' ],
                    [ 'step_icon' => 'activity',     'step_title' => 'Active Testing',    'step_desc' => 'Combustion analysis and gas tightness testing.',                'step_is_final' => '' ],
                    [ 'step_icon' => 'edit-3',       'step_title' => 'Record Findings',   'step_desc' => 'Collecting all technical data for the CP12 report.',            'step_is_final' => '' ],
                    [ 'step_icon' => 'award',        'step_title' => 'Issue Certificate', 'step_desc' => 'Instant digital delivery to your inbox.',                       'step_is_final' => 'yes' ],
                ],
                'title_field' => '{{{ step_title }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section id="process" class="section-process py-24 bg-white relative">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center mb-20">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-widest mb-4"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl md:text-5xl font-bold text-navy mb-4 font-heading"><?php echo esc_html( $s['heading'] ); ?></h3>
                </div>

                <!-- Steps -->
                <div class="grid md:grid-cols-5 gap-4">
                    <?php
                    $step_num = 0;
                    foreach ( $s['steps'] as $step ) :
                        $step_num++;
                        $is_final = ( 'yes' === $step['step_is_final'] );
                        $num_label = str_pad( $step_num, 2, '0', STR_PAD_LEFT );
                    ?>
                        <?php if ( $is_final ) : ?>
                            <div class="bg-safety p-8 rounded-[2rem] text-center relative group hover:bg-navy hover:text-white transition-all duration-500 text-white">
                                <div class="text-4xl font-black text-white/20 absolute top-4 left-4 font-heading"><?php echo esc_html( $num_label ); ?></div>
                                <div class="mt-8 mb-6 inline-block p-4 rounded-2xl bg-white shadow-sm transition-all">
                                    <i data-lucide="<?php echo esc_attr( $step['step_icon'] ); ?>" class="text-safety"></i>
                                </div>
                                <h4 class="font-bold mb-2"><?php echo esc_html( $step['step_title'] ); ?></h4>
                                <p class="text-xs opacity-70"><?php echo esc_html( $step['step_desc'] ); ?></p>
                            </div>
                        <?php else : ?>
                            <div class="bg-light-grey p-8 rounded-[2rem] text-center relative group hover:bg-navy hover:text-white transition-all duration-500">
                                <div class="text-4xl font-black text-navy/10 group-hover:text-white/10 absolute top-4 left-4 font-heading"><?php echo esc_html( $num_label ); ?></div>
                                <div class="mt-8 mb-6 inline-block p-4 rounded-2xl bg-white group-hover:bg-electric shadow-sm transition-all">
                                    <i data-lucide="<?php echo esc_attr( $step['step_icon'] ); ?>" class="text-navy group-hover:text-white"></i>
                                </div>
                                <h4 class="font-bold mb-2"><?php echo esc_html( $step['step_title'] ); ?></h4>
                                <p class="text-xs opacity-60"><?php echo esc_html( $step['step_desc'] ); ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}