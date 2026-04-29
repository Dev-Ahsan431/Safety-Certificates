<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Who_Its_For_Widget extends \Elementor\Widget_Base {

    public function get_name()       { return 'eicr_who_its_for'; }
    public function get_title()      { return __( 'EICR – Who It\'s For', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-person'; }
    public function get_keywords()   { return [ 'hte', 'Who Its For Widget', 'packages', 'residential',  'electrical' ]; }

    protected function _register_controls() {

        /* ── HEADER ── */
        $this->start_controls_section( 'section_header', [ 'label' => __( 'Section Header', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow',     [ 'label' => __( 'Eyebrow', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'Our Clients' ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'Who This Service Is For' ] );
        $this->end_controls_section();

        /* ── CLIENT CARDS ── */
        $this->start_controls_section( 'section_cards', [ 'label' => __( 'Client Cards', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'icon',        [ 'label' => __( 'Lucide Icon', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'home' ] );
            $rep->add_control( 'title',       [ 'label' => __( 'Title', 'plugin-name' ),         'type' => \Elementor\Controls_Manager::TEXT,     'default' => 'Landlords & HMOs' ] );
            $rep->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXTAREA,  'default' => 'Meet legal obligations for rental properties and multiple occupancy homes.' ] );
            $this->add_control( 'cards', [
                'label'       => __( 'Cards', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $rep->get_controls(),
                'default'     => [
                    [ 'icon' => 'home',        'title' => 'Landlords & HMOs',   'description' => 'Meet legal obligations for rental properties and multiple occupancy homes.' ],
                    [ 'icon' => 'users',       'title' => 'Lettings & Agents',  'description' => 'Streamline property management with fast and reliable bulk certification.' ],
                    [ 'icon' => 'shield-check','title' => 'Homeowners',         'description' => 'Ensure the safety of your family and sanity-check your electrical system.' ],
                    [ 'icon' => 'key',         'title' => 'Buyers & Sellers',   'description' => 'Essential documentation to speed up property sales or pre-purchase due diligence.' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'style_section', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',    [ 'label' => __( 'Section BG', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .wif-section' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'eyebrow_color', [ 'label' => __( 'Eyebrow Colour', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .wif-eyebrow' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_color', [ 'label' => __( 'Heading Colour', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .wif-heading' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'icon_color',    [ 'label' => __( 'Icon Colour', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .wif-icon'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_title_color', [ 'label' => __( 'Card Title', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .wif-card-title' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_desc_color',  [ 'label' => __( 'Card Desc', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.6)', 'selectors' => [ '{{WRAPPER}} .wif-card-desc'  => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="wif-section py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="wif-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="wif-heading text-4xl font-bold mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ( $s['cards'] as $card ) : ?>
                    <div class="text-center fade-in">
                        <div class="w-20 h-20 mx-auto bg-white rounded-2xl shadow-lg flex items-center justify-center mb-6 transition-transform hover:-translate-y-2">
                            <i data-lucide="<?php echo esc_attr( $card['icon'] ); ?>" class="wif-icon w-10 h-10"></i>
                        </div>
                        <h4 class="wif-card-title text-xl font-bold mb-2"><?php echo esc_html( $card['title'] ); ?></h4>
                        <p class="wif-card-desc text-sm leading-relaxed px-2"><?php echo esc_html( $card['description'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}