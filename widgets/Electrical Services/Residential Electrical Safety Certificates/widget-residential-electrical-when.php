<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_When extends \Elementor\Widget_Base {

    public function get_name()       { return 'eicr_when'; }
    public function get_title()      { return __( 'EICR – When to Arrange', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-calendar'; }
    public function get_keywords()   { return [ 'hte', 'when', 'packages', 'residential',  'electrical' ]; }

    protected function _register_controls() {

        /* ── HEADER ── */
        $this->start_controls_section( 'section_header', [ 'label' => __( 'Header', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading',  [ 'label' => __( 'Heading', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "When Should Residents\nArrange an EICR?" ] );
            $this->add_control( 'subtext',  [ 'label' => __( 'Sub-text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Proactive safety is always better than reactive repair. Consider an EICR in the following scenarios:' ] );
        $this->end_controls_section();

        /* ── SCENARIO LIST ── */
        $this->start_controls_section( 'section_scenarios', [ 'label' => __( 'Scenario Items', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'scenario', [ 'label' => __( 'Scenario', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'No inspection in 5–10 years' ] );
            $this->add_control( 'scenarios', [
                'label'   => __( 'Scenarios', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'scenario' => 'No inspection in 5–10 years' ],
                    [ 'scenario' => 'Buying or selling a property' ],
                    [ 'scenario' => 'Experiencing frequent electrical issues' ],
                    [ 'scenario' => 'Adding high-load appliances (EV, hot tub, etc.)' ],
                    [ 'scenario' => 'Following significant property modifications' ],
                ],
                'title_field' => '{{{ scenario }}}',
            ] );
        $this->end_controls_section();

        /* ── FOOTER PILL ── */
        $this->start_controls_section( 'section_pill', [ 'label' => __( 'Footer Pill', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'pill_text', [ 'label' => __( 'Pill Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Emphasis on Proactive Safety & Risk Mitigation' ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'style_s', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',    [ 'label' => __( 'Section BG', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff',  'selectors' => [ '{{WRAPPER}} .when-section' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_color', [ 'label' => __( 'Heading Colour', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A',  'selectors' => [ '{{WRAPPER}} .when-heading' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'num_bg',        [ 'label' => __( 'Number Badge BG', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A',  'selectors' => [ '{{WRAPPER}} .when-num'     => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'num_color',     [ 'label' => __( 'Number Badge Text', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff',  'selectors' => [ '{{WRAPPER}} .when-num'     => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'item_text',     [ 'label' => __( 'Item Text', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A',  'selectors' => [ '{{WRAPPER}} .when-item-text' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'pill_bg',       [ 'label' => __( 'Pill BG', 'plugin-name' ),         'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(40,199,111,0.1)', 'selectors' => [ '{{WRAPPER}} .when-pill' => 'background-color:{{VALUE}};border-color:rgba(40,199,111,0.2);' ] ] );
            $this->add_control( 'pill_color',    [ 'label' => __( 'Pill Text', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F',  'selectors' => [ '{{WRAPPER}} .when-pill'    => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $heading = nl2br( esc_html( $s['heading'] ) );
        ?>
        <section class="when-section py-24 overflow-hidden relative">
            <div class="absolute top-0 right-0 w-1/3 h-full bg-electric/5 clip-diagonal-reverse z-0"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="max-w-3xl mx-auto">
                    <h2 class="when-heading text-4xl font-bold mb-8 text-center fade-in"><?php echo $heading; ?></h2>
                    <div class="bg-light-grey rounded-[40px] p-8 lg:p-12 shadow-inner border border-white fade-in">
                        <p class="text-center text-navy/60 mb-10 font-medium"><?php echo esc_html( $s['subtext'] ); ?></p>
                        <ul class="space-y-6">
                            <?php foreach ( $s['scenarios'] as $i => $row ) : ?>
                            <li class="flex items-center gap-6 p-6 bg-white rounded-2xl shadow-sm border border-gray-100 transition-all hover:border-electric/30 hover:shadow-md">
                                <div class="when-num w-12 h-12 rounded-xl flex items-center justify-center shrink-0 font-bold">
                                    <?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?>
                                </div>
                                <span class="when-item-text text-lg font-semibold"><?php echo esc_html( $row['scenario'] ); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if ( ! empty( $s['pill_text'] ) ) : ?>
                        <div class="mt-12 text-center">
                            <div class="when-pill inline-block px-8 py-4 border rounded-2xl font-bold">
                                <?php echo esc_html( $s['pill_text'] ); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}