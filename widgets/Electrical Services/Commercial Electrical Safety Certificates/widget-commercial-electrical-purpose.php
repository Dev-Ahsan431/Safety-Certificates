<?php
/* ════════════════════════════════════════════════════════════
 * Section 4 – Definition & Purpose (3-card grid)
 * ════════════════════════════════════════════════════════════ */
if ( ! defined( 'ABSPATH' ) ) exit;
 
class HTE_Widget_Commercial_Electrical_Purpose extends \Elementor\Widget_Base {

    public function get_name()       { return 'commercial_purpose'; }
    public function get_title()      { return __( 'Commercial – Purpose / X-Ray', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-posts-grid'; }
    public function get_keywords()   { return [ 'hte', 'Purpose', 'banner', 'Commercial',  'electrical' ]; }
 
    protected function _register_controls() {
        $this->start_controls_section( 'sec_header', [ 'label' => __( 'Header', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow',     [ 'label' => __( 'Eyebrow', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Purpose' ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'The "Electrical X-Ray" for Business' ] );
            $this->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'EICR is a comprehensive exploration instead of a quick check, ensuring every component meets national standards (BS 7671).' ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_cards', [ 'label' => __( 'Cards', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'icon',  [ 'label' => __( 'Icon', 'plugin-name' ),         'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'zoom-in' ] );
            $rep->add_control( 'title', [ 'label' => __( 'Title', 'plugin-name' ),         'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Detailed Assessment' ] );
            $rep->add_control( 'desc',  [ 'label' => __( 'Description', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'An in-depth inspection of all fixed electrical parts, including wiring, sockets, light fittings, and circuit breakers.' ] );
            $this->add_control( 'cards', [
                'label'   => __( 'Cards', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'icon' => 'zoom-in',      'title' => 'Detailed Assessment', 'desc' => 'An in-depth inspection of all fixed electrical parts, including wiring, sockets, light fittings, and circuit breakers.' ],
                    [ 'icon' => 'shield-check', 'title' => 'Risk Mitigation',     'desc' => 'Confirming systems are safe and compliant helps mitigate risks and reduce potential legal liabilities for building managers.' ],
                    [ 'icon' => 'trending-up',  'title' => 'Longevity & Value',   'desc' => 'Promptly rectifying issues improves the lifespan of electrical components, preventing costly future repairs and downtime.' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'eyebrow_col', [ 'label' => __( 'Eyebrow', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .cpurp-eyebrow' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col', [ 'label' => __( 'Heading', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .cpurp-heading' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'icon_bg',     [ 'label' => __( 'Icon BG', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .cpurp-icon-wrap' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'card_title',  [ 'label' => __( 'Card Title', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .cpurp-card-title' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_desc',   [ 'label' => __( 'Card Desc', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.6)', 'selectors' => [ '{{WRAPPER}} .cpurp-card-desc'  => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }
 
    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center mb-16 fade-in">
                    <h2 class="cpurp-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="cpurp-heading text-4xl font-bold mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <p class="text-lg text-navy/70 leading-relaxed"><?php echo esc_html( $s['description'] ); ?></p>
                </div>
                <div class="grid lg:grid-cols-3 gap-8">
                    <?php foreach ( $s['cards'] as $card ) : ?>
                    <div class="bg-light-grey p-8 rounded-3xl border border-gray-100 hover:shadow-xl transition-all fade-in">
                        <div class="cpurp-icon-wrap w-12 h-12 text-white rounded-xl mb-6 flex items-center justify-center">
                            <i data-lucide="<?php echo esc_attr( $card['icon'] ); ?>"></i>
                        </div>
                        <h4 class="cpurp-card-title text-xl font-bold mb-4"><?php echo esc_html( $card['title'] ); ?></h4>
                        <p class="cpurp-card-desc text-sm leading-relaxed"><?php echo esc_html( $card['desc'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}