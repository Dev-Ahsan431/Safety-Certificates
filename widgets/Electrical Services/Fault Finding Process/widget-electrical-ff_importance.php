<?php

class HTE_Widget_Electrical_FF_Importance extends \Elementor\Widget_Base {

    public function get_name()       { return 'ff_importance'; }
    public function get_title()      { return __( 'Fault Finding – Risks / Importance', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-alert'; }
    public function get_keywords()   { return [ 'hte', 'Importance', 'banner', 'FF',  'electrical' ]; }
 
    protected function _register_controls() {
 
        $this->start_controls_section( 'sec_header', [ 'label' => __( 'Header', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow',     [ 'label' => __( 'Eyebrow', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'The Risks' ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Why Are Electrical Safety Standards So Important?' ] );
            $this->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Faulty electrical installations are silent threats. Without proper diagnostics, minor issues can escalate rapidly.' ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_cards', [ 'label' => __( 'Risk Cards', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'icon',      [ 'label' => __( 'Icon', 'plugin-name' ),           'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'flame' ] );
            $rep->add_control( 'icon_bg',   [ 'label' => __( 'Icon BG Colour', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR,   'default' => '#fef2f2' ] );
            $rep->add_control( 'icon_col',  [ 'label' => __( 'Icon Colour', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR,   'default' => '#ef4444' ] );
            $rep->add_control( 'title',     [ 'label' => __( 'Title', 'plugin-name' ),          'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Fire Hazards' ] );
            $rep->add_control( 'desc',      [ 'label' => __( 'Description', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Overheating wires can ignite surrounding materials.' ] );
            $this->add_control( 'cards', [
                'label' => __( 'Cards', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'icon' => 'flame',  'icon_bg' => '#fef2f2',         'icon_col' => '#ef4444', 'title' => 'Fire Hazards',    'desc' => 'Overheating wires can ignite surrounding materials.' ],
                    [ 'icon' => 'zap',    'icon_bg' => '#fff7ed',         'icon_col' => '#FF7A00', 'title' => 'Electric Shocks', 'desc' => 'Exposed or poorly grounded circuits present direct danger.' ],
                    [ 'icon' => 'home',   'icon_bg' => '#0B1F3A',         'icon_col' => '#ffffff', 'title' => 'Property Damage', 'desc' => 'Surges can destroy expensive appliances and wiring.' ],
                    [ 'icon' => 'gavel',  'icon_bg' => '#fee2e2',         'icon_col' => '#b91c1c', 'title' => 'Non-compliance',  'desc' => 'Avoid legal liabilities and voided insurance policies.' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',  [ 'label' => __( 'Section BG', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .ffr-section'  => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'eyebrow_col', [ 'label' => __( 'Eyebrow', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .ffr-eyebrow'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col', [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ffr-heading'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'body_col',    [ 'label' => __( 'Body Text', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.7)', 'selectors' => [ '{{WRAPPER}} .ffr-body' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_title',  [ 'label' => __( 'Card Title', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ffr-ctitle' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_desc',   [ 'label' => __( 'Card Desc', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.5)', 'selectors' => [ '{{WRAPPER}} .ffr-cdesc'  => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }
 
    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="ffr-section py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="ffr-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="ffr-heading text-4xl font-bold mb-6"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <p class="ffr-body text-lg leading-relaxed"><?php echo esc_html( $s['description'] ); ?></p>
                </div>
                <div class="grid md:grid-cols-4 gap-8">
                    <?php foreach ( $s['cards'] as $card ) : ?>
                    <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all fade-in">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6"
                             style="background-color:<?php echo esc_attr( $card['icon_bg'] ); ?>;color:<?php echo esc_attr( $card['icon_col'] ); ?>">
                            <i data-lucide="<?php echo esc_attr( $card['icon'] ); ?>" class="w-8 h-8"></i>
                        </div>
                        <h4 class="ffr-ctitle font-bold mb-2"><?php echo esc_html( $card['title'] ); ?></h4>
                        <p class="ffr-cdesc text-sm leading-relaxed"><?php echo esc_html( $card['desc'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}
