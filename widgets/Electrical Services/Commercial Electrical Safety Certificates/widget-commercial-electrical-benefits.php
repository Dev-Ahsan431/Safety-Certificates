<?php

class HTE_Widget_Commercial_Electrical_Benefits extends \Elementor\Widget_Base {

    public function get_name()       { return 'commercial_benefits'; }
    public function get_title()      { return __( 'Commercial – Benefits', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-check-circle'; }
    public function get_keywords()   { return [ 'hte', 'Benefits', 'banner', 'Commercial',  'electrical' ]; }
 
    protected function _register_controls() {
        $this->start_controls_section( 'sec_header', [ 'label' => __( 'Header', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow', [ 'label' => __( 'Eyebrow', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Benefits' ] );
            $this->add_control( 'heading', [ 'label' => __( 'Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Why Regular EICRs Matter' ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_cards', [ 'label' => __( 'Benefit Cards', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'icon',  [ 'label' => __( 'Icon', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'shield-check' ] );
            $rep->add_control( 'title', [ 'label' => __( 'Title', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Risk Reduction' ] );
            $rep->add_control( 'desc',  [ 'label' => __( 'Description', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Identifying and rectifying faults at early stages secures a safer workplace, protecting both personnel and your physical assets.' ] );
            $this->add_control( 'cards', [
                'label'   => __( 'Cards', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'icon' => 'shield-check', 'title' => 'Risk Reduction',        'desc' => 'Identifying and rectifying faults at early stages secures a safer workplace, protecting both personnel and your physical assets.' ],
                    [ 'icon' => 'file-check',   'title' => 'Compliance Confidence', 'desc' => 'Staying compliant instills confidence among stakeholders and insurers who require proof of regulatory adherence.' ],
                    [ 'icon' => 'coins',        'title' => 'Long-Term Savings',     'desc' => 'Efficient systems lead to reduced energy consumption and prevention of downtime from catastrophic electrical failures.' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'eyebrow_col', [ 'label' => __( 'Eyebrow', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .cbens-eyebrow'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col', [ 'label' => __( 'Heading', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .cbens-heading'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'icon_col',    [ 'label' => __( 'Icon Colour', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .cbens-icon'       => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_title',  [ 'label' => __( 'Card Title', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .cbens-card-title' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_desc',   [ 'label' => __( 'Card Desc', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.6)', 'selectors' => [ '{{WRAPPER}} .cbens-card-desc'  => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }
 
    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="cbens-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="cbens-heading text-4xl font-bold mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <?php foreach ( $s['cards'] as $card ) : ?>
                    <div class="bg-light-grey p-10 rounded-3xl border border-gray-100 flex flex-col items-center text-center fade-in">
                        <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-md mb-6">
                            <i data-lucide="<?php echo esc_attr( $card['icon'] ); ?>" class="cbens-icon w-8 h-8"></i>
                        </div>
                        <h4 class="cbens-card-title text-xl font-bold mb-4"><?php echo esc_html( $card['title'] ); ?></h4>
                        <p class="cbens-card-desc text-sm leading-relaxed"><?php echo esc_html( $card['desc'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}