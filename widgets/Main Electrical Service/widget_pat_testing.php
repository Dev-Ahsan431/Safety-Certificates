<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Pat_Testing extends \Elementor\Widget_Base {

    public function get_name()       { return 'pat_testing'; }
    public function get_title()      { return __( 'PAT Testing Section', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-plug'; }
    public function get_categories() { return [ 'general' ]; }
    public function get_keywords()   { return [ 'hte', 'eicr', 'pat_testing' ]; }

    protected function _register_controls() {

        /* ══════════════════════════════════════
         * CONTENT TAB
         * ══════════════════════════════════════ */

        /* ── SECTION HEADER ── */
        $this->start_controls_section( 'section_header', [
            'label' => __( 'Section Header', 'plugin-name' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Appliance Safety',
            ] );
            $this->add_control( 'heading', [
                'label'   => __( 'Main Heading', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'What is PAT Testing?',
            ] );
            $this->add_control( 'intro_text', [
                'label'   => __( 'Intro Paragraph', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Portable Appliance Testing (PAT) proves that electrical items don\'t pose shock or fire risks. Any portable appliance that is plugged into a socket needs to undergo PAT testing.',
            ] );
        $this->end_controls_section();

        /* ── MANDATORY NOTICE ── */
        $this->start_controls_section( 'section_mandatory', [
            'label' => __( 'Mandatory Notice', 'plugin-name' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'mandatory_heading', [
                'label'   => __( 'Heading', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Is PAT Testing Mandatory?',
            ] );
            $this->add_control( 'mandatory_text', [
                'label'   => __( 'Body Text (HTML allowed)', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'While highly recommended for all landlords to ensure safety, it is <strong>strictly mandatory for HMOs</strong> (Houses in Multiple Occupation). Landlords must maintain communal area electrics and comply with licensing conditions set by councils.',
            ] );
        $this->end_controls_section();

        /* ── BENEFITS LIST ── */
        $this->start_controls_section( 'section_benefits', [
            'label' => __( 'Benefits List', 'plugin-name' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'benefits_heading', [
                'label'   => __( 'Benefits Heading', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Benefits of PAT Testing',
            ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'benefit_text', [
                'label'   => __( 'Benefit', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Reduces the risk of electrical fires.',
            ] );
            $this->add_control( 'benefits', [
                'label'       => __( 'Benefits', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'benefit_text' => 'Reduces the risk of electrical fires.' ],
                    [ 'benefit_text' => 'Protects tenants from electric shocks.' ],
                    [ 'benefit_text' => 'Demonstrates a clear duty of care.' ],
                ],
                'title_field' => '{{{ benefit_text }}}',
            ] );
        $this->end_controls_section();

        /* ── APPLIANCES CARD ── */
        $this->start_controls_section( 'section_appliances', [
            'label' => __( 'Appliances Card', 'plugin-name' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'card_heading', [
                'label'   => __( 'Card Heading', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Appliances Requiring Testing',
            ] );
            $this->add_control( 'card_subtext', [
                'label'   => __( 'Card Sub-text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Any appliance provided by the landlord requires testing, including:',
            ] );
            $rep2 = new \Elementor\Repeater();
            $rep2->add_control( 'appliance_icon', [
                'label'       => __( 'Lucide Icon Name', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'coffee',
                'description' => __( 'e.g. coffee, utensils, refrigerator, microwave, tv, wind, lamp, plug-2', 'plugin-name' ),
            ] );
            $rep2->add_control( 'appliance_label', [
                'label'   => __( 'Label', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Kettles',
            ] );
            $this->add_control( 'appliances', [
                'label'       => __( 'Appliances', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $rep2->get_controls(),
                'default'     => [
                    [ 'appliance_icon' => 'coffee',       'appliance_label' => 'Kettles' ],
                    [ 'appliance_icon' => 'utensils',     'appliance_label' => 'Toasters' ],
                    [ 'appliance_icon' => 'refrigerator', 'appliance_label' => 'Fridges' ],
                    [ 'appliance_icon' => 'microwave',    'appliance_label' => 'Microwaves' ],
                    [ 'appliance_icon' => 'tv',           'appliance_label' => 'TVs' ],
                    [ 'appliance_icon' => 'wind',         'appliance_label' => 'Vacuums' ],
                    [ 'appliance_icon' => 'lamp',         'appliance_label' => 'Lamps' ],
                    [ 'appliance_icon' => 'plug-2',       'appliance_label' => 'Extension Leads' ],
                ],
                'title_field' => '{{{ appliance_label }}}',
            ] );
        $this->end_controls_section();

        /* ══════════════════════════════════════
         * STYLE TAB
         * ══════════════════════════════════════ */

        /* ── SECTION BACKGROUND ── */
        $this->start_controls_section( 'style_section', [
            'label' => __( 'Section Background', 'plugin-name' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
            $this->add_control( 'section_bg', [
                'label'     => __( 'Background Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#0B1F3A',   // navy
                'selectors' => [ '{{WRAPPER}} .pat-section' => 'background-color: {{VALUE}};' ],
            ] );
        $this->end_controls_section();

        /* ── TYPOGRAPHY COLOURS ── */
        $this->start_controls_section( 'style_type', [
            'label' => __( 'Typography Colours', 'plugin-name' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
            $this->add_control( 'eyebrow_color', [
                'label'     => __( 'Eyebrow Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1E90FF',   // electric
                'selectors' => [ '{{WRAPPER}} .pat-eyebrow' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'heading_color', [
                'label'     => __( 'Main Heading Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [ '{{WRAPPER}} .pat-heading' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'body_color', [
                'label'     => __( 'Body Text Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => 'rgba(255,255,255,0.70)',
                'selectors' => [ '{{WRAPPER}} .pat-body' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'mandatory_heading_color', [
                'label'     => __( 'Mandatory Heading Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1E90FF',   // electric
                'selectors' => [ '{{WRAPPER}} .pat-mandatory-heading' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'benefits_heading_color', [
                'label'     => __( 'Benefits Heading Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [ '{{WRAPPER}} .pat-benefits-heading' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'benefit_item_color', [
                'label'     => __( 'Benefit Item Text Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => 'rgba(255,255,255,0.80)',
                'selectors' => [ '{{WRAPPER}} .pat-benefit-item' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'benefit_icon_color', [
                'label'     => __( 'Benefit Icon Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#28C76F',   // safety green
                'selectors' => [ '{{WRAPPER}} .pat-benefit-icon' => 'color: {{VALUE}};' ],
            ] );
        $this->end_controls_section();

        /* ── APPLIANCES CARD ── */
        $this->start_controls_section( 'style_card', [
            'label' => __( 'Appliances Card', 'plugin-name' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
            $this->add_control( 'card_bg', [
                'label'     => __( 'Card Background', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => 'rgba(11,31,58,0.85)',  // glass-dark
                'selectors' => [ '{{WRAPPER}} .pat-card' => 'background-color: {{VALUE}};' ],
            ] );
            $this->add_control( 'card_heading_color', [
                'label'     => __( 'Card Heading Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [ '{{WRAPPER}} .pat-card-heading' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'card_subtext_color', [
                'label'     => __( 'Card Sub-text Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => 'rgba(255,255,255,0.60)',
                'selectors' => [ '{{WRAPPER}} .pat-card-subtext' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'appliance_item_bg', [
                'label'     => __( 'Appliance Item Background', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => 'rgba(255,255,255,0.05)',
                'selectors' => [ '{{WRAPPER}} .pat-appliance-item' => 'background-color: {{VALUE}};' ],
            ] );
            $this->add_control( 'appliance_item_color', [
                'label'     => __( 'Appliance Item Text Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [ '{{WRAPPER}} .pat-appliance-item' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'appliance_icon_color', [
                'label'     => __( 'Appliance Icon Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#1E90FF',   // electric
                'selectors' => [ '{{WRAPPER}} .pat-appliance-icon' => 'color: {{VALUE}};' ],
            ] );
            $this->add_control( 'appliance_border_color', [
                'label'     => __( 'Appliance Item Border Colour', 'plugin-name' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => 'rgba(255,255,255,0.10)',
                'selectors' => [ '{{WRAPPER}} .pat-appliance-item' => 'border-color: {{VALUE}};' ],
            ] );
        $this->end_controls_section();
    }

    /* ═══════════════════════════════════════════════════════════
     * RENDER
     * ═══════════════════════════════════════════════════════════ */
    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="pat-section py-24 relative" style="background-color:#0B1F3A;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- ── LEFT COLUMN ── -->
                    <div class="fade-in">

                        <!-- Eyebrow + Heading -->
                        <h2 class="pat-eyebrow text-sm font-bold uppercase tracking-wider mb-2">
                            <?php echo esc_html( $s['eyebrow'] ); ?>
                        </h2>
                        <h3 class="pat-heading text-4xl font-bold mb-6">
                            <?php echo esc_html( $s['heading'] ); ?>
                        </h3>
                        <p class="pat-body text-lg mb-6">
                            <?php echo esc_html( $s['intro_text'] ); ?>
                        </p>

                        <!-- Mandatory notice -->
                        <div class="mb-8">
                            <h4 class="pat-mandatory-heading text-xl font-bold mb-3">
                                <?php echo esc_html( $s['mandatory_heading'] ); ?>
                            </h4>
                            <div class="pat-body">
                                <?php echo wp_kses_post( $s['mandatory_text'] ); ?>
                            </div>
                        </div>

                        <!-- Benefits -->
                        <h4 class="pat-benefits-heading text-xl font-bold mb-4">
                            <?php echo esc_html( $s['benefits_heading'] ); ?>
                        </h4>
                        <ul class="space-y-3">
                            <?php foreach ( $s['benefits'] as $benefit ) : ?>
                            <li class="pat-benefit-item flex items-center gap-3">
                                <i data-lucide="check-circle-2" class="pat-benefit-icon w-5 h-5 shrink-0"></i>
                                <?php echo esc_html( $benefit['benefit_text'] ); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>

                    <!-- ── RIGHT COLUMN: Appliances Card ── -->
                    <div class="relative slide-in-right">
                        <div class="pat-card glass-dark p-8 rounded-3xl shadow-2xl border border-white/10 relative z-10">

                            <h4 class="pat-card-heading text-2xl font-bold mb-6">
                                <?php echo esc_html( $s['card_heading'] ); ?>
                            </h4>
                            <p class="pat-card-subtext text-sm mb-6">
                                <?php echo esc_html( $s['card_subtext'] ); ?>
                            </p>

                            <div class="grid grid-cols-2 gap-4">
                                <?php foreach ( $s['appliances'] as $appliance ) : ?>
                                <div class="pat-appliance-item flex items-center gap-3 p-3 rounded-xl border">
                                    <i data-lucide="<?php echo esc_attr( $appliance['appliance_icon'] ); ?>" class="pat-appliance-icon shrink-0"></i>
                                    <span><?php echo esc_html( $appliance['appliance_label'] ); ?></span>
                                </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}