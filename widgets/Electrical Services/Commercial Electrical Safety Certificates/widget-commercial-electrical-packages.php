<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Commercial_Electrical_Packages extends \Elementor\Widget_Base {

    public function get_name()       { return 'commercial_packages'; }
    public function get_title()      { return __( 'Commercial – Packages', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-price-table'; }
    public function get_keywords()   { return [ 'hte', 'Packages', 'banner', 'Commercial',  'electrical' ]; }

    protected function _register_controls() {

        /* ── HEADER ── */
        $this->start_controls_section( 'sec_header', [ 'label' => __( 'Section Header', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow',     [ 'label' => __( 'Eyebrow', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Our Rates' ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Commercial EICR Packages' ] );
            $this->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Fixed pricing for your peace of mind. Select the package that fits your premises.' ] );
        $this->end_controls_section();

        /* ── PACKAGES ── */
        $this->start_controls_section( 'sec_packages', [ 'label' => __( 'Packages', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'pkg_name',      [ 'label' => __( 'Package Name', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Small Commercial' ] );
            $rep->add_control( 'pkg_subtitle',  [ 'label' => __( 'Sub-title', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Up to 12 Circuits' ] );
            $rep->add_control( 'pkg_icon',      [ 'label' => __( 'Icon', 'plugin-name' ),             'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'building' ] );
            $rep->add_control( 'pkg_icon_color',[ 'label' => __( 'Icon Colour Class', 'plugin-name' ),'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'text-electric', 'description' => 'e.g. text-electric, text-orange' ] );
            $rep->add_control( 'pkg_icon_bg',   [ 'label' => __( 'Icon BG Class', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'bg-electric/10' ] );
            $rep->add_control( 'pkg_price',     [ 'label' => __( 'Price (main)', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => '£149' ] );
            $rep->add_control( 'pkg_pence',     [ 'label' => __( 'Price (pence)', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT,    'default' => '.99' ] );
            $rep->add_control( 'pkg_featured',  [ 'label' => __( 'Featured?', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::SWITCHER,'return_value' => 'yes', 'default' => '' ] );
            $rep->add_control( 'pkg_btn_text',  [ 'label' => __( 'Button Text', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Select Package' ] );
            $rep->add_control( 'pkg_btn_url',   [ 'label' => __( 'Button URL', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::URL,     'default' => [ 'url' => '#' ] ] );
            // Features repeater within package
            $rep->add_control( 'pkg_features_raw', [
                'label'       => __( 'Features (one per line)', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "Inspection & Testing\nDigital CEICR Report\nAll Inclusive (No hidden Cost)\n*Add. circuit: £15 | Add. board: £129.99",
                'description' => __( 'Lines starting with * render as a fine-print note.', 'plugin-name' ),
            ] );
            $this->add_control( 'packages', [
                'label'   => __( 'Packages', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [
                        'pkg_name'         => 'Small Commercial',
                        'pkg_subtitle'     => 'Up to 12 Circuits',
                        'pkg_icon'         => 'building',
                        'pkg_icon_color'   => 'text-electric',
                        'pkg_icon_bg'      => 'bg-electric/10',
                        'pkg_price'        => '£149',
                        'pkg_pence'        => '.99',
                        'pkg_featured'     => '',
                        'pkg_btn_text'     => 'Select Package',
                        'pkg_btn_url'      => [ 'url' => '#' ],
                        'pkg_features_raw' => "Inspection & Testing\nDigital CEICR Report\nAll Inclusive (No hidden Cost)\n*Add. circuit: £15 | Add. board: £129.99",
                    ],
                    [
                        'pkg_name'         => 'Medium Commercial',
                        'pkg_subtitle'     => '12–36 Circuits',
                        'pkg_icon'         => 'factory',
                        'pkg_icon_color'   => 'text-orange',
                        'pkg_icon_bg'      => 'bg-orange/10',
                        'pkg_price'        => '£249',
                        'pkg_pence'        => '.99',
                        'pkg_featured'     => 'yes',
                        'pkg_btn_text'     => 'Select Package',
                        'pkg_btn_url'      => [ 'url' => '#' ],
                        'pkg_features_raw' => "Inspection & Testing\nDigital CEICR Report\nAll Inclusive (No hidden Cost)\n*Add. circuit: £15 | Add. board: £129.99",
                    ],
                ],
                'title_field' => '{{{ pkg_name }}}',
            ] );
        $this->end_controls_section();

        /* ── FOOTNOTE ── */
        $this->start_controls_section( 'sec_footnote', [ 'label' => __( 'Footnote', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'footnote', [ 'label' => __( 'Footnote Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '* Parking / congestion charges: may apply depending on location and restrictions.' ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'eyebrow_col',  [ 'label' => __( 'Eyebrow', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .cpkg-eyebrow'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col',  [ 'label' => __( 'Heading', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .cpkg-heading'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'check_col',    [ 'label' => __( 'Check Icon', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F', 'selectors' => [ '{{WRAPPER}} .cpkg-check'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'btn_std_bg',   [ 'label' => __( 'Standard Btn BG', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR,'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .cpkg-btn-std'  => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn_std_hover',[ 'label' => __( 'Standard Btn Hover', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR,'default' => '#1E90FF','selectors' => [ '{{WRAPPER}} .cpkg-btn-std:hover' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn_feat_bg',  [ 'label' => __( 'Featured Btn BG', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR,'default' => '#FF7A00', 'selectors' => [ '{{WRAPPER}} .cpkg-btn-feat' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn_feat_hover',[ 'label' => __( 'Featured Btn Hover', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR,'default' => '#e56e00','selectors' => [ '{{WRAPPER}} .cpkg-btn-feat:hover' => 'background-color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white relative z-10 -mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="cpkg-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="cpkg-heading text-4xl font-bold mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <p class="text-lg text-navy/70"><?php echo esc_html( $s['description'] ); ?></p>
                </div>

                <!-- Cards -->
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <?php foreach ( $s['packages'] as $pkg ) :
                        $featured = ( $pkg['pkg_featured'] === 'yes' );
                        $card_cls = $featured
                            ? 'bg-white rounded-3xl p-8 border-2 border-electric shadow-xl flex flex-col fade-in'
                            : 'bg-light-grey rounded-3xl p-8 border border-gray-100 shadow-lg hover:shadow-xl transition-all group flex flex-col fade-in';
                        $btn_url  = ! empty( $pkg['pkg_btn_url']['url'] ) ? esc_url( $pkg['pkg_btn_url']['url'] ) : '#';
                        $btn_cls  = $featured ? 'cpkg-btn-feat w-full py-4 text-white rounded-xl font-bold text-center transition-colors shadow-lg shadow-orange/20' : 'cpkg-btn-std w-full py-4 text-white rounded-xl font-bold text-center transition-colors';
                        $lines = array_filter( array_map( 'trim', explode( "\n", $pkg['pkg_features_raw'] ) ) );
                    ?>
                    <div class="<?php echo $card_cls; ?>">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h4 class="text-2xl font-bold text-navy mb-1"><?php echo esc_html( $pkg['pkg_name'] ); ?></h4>
                                <p class="text-navy/60 text-sm"><?php echo esc_html( $pkg['pkg_subtitle'] ); ?></p>
                            </div>
                            <div class="<?php echo esc_attr( $pkg['pkg_icon_bg'] ); ?> p-3 rounded-2xl <?php echo esc_attr( $pkg['pkg_icon_color'] ); ?>">
                                <i data-lucide="<?php echo esc_attr( $pkg['pkg_icon'] ); ?>"></i>
                            </div>
                        </div>
                        <div class="text-4xl font-bold text-navy mb-8">
                            <?php echo esc_html( $pkg['pkg_price'] ); ?><span class="text-xl"><?php echo esc_html( $pkg['pkg_pence'] ); ?></span>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            <?php foreach ( $lines as $line ) :
                                $is_note = ( strpos( $line, '*' ) === 0 );
                                if ( $is_note ) : ?>
                                <li class="flex items-center gap-3 text-xs text-navy/40 italic">
                                    <i data-lucide="info" class="w-3 h-3"></i>
                                    <?php echo esc_html( ltrim( $line, '* ' ) ); ?>
                                </li>
                            <?php else : ?>
                                <li class="flex items-center gap-3 text-sm text-navy/70 font-semibold">
                                    <i data-lucide="check" class="cpkg-check w-4 h-4"></i>
                                    <?php echo esc_html( $line ); ?>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo $btn_url; ?>" class="<?php echo $btn_cls; ?>"><?php echo esc_html( $pkg['pkg_btn_text'] ); ?></a>
                    </div>
                    <?php endforeach; ?>
                </div>

                <?php if ( ! empty( $s['footnote'] ) ) : ?>
                <p class="text-center text-xs text-navy/40 mt-8 font-medium italic"><?php echo esc_html( $s['footnote'] ); ?></p>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}