<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Electrical_FF_Intro extends \Elementor\Widget_Base {

    public function get_name()       { return 'ff_intro'; }
    public function get_title()      { return __( 'Fault Finding – Introduction', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-text-area'; }
    public function get_keywords()   { return [ 'hte', 'Intro', 'banner', 'FF',  'electrical' ]; }
 
    protected function _register_controls() {
 
        $this->start_controls_section( 'sec_left', [ 'label' => __( 'Left Column', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow',  [ 'label' => __( 'Eyebrow', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Safety First' ] );
            $this->add_control( 'heading',  [ 'label' => __( 'Heading', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Ensuring Electrical Safety Through Advanced Fault Diagnosis' ] );
            $this->add_control( 'para1',    [ 'label' => __( 'Paragraph 1', 'plugin-name' ),'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'We recognise finding electrical faults as a critical process for ensuring the safety and functionality of electrical systems. This approach involves rigorous testing and analysis to pinpoint circuit disruptions that could lead to potential hazards such as fires or equipment failure.' ] );
            $this->add_control( 'para2',    [ 'label' => __( 'Paragraph 2', 'plugin-name' ),'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Our qualified electricians use advanced tools to ensure every diagnostic check is comprehensive, protecting your property and providing peace of mind.' ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_cards', [ 'label' => __( 'Feature Cards', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'icon',  [ 'label' => __( 'Icon', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'flame' ] );
            $rep->add_control( 'title', [ 'label' => __( 'Title', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Fire Prevention' ] );
            $rep->add_control( 'desc',  [ 'label' => __( 'Description', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Stop hazards before they start.' ] );
            $this->add_control( 'cards', [
                'label' => __( 'Cards', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'icon' => 'flame',        'title' => 'Fire Prevention',  'desc' => 'Stop hazards before they start.' ],
                    [ 'icon' => 'zap-off',      'title' => 'System Stability', 'desc' => 'Ensure constant reliable power.' ],
                    [ 'icon' => 'shield-check', 'title' => 'Compliance',       'desc' => 'Meet all UK safety standards.' ],
                    [ 'icon' => 'search',       'title' => 'Precision',        'desc' => 'Pinpoint faults accurately.' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'eyebrow_col', [ 'label' => __( 'Eyebrow', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .ffi-eyebrow'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col', [ 'label' => __( 'Heading', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ffi-heading'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'body_col',    [ 'label' => __( 'Body Text', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.7)', 'selectors' => [ '{{WRAPPER}} .ffi-body' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'icon_col',    [ 'label' => __( 'Card Icon', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .ffi-icon'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_title',  [ 'label' => __( 'Card Title', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ffi-ctitle'   => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_desc',   [ 'label' => __( 'Card Desc', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.5)', 'selectors' => [ '{{WRAPPER}} .ffi-cdesc' => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }
 
    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white relative z-10 -mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="fade-in">
                        <h2 class="ffi-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                        <h3 class="ffi-heading text-4xl font-bold mb-6"><?php echo esc_html( $s['heading'] ); ?></h3>
                        <p class="ffi-body text-lg mb-6 leading-relaxed"><?php echo esc_html( $s['para1'] ); ?></p>
                        <p class="ffi-body leading-relaxed"><?php echo esc_html( $s['para2'] ); ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-6 slide-in-right">
                        <?php foreach ( $s['cards'] as $card ) : ?>
                        <div class="bg-light-grey p-8 rounded-3xl border border-gray-100 hover:shadow-lg transition-all">
                            <div class="ffi-icon mb-4"><i data-lucide="<?php echo esc_attr( $card['icon'] ); ?>" class="w-8 h-8"></i></div>
                            <h4 class="ffi-ctitle font-bold mb-2"><?php echo esc_html( $card['title'] ); ?></h4>
                            <p class="ffi-cdesc text-xs"><?php echo esc_html( $card['desc'] ); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}