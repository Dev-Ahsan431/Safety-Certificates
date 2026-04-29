<?php
/**
 * Widget: Pricing Packages (Section 02)
 * @package HTML_To_Elementor
 */
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Pricing extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pricing'; }
    public function get_title()      { return __( 'HTE – Pricing Packages', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-price-table'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pricing', 'packages', 'residential',  'electrical' ]; }

    protected function register_controls() {

        /* ── SECTION HEADER ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Pricing Packages',
            ] );
            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Transparent Nationwide Pricing',
            ] );
            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'No hidden costs. Choose the package that matches your property size.',
            ] );
        $this->end_controls_section();

        /* ── PRICING CARDS ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Pricing Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'card_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Studio Property',
            ] );
            $repeater->add_control( 'price_main', [
                'label'   => __( 'Price (main)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£75',
            ] );
            $repeater->add_control( 'price_decimal', [
                'label'       => __( 'Price Decimal (e.g. .99)', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '',
                'description' => __( 'Leave empty if no decimal.', 'html-to-elementor' ),
            ] );
            $repeater->add_control( 'is_featured', [
                'label'        => __( 'Featured / Most Popular?', 'html-to-elementor' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default'      => '',
            ] );
            $repeater->add_control( 'featured_label', [
                'label'     => __( 'Featured Badge Label', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Most Popular',
                'condition' => [ 'is_featured' => 'yes' ],
            ] );
            $repeater->add_control( 'features', [
                'label'       => __( 'Features (one per line)', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "Visual Inspection\nDetailed Testing\nEICR Digital Report",
                'description' => __( 'Each line becomes a bullet point.', 'html-to-elementor' ),
            ] );
            $repeater->add_control( 'btn_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Book Now',
            ] );
            $repeater->add_control( 'btn_url', [
                'label'   => __( 'Button URL', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );

            $this->add_control( 'cards', [
                'label'       => __( 'Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'card_title' => 'Studio Property',  'price_main' => '£75',  'price_decimal' => '',    'is_featured' => '',    'features' => "Visual Inspection\nDetailed Testing\nEICR Digital Report" ],
                    [ 'card_title' => '1–3 Bedrooms',     'price_main' => '£98',  'price_decimal' => '.99', 'is_featured' => 'yes', 'featured_label' => 'Most Popular', 'features' => "Visual Inspection\nDetailed Testing\nEICR Digital Report" ],
                    [ 'card_title' => '4 Bedrooms',       'price_main' => '£109', 'price_decimal' => '.99', 'is_featured' => '',    'features' => "Visual Inspection\nDetailed Testing\nEICR Digital Report" ],
                    [ 'card_title' => '5–6 Bedrooms',     'price_main' => '£149', 'price_decimal' => '.99', 'is_featured' => '',    'features' => "Visual Inspection\nDetailed Testing\nEICR Digital Report" ],
                ],
                'title_field' => '{{{ card_title }}}',
            ] );
        $this->end_controls_section();

        /* ── ADD-ON BANNER ── */
        $this->start_controls_section( 'sec_addon', [
            'label' => __( 'Add-on Banner', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'addon_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Add-on: Additional Consumer Unit',
            ] );
            $this->add_control( 'addon_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'If your property has more than one fuse board',
            ] );
            $this->add_control( 'addon_price', [
                'label'   => __( 'Price', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£89.99',
            ] );
            $this->add_control( 'addon_price_suffix', [
                'label'   => __( 'Price Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'each',
            ] );
            $this->add_control( 'addon_note', [
                'label'   => __( 'Small Note', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '* Possible extra: congestion/parking (if applicable)',
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white relative z-10 -mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <p class="text-lg text-navy/70"><?php echo esc_html( $s['subheading'] ); ?></p>
                </div>

                <!-- Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <?php foreach ( $s['cards'] as $card ) :
                        $featured  = ( $card['is_featured'] === 'yes' );
                        $btn_url   = ! empty( $card['btn_url']['url'] ) ? esc_url( $card['btn_url']['url'] ) : '#';
                        $features  = array_filter( array_map( 'trim', explode( "\n", $card['features'] ) ) );
                        $card_cls  = $featured
                            ? 'bg-white rounded-3xl p-8 border-2 border-electric shadow-xl scale-105 relative z-20 flex flex-col fade-in delay-100'
                            : 'bg-light-grey rounded-3xl p-8 border border-gray-100 shadow-lg hover:shadow-xl transition-all group flex flex-col fade-in';
                        $btn_cls   = $featured
                            ? 'w-full py-3 bg-orange text-white rounded-xl font-bold text-center hover:bg-orange/90 transition-colors shadow-lg shadow-orange/20'
                            : 'w-full py-3 bg-navy text-white rounded-xl font-bold text-center group-hover:bg-electric transition-colors';
                    ?>
                        <div class="<?php echo $card_cls; ?>">
                            <?php if ( $featured && ! empty( $card['featured_label'] ) ) : ?>
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-electric text-white px-4 py-1 rounded-full text-xs font-bold tracking-widest uppercase">
                                    <?php echo esc_html( $card['featured_label'] ); ?>
                                </div>
                            <?php endif; ?>
                            <h4 class="text-xl font-bold text-navy mb-1"><?php echo esc_html( $card['card_title'] ); ?></h4>
                            <div class="flex items-baseline gap-1 mb-6">
                                <span class="text-gray-400 text-lg">from</span>
                                <span class="text-4xl font-bold text-navy">
                                    <?php echo esc_html( $card['price_main'] ); ?>
                                    <?php if ( ! empty( $card['price_decimal'] ) ) : ?>
                                        <span class="text-xl"><?php echo esc_html( $card['price_decimal'] ); ?></span>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <ul class="space-y-4 mb-8 flex-grow">
                                <?php foreach ( $features as $feature ) : ?>
                                    <li class="flex items-center gap-3 text-sm text-navy/70 font-medium">
                                        <i data-lucide="chevron-right" class="text-electric w-4 h-4"></i>
                                        <?php echo esc_html( $feature ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="<?php echo $btn_url; ?>" class="<?php echo $btn_cls; ?>">
                                <?php echo esc_html( $card['btn_text'] ); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Add-on Banner -->
                <div class="bg-navy/5 rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-6 fade-in">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-navy text-white rounded-xl flex items-center justify-center shrink-0"><i data-lucide="plus"></i></div>
                        <div>
                            <h5 class="font-bold text-navy"><?php echo esc_html( $s['addon_title'] ); ?></h5>
                            <p class="text-sm text-navy/60"><?php echo esc_html( $s['addon_desc'] ); ?></p>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <span class="text-2xl font-bold text-navy">
                            <?php echo esc_html( $s['addon_price'] ); ?>
                            <span class="text-sm font-normal text-gray-500"><?php echo esc_html( $s['addon_price_suffix'] ); ?></span>
                        </span>
                        <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider mt-1"><?php echo esc_html( $s['addon_note'] ); ?></p>
                    </div>
                </div>

            </div>
        </section>
        <?php
    }
}