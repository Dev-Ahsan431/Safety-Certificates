<?php
/**
 * Widget: Gas Safety – Common Failures Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Failures extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-failures'; }
    public function get_title()      { return __( 'HTE – Gas Safety Common Failures', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-warning'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'failures', 'fail', 'reasons', 'gas', 'safety', 'inspection' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Left Column ── */
        $this->start_controls_section( 'sec_left', [
            'label' => __( 'Left Column', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Common Reasons for Failure', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Sometimes a property fails its inspection. If this happens, our engineers will document exactly why and provide a clear "At Risk" or "Immediately Dangerous" classification.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'callout_title', [
                'label'   => __( 'Callout Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'What happens next?', 'html-to-elementor' ),
            ] );

            $this->add_control( 'callout_text', [
                'label'   => __( 'Callout Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'If an appliance fails, we will provide a quote for the necessary repairs or provide a "Warning Notice" sticker to isolate the dangerous appliance from the gas supply.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Failure Items ── */
        $this->start_controls_section( 'sec_items', [
            'label' => __( 'Failure Reasons (Right List)', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'failure_text', [
                'label'   => __( 'Failure Reason', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Unsafe working parts (burners, injectors)', 'html-to-elementor' ),
            ] );

            $this->add_control( 'failures', [
                'label'       => __( 'Failure Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'failure_text' => 'Unsafe working parts (burners, injectors)' ],
                    [ 'failure_text' => 'Inadequate ventilation in the room' ],
                    [ 'failure_text' => 'Incorrect flue installation or blockage' ],
                    [ 'failure_text' => 'Minor gas leaks identified at the meter' ],
                ],
                'title_field' => '{{{ failure_text }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="section-failures py-24 bg-white">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-orange/5 border border-orange/10 rounded-[3rem] p-12 lg:p-20 grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left -->
                    <div>
                        <h3 class="text-4xl font-bold text-navy mb-8 font-heading"><?php echo esc_html( $s['heading'] ); ?></h3>
                        <p class="text-lg text-navy/60 mb-10"><?php echo esc_html( $s['description'] ); ?></p>
                        <div class="bg-white p-8 rounded-3xl shadow-sm border border-orange/10">
                            <h4 class="font-bold text-orange flex items-center gap-2 mb-4">
                                <i data-lucide="help-circle"></i>
                                <?php echo esc_html( $s['callout_title'] ); ?>
                            </h4>
                            <p class="text-sm text-navy/70 leading-relaxed font-medium"><?php echo esc_html( $s['callout_text'] ); ?></p>
                        </div>
                    </div>

                    <!-- Right: Failure List -->
                    <ul class="space-y-6">
                        <?php foreach ( $s['failures'] as $failure ) : ?>
                            <li class="p-6 bg-white rounded-2xl border border-gray-100 flex items-center gap-5 shadow-sm">
                                <div class="w-10 h-10 bg-red-500/10 text-red-500 rounded-full flex items-center justify-center shrink-0">
                                    <i data-lucide="x" class="w-6 h-6"></i>
                                </div>
                                <span class="font-bold text-navy"><?php echo esc_html( $failure['failure_text'] ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>
        </section>
        <?php
    }
}