<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Home_Services extends \Elementor\Widget_Base {

    public function get_name() { return 'home_services'; }
    public function get_title() { return __( 'Home – Services', 'HTE', 'plugin-name' ); }
    public function get_icon() { return 'eicon-posts-grid'; }
    public function get_categories() { return [ 'general' ]; }

    protected function _register_controls() {

        /* ── SECTION HEADER ── */
        $this->start_controls_section( 'section_header', [ 'label' => __( 'Section Header', 'plugin-name' ) ] );
            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Our Services',
            ] );
            $this->add_control( 'title', [
                'label'   => __( 'Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Complete Compliance Solutions',
            ] );
            $this->add_control( 'description', [
                'label'   => __( 'Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Everything you need to keep your property safe, legal, and fully compliant under one roof.',
            ] );
        $this->end_controls_section();

        /* ── SERVICE CARDS ── */
        $this->start_controls_section( 'section_cards', [ 'label' => __( 'Service Cards', 'plugin-name' ) ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'card_icon', [
                'label'   => __( 'Lucide Icon Name', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'zap',
                'description' => __( 'Use any Lucide icon name e.g. zap, flame, shield-alert, leaf, alert-triangle', 'plugin-name' ),
            ] );
            $repeater->add_control( 'card_icon_color_class', [
                'label'   => __( 'Icon Color Class', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-electric',
                'description' => __( 'Tailwind text color class: text-electric, text-orange, text-red-500, text-safety, text-purple-500', 'plugin-name' ),
            ] );
            $repeater->add_control( 'card_icon_bg_class', [
                'label'   => __( 'Icon BG Class', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'bg-electric/10',
            ] );
            $repeater->add_control( 'card_title', [
                'label'   => __( 'Card Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Electrical (EICR)',
            ] );
            $repeater->add_control( 'card_description', [
                'label'   => __( 'Card Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Comprehensive electrical installation condition reports for landlords and homeowners.',
            ] );
            $repeater->add_control( 'card_link_text', [
                'label'   => __( 'Link Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Learn More',
            ] );
            $repeater->add_control( 'card_link_url', [
                'label'   => __( 'Link URL', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );
            $this->add_control( 'service_cards', [
                'label'       => __( 'Services', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'card_icon' => 'zap',           'card_icon_color_class' => 'text-electric',    'card_icon_bg_class' => 'bg-electric/10',   'card_title' => 'Electrical (EICR)',       'card_description' => 'Comprehensive electrical installation condition reports for landlords and homeowners.',                         'card_link_text' => 'Learn More', 'card_link_url' => [ 'url' => '#' ] ],
                    [ 'card_icon' => 'flame',         'card_icon_color_class' => 'text-orange',      'card_icon_bg_class' => 'bg-orange/10',     'card_title' => 'Gas Safety (CP12)',       'card_description' => 'Annual gas safety inspections and certificates by Gas Safe registered engineers.',                          'card_link_text' => 'Learn More', 'card_link_url' => [ 'url' => '#gas' ] ],
                    [ 'card_icon' => 'shield-alert',  'card_icon_color_class' => 'text-red-500',     'card_icon_bg_class' => 'bg-red-500/10',    'card_title' => 'Fire Risk Assessment',    'card_description' => 'Detailed fire safety audits to ensure full compliance with the Regulatory Reform Order.',                  'card_link_text' => 'Learn More', 'card_link_url' => [ 'url' => '#fire' ] ],
                    [ 'card_icon' => 'leaf',          'card_icon_color_class' => 'text-safety',      'card_icon_bg_class' => 'bg-safety/10',     'card_title' => 'Energy Performance (EPC)', 'card_description' => 'Accurate energy efficiency ratings required for selling or renting properties.',                           'card_link_text' => 'Learn More', 'card_link_url' => [ 'url' => '#epc' ] ],
                    [ 'card_icon' => 'alert-triangle','card_icon_color_class' => 'text-purple-500',  'card_icon_bg_class' => 'bg-purple-500/10', 'card_title' => 'Asbestos Surveys',        'card_description' => 'Management and refurbishment asbestos surveys for commercial and residential buildings.',                   'card_link_text' => 'Learn More', 'card_link_url' => [ 'url' => '#asbestos' ] ],
                ],
                'title_field' => '{{{ card_title }}}',
            ] );
        $this->end_controls_section();

        /* ── CTA CARD ── */
        $this->start_controls_section( 'section_cta_card', [ 'label' => __( 'Bundle CTA Card', 'plugin-name' ) ] );
            $this->add_control( 'cta_title', [
                'label'   => __( 'CTA Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Need Multiple Certificates?',
            ] );
            $this->add_control( 'cta_description', [
                'label'   => __( 'CTA Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Bundle your inspections and save up to 20% on your total compliance costs.',
            ] );
            $this->add_control( 'cta_button_text', [
                'label'   => __( 'Button Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Get a Bundle Quote',
            ] );
            $this->add_control( 'cta_button_url', [
                'label'   => __( 'Button URL', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $cta_url = isset( $s['cta_button_url']['url'] ) ? esc_url( $s['cta_button_url']['url'] ) : '#';
        ?>
        <section id="services" class="py-24 bg-light-grey">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['title'] ); ?></h3>
                    <p class="text-lg text-navy/70"><?php echo esc_html( $s['description'] ); ?></p>
                </div>

                <!-- Cards Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ( $s['service_cards'] as $card ) :
                        $link_url = isset( $card['card_link_url']['url'] ) ? esc_url( $card['card_link_url']['url'] ) : '#';
                    ?>
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all border border-gray-100 group fade-in">
                        <div class="w-14 h-14 rounded-2xl <?php echo esc_attr( $card['card_icon_bg_class'] ); ?> <?php echo esc_attr( $card['card_icon_color_class'] ); ?> flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <i data-lucide="<?php echo esc_attr( $card['card_icon'] ); ?>" class="w-7 h-7"></i>
                        </div>
                        <h4 class="text-xl font-bold text-navy mb-3"><?php echo esc_html( $card['card_title'] ); ?></h4>
                        <p class="text-navy/60 mb-6 line-clamp-3"><?php echo esc_html( $card['card_description'] ); ?></p>
                        <a href="<?php echo $link_url; ?>" class="inline-flex items-center gap-2 text-electric font-semibold hover:gap-3 transition-all">
                            <?php echo esc_html( $card['card_link_text'] ); ?>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                    <?php endforeach; ?>

                    <!-- Bundle CTA card -->
                    <div class="bg-navy rounded-3xl p-8 shadow-lg text-white flex flex-col justify-center relative overflow-hidden group fade-in delay-200">
                        <div class="absolute inset-0 bg-gradient-to-br from-electric/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <h4 class="text-2xl font-bold mb-4 relative z-10"><?php echo esc_html( $s['cta_title'] ); ?></h4>
                        <p class="text-white/70 mb-8 relative z-10"><?php echo esc_html( $s['cta_description'] ); ?></p>
                        <a href="<?php echo $cta_url; ?>" class="bg-orange hover:bg-orange/90 text-white px-6 py-3 rounded-xl font-bold transition-colors w-fit relative z-10">
                            <?php echo esc_html( $s['cta_button_text'] ); ?>
                        </a>
                    </div>
                </div>

            </div>
        </section>
        <?php
    }
}