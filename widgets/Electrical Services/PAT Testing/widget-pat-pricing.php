<?php
/**
 * Widget: Pricing (Section 06)
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Pat_Pricing extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-pricing'; }
    public function get_title()      { return __( 'HTE – PAT Pricing', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-price-table'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'pricing', 'packages' ]; }

    protected function register_controls() {

        /* ── Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Transparent Rates', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Our Portable Appliance Testing Prices', 'html-to-elementor' ),
            ] );

            $this->add_control( 'footer_note', [
                'label'   => __( 'Footer Note', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( '* Additional appliances are charged at low bulk rates. Contact us for bespoke quotes over 50 items.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Domestic Card ── */
        $this->start_controls_section( 'sec_domestic', [
            'label' => __( 'Domestic Card', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'domestic_icon', [
                'label'   => __( 'Background Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'home',
            ] );

            $this->add_control( 'domestic_heading', [
                'label'   => __( 'Card Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Domestic Properties', 'html-to-elementor' ),
            ] );

            $this->add_control( 'domestic_price', [
                'label'   => __( 'Price', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£59',
            ] );

            $this->add_control( 'domestic_price_suffix', [
                'label'   => __( 'Price Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Starting from', 'html-to-elementor' ),
            ] );

            /* Features repeater */
            $feat_rep = new \Elementor\Repeater();
            $feat_rep->add_control( 'feature', [
                'label'   => __( 'Feature Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '15 appliances tested', 'html-to-elementor' ),
            ] );

            $this->add_control( 'domestic_features', [
                'label'       => __( 'Features', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $feat_rep->get_controls(),
                'default'     => [
                    [ 'feature' => __( '15 appliances tested', 'html-to-elementor' ) ],
                    [ 'feature' => __( 'Keeps home or rental safe', 'html-to-elementor' ) ],
                    [ 'feature' => __( 'Quick and reliable service', 'html-to-elementor' ) ],
                    [ 'feature' => __( 'Full PAT test certificate provided', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ feature }}}',
            ] );

            $this->add_control( 'domestic_btn_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Select Package', 'html-to-elementor' ),
            ] );

            $this->add_control( 'domestic_btn_link', [
                'label'   => __( 'Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#booking' ],
            ] );

        $this->end_controls_section();

        /* ── Commercial Card ── */
        $this->start_controls_section( 'sec_commercial', [
            'label' => __( 'Commercial Card', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'commercial_icon', [
                'label'   => __( 'Background Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'building-2',
            ] );

            $this->add_control( 'commercial_badge', [
                'label'   => __( 'Badge Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Most Popular', 'html-to-elementor' ),
            ] );

            $this->add_control( 'commercial_heading', [
                'label'   => __( 'Card Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Commercial Properties', 'html-to-elementor' ),
            ] );

            $this->add_control( 'commercial_price', [
                'label'   => __( 'Price', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£150',
            ] );

            $this->add_control( 'commercial_price_suffix', [
                'label'   => __( 'Price Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Starting from', 'html-to-elementor' ),
            ] );

            $feat_rep2 = new \Elementor\Repeater();
            $feat_rep2->add_control( 'feature', [
                'label'   => __( 'Feature Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Up to 15 appliances tested', 'html-to-elementor' ),
            ] );

            $this->add_control( 'commercial_features', [
                'label'       => __( 'Features', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $feat_rep2->get_controls(),
                'default'     => [
                    [ 'feature' => __( 'Up to 15 appliances tested', 'html-to-elementor' ) ],
                    [ 'feature' => __( 'Protects staff and customers', 'html-to-elementor' ) ],
                    [ 'feature' => __( 'Reduces equipment downtime', 'html-to-elementor' ) ],
                    [ 'feature' => __( 'Full PAT test certificate provided', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ feature }}}',
            ] );

            $this->add_control( 'commercial_btn_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get Commercial Quote', 'html-to-elementor' ),
            ] );

            $this->add_control( 'commercial_btn_link', [
                'label'   => __( 'Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#booking' ],
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $dom_target  = ( ! empty( $s['domestic_btn_link']['is_external'] ) )   ? ' target="_blank"' : '';
        $dom_norel   = ( ! empty( $s['domestic_btn_link']['nofollow'] ) )       ? ' rel="nofollow"'  : '';
        $com_target  = ( ! empty( $s['commercial_btn_link']['is_external'] ) )  ? ' target="_blank"' : '';
        $com_norel   = ( ! empty( $s['commercial_btn_link']['nofollow'] ) )     ? ' rel="nofollow"'  : '';
        ?>
        <section class="py-24 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16">
                <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                    <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2">
                        <?php echo esc_html( $s['eyebrow'] ); ?>
                    </h2>
                <?php endif; ?>
                <?php if ( ! empty( $s['heading'] ) ) : ?>
                    <h3 class="text-4xl font-extrabold text-navy">
                        <?php echo esc_html( $s['heading'] ); ?>
                    </h3>
                <?php endif; ?>
            </div>

            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-8">

                <!-- Domestic Card -->
                <div class="bg-white border-2 border-gray-100 rounded-[40px] p-10 hover:border-electric transition-all shadow-sm hover:shadow-2xl relative group overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 text-electric/10 group-hover:text-electric/20 transition-colors">
                        <i data-lucide="<?php echo esc_attr( $s['domestic_icon'] ); ?>" class="w-24 h-24"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-navy mb-2"><?php echo esc_html( $s['domestic_heading'] ); ?></h4>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-navy font-black text-5xl"><?php echo esc_html( $s['domestic_price'] ); ?></span>
                        <span class="text-navy/40 text-sm italic"><?php echo esc_html( $s['domestic_price_suffix'] ); ?></span>
                    </div>
                    <ul class="space-y-4 mb-10 text-navy font-semibold">
                        <?php foreach ( $s['domestic_features'] as $feat ) : ?>
                            <li class="flex items-center gap-3">
                                <i data-lucide="check" class="text-safety"></i>
                                <?php echo esc_html( $feat['feature'] ); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url( $s['domestic_btn_link']['url'] ); ?>"
                       class="block text-center bg-electric text-white py-4 rounded-2xl font-bold hover:scale-105 transition-transform"
                       <?php echo $dom_target . $dom_norel; ?>>
                        <?php echo esc_html( $s['domestic_btn_text'] ); ?>
                    </a>
                </div>

                <!-- Commercial Card -->
                <div class="bg-navy rounded-[40px] p-10 text-white shadow-2xl relative group overflow-hidden border-2 border-navy">
                    <div class="absolute top-0 right-0 p-8 text-white/5 group-hover:text-white/10 transition-colors">
                        <i data-lucide="<?php echo esc_attr( $s['commercial_icon'] ); ?>" class="w-24 h-24"></i>
                    </div>
                    <?php if ( ! empty( $s['commercial_badge'] ) ) : ?>
                        <div class="absolute top-6 left-1/2 -translate-x-1/2 bg-orange text-white text-[10px] uppercase font-bold tracking-widest px-3 py-1 rounded-full shadow-lg">
                            <?php echo esc_html( $s['commercial_badge'] ); ?>
                        </div>
                    <?php endif; ?>
                    <h4 class="text-2xl font-bold mb-2"><?php echo esc_html( $s['commercial_heading'] ); ?></h4>
                    <div class="flex items-baseline gap-1 mb-8">
                        <span class="text-white font-black text-5xl"><?php echo esc_html( $s['commercial_price'] ); ?></span>
                        <span class="text-white/40 text-sm italic"><?php echo esc_html( $s['commercial_price_suffix'] ); ?></span>
                    </div>
                    <ul class="space-y-4 mb-10 font-medium">
                        <?php foreach ( $s['commercial_features'] as $feat ) : ?>
                            <li class="flex items-center gap-3">
                                <i data-lucide="check" class="text-electric"></i>
                                <?php echo esc_html( $feat['feature'] ); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url( $s['commercial_btn_link']['url'] ); ?>"
                       class="block text-center bg-white text-navy py-4 rounded-2xl font-bold hover:scale-105 transition-transform"
                       <?php echo $com_target . $com_norel; ?>>
                        <?php echo esc_html( $s['commercial_btn_text'] ); ?>
                    </a>
                </div>

            </div>

            <?php if ( ! empty( $s['footer_note'] ) ) : ?>
                <p class="text-center mt-12 text-navy/40 text-sm italic">
                    <?php echo esc_html( $s['footer_note'] ); ?>
                </p>
            <?php endif; ?>
        </section>
        <?php
    }
}