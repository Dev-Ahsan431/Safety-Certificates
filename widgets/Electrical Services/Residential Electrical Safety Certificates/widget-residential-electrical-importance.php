<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Importance extends \Elementor\Widget_Base {

    public function get_name()       { return 'eicr_importance'; }
    public function get_title()      { return __( 'EICR – Why EICR is Essential', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-alert'; }
    public function get_keywords()   { return [ 'hte', 'Importance', 'packages', 'residential',  'electrical' ]; }

    protected function _register_controls() {

        /* ── LEFT CARD ── */
        $this->start_controls_section( 'section_card', [ 'label' => __( 'Left Card', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'risks_heading', [ 'label' => __( 'Risks Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Identify Hidden Risks' ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'risk_icon',  [ 'label' => __( 'Icon', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'zap' ] );
            $rep->add_control( 'risk_label', [ 'label' => __( 'Label', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Faulty Wiring' ] );
            $this->add_control( 'risks', [
                'label'   => __( 'Risk Items', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'risk_icon' => 'zap',      'risk_label' => 'Faulty Wiring' ],
                    [ 'risk_icon' => 'flame',     'risk_label' => 'Fire Hazards' ],
                    [ 'risk_icon' => 'activity',  'risk_label' => 'Electrical Shocks' ],
                ],
                'title_field' => '{{{ risk_label }}}',
            ] );
            $this->add_control( 'benefits_heading', [ 'label' => __( 'Benefits Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Core Benefits' ] );
            $rep2 = new \Elementor\Repeater();
            $rep2->add_control( 'benefit', [ 'label' => __( 'Benefit', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Safety Assurance' ] );
            $this->add_control( 'benefits', [
                'label'   => __( 'Benefits', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep2->get_controls(),
                'default' => [
                    [ 'benefit' => 'Safety Assurance' ],
                    [ 'benefit' => 'Legal Compliance' ],
                    [ 'benefit' => 'Peace of Mind' ],
                    [ 'benefit' => 'Preventative Maintenance' ],
                ],
                'title_field' => '{{{ benefit }}}',
            ] );
        $this->end_controls_section();

        /* ── RIGHT COLUMN ── */
        $this->start_controls_section( 'section_right', [ 'label' => __( 'Right Column', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading',      [ 'label' => __( 'Heading', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'Why an EICR is Essential for Your Property' ] );
            $this->add_control( 'description',  [ 'label' => __( 'Description', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXTAREA,  'default' => 'Electrical systems degrade over time. What seems fine on the surface might be a critical hazard behind the walls. A professional Electrical Installation Condition Report acts as an X-ray for your property, catching issues before they become expensive or dangerous emergencies.' ] );
            $this->add_control( 'button_text',  [ 'label' => __( 'Button Text', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'Book Your EICR Today' ] );
            $this->add_control( 'button_url',   [ 'label' => __( 'Button URL', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::URL,       'default' => [ 'url' => '#' ] ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'style_s', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',    [ 'label' => __( 'Section BG', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .imp-section'    => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'risk_icon_col', [ 'label' => __( 'Risk Icon Colour', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF7A00', 'selectors' => [ '{{WRAPPER}} .imp-risk-icon'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'risk_bg',       [ 'label' => __( 'Risk Item BG', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(255,122,0,0.05)', 'selectors' => [ '{{WRAPPER}} .imp-risk-item' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'benefit_dot',   [ 'label' => __( 'Benefit Dot', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F', 'selectors' => [ '{{WRAPPER}} .imp-dot'        => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn_bg',        [ 'label' => __( 'Button BG', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .imp-btn'        => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn_hover_bg',  [ 'label' => __( 'Button Hover BG', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .imp-btn:hover'  => 'background-color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s       = $this->get_settings_for_display();
        $btn_url = ! empty( $s['button_url']['url'] ) ? esc_url( $s['button_url']['url'] ) : '#';
        ?>
        <section class="imp-section py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- LEFT: Card -->
                    <div class="order-2 lg:order-1 slide-in-left">
                        <div class="bg-white p-8 rounded-3xl shadow-xl space-y-6">
                            <h4 class="text-2xl font-bold text-navy flex items-center gap-3">
                                <i data-lucide="alert-triangle" class="text-orange"></i>
                                <?php echo esc_html( $s['risks_heading'] ); ?>
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <?php foreach ( $s['risks'] as $risk ) : ?>
                                <div class="imp-risk-item p-4 rounded-xl border border-orange/10 text-center">
                                    <div class="imp-risk-icon mb-2 flex justify-center"><i data-lucide="<?php echo esc_attr( $risk['risk_icon'] ); ?>"></i></div>
                                    <span class="text-xs font-bold block text-navy"><?php echo esc_html( $risk['risk_label'] ); ?></span>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="h-px bg-gray-100 w-full"></div>
                            <h4 class="text-2xl font-bold text-navy flex items-center gap-3">
                                <i data-lucide="award" class="text-safety"></i>
                                <?php echo esc_html( $s['benefits_heading'] ); ?>
                            </h4>
                            <div class="grid grid-cols-2 gap-4">
                                <?php foreach ( $s['benefits'] as $b ) : ?>
                                <div class="flex items-center gap-3 text-sm font-medium text-navy/70">
                                    <div class="imp-dot w-2 h-2 rounded-full"></div>
                                    <?php echo esc_html( $b['benefit'] ); ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT: Copy -->
                    <div class="order-1 lg:order-2 fade-in">
                        <h2 class="text-4xl font-bold text-navy mb-6"><?php echo esc_html( $s['heading'] ); ?></h2>
                        <p class="text-lg text-navy/70 mb-8 leading-relaxed"><?php echo esc_html( $s['description'] ); ?></p>
                        <a href="<?php echo $btn_url; ?>" class="imp-btn inline-flex items-center gap-2 text-white px-8 py-4 rounded-xl font-bold transition-all shadow-lg">
                            <?php echo esc_html( $s['button_text'] ); ?>
                            <i data-lucide="calendar"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}