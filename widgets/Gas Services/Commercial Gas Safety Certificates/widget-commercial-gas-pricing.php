<?php
/**
 * Widget: Commercial Gas Pricing (4-column pricing cards + bottom alert bar)
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Commercial_Gas_Pricing extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-gas-pricing'; }
    public function get_title()      { return __( 'HTE – Gas Pricing', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-price-table'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'gas', 'pricing', 'price', 'plans', 'commercial gas' ]; }

    protected function register_controls() {

        /* ── Section Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Commercial Gas Check Pricing',
            ] );

            $this->add_control( 'heading_highlight', [
                'label'       => __( 'Highlighted Word in Heading', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Pricing',
                'description' => __( 'This word will be wrapped in the accent color class.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Subheading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Transparent, competitive fixed-rate commercial kitchen and plant inspections.',
            ] );

        $this->end_controls_section();

        /* ── Pricing Cards Repeater ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Pricing Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'card_style', [
                'label'   => __( 'Card Style', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => __( 'Default (Light grey)', 'html-to-elementor' ),
                    'featured' => __( 'Featured (White, Electric border, scaled)', 'html-to-elementor' ),
                    'custom'   => __( 'Enterprise (Orange border)', 'html-to-elementor' ),
                ],
            ] );

            $repeater->add_control( 'card_badge', [
                'label'       => __( 'Badge Text (optional)', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '',
                'placeholder' => 'e.g. Most Popular',
            ] );

            $repeater->add_control( 'card_badge_style', [
                'label'     => __( 'Badge Position', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'corner',
                'options'   => [
                    'corner' => __( 'Corner pill (top-right)', 'html-to-elementor' ),
                    'ribbon' => __( 'Ribbon (top-center)', 'html-to-elementor' ),
                ],
                'condition' => [ 'card_badge!' => '' ],
            ] );

            $repeater->add_control( 'card_title', [
                'label'   => __( 'Plan Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '1 Appliance',
            ] );

            $repeater->add_control( 'card_subtitle', [
                'label'   => __( 'Subtitle', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Including Commercial Meter & Pipework',
            ] );

            $repeater->add_control( 'card_price', [
                'label'   => __( 'Price', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£199.99',
            ] );

            $repeater->add_control( 'card_price_suffix', [
                'label'   => __( 'Price Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '+ VAT',
            ] );

            $repeater->add_control( 'card_features', [
                'label'       => __( 'Features (one per line)', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "Digital CP42/CP17\nSame-Day Service\nPipework Soundness",
                'description' => __( 'One feature per line.', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_icon_color', [
                'label'   => __( 'Feature Icon Color', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'text-electric',
                'options' => [
                    'text-electric' => 'Electric (Blue)',
                    'text-orange'   => 'Orange',
                    'text-safety'   => 'Safety (Green)',
                ],
            ] );

            $repeater->add_control( 'card_button_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Select Plan',
            ] );

            $repeater->add_control( 'card_button_style', [
                'label'   => __( 'Button Style', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'outline',
                'options' => [
                    'outline' => __( 'Outline Electric', 'html-to-elementor' ),
                    'solid'   => __( 'Solid Electric fill', 'html-to-elementor' ),
                    'navy'    => __( 'Navy outline', 'html-to-elementor' ),
                ],
            ] );

            $repeater->add_control( 'card_button_link', [
                'label'   => __( 'Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#booking' ],
            ] );

            $this->add_control( 'pricing_cards', [
                'label'       => __( 'Pricing Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'card_style'        => 'default',
                        'card_badge'        => 'Basic',
                        'card_badge_style'  => 'corner',
                        'card_title'        => '1 Appliance',
                        'card_subtitle'     => 'Including Commercial Meter & Pipework',
                        'card_price'        => '£199.99',
                        'card_price_suffix' => '+ VAT',
                        'card_features'     => "Digital CP42/CP17\nSame-Day Service\nPipework Soundness",
                        'card_icon_color'   => 'text-electric',
                        'card_button_text'  => 'Select Plan',
                        'card_button_style' => 'outline',
                    ],
                    [
                        'card_style'        => 'featured',
                        'card_badge'        => 'Most Popular',
                        'card_badge_style'  => 'ribbon',
                        'card_title'        => '2 Appliances',
                        'card_subtitle'     => 'Common setup for small bistros',
                        'card_price'        => '£249.99',
                        'card_price_suffix' => '+ VAT',
                        'card_features'     => "Digital CP42/CP17\nGas Cooker & Fryer\nPipework Integrity",
                        'card_icon_color'   => 'text-electric',
                        'card_button_text'  => 'Select Plan',
                        'card_button_style' => 'solid',
                    ],
                    [
                        'card_style'        => 'default',
                        'card_badge'        => '',
                        'card_badge_style'  => 'corner',
                        'card_title'        => '3 Appliances',
                        'card_subtitle'     => 'Commercial catering kitchens',
                        'card_price'        => '£299.99',
                        'card_price_suffix' => '+ VAT',
                        'card_features'     => "Digital CP42/CP17\nExtraction Interlock\nTechnical Report",
                        'card_icon_color'   => 'text-electric',
                        'card_button_text'  => 'Select Plan',
                        'card_button_style' => 'outline',
                    ],
                    [
                        'card_style'        => 'custom',
                        'card_badge'        => '',
                        'card_badge_style'  => 'corner',
                        'card_title'        => '4+ Appliances',
                        'card_subtitle'     => 'Large kitchens & Industrial sites',
                        'card_price'        => 'Custom Quote',
                        'card_price_suffix' => '',
                        'card_features'     => "Bulk Discounts\nDedicated Account Mgr\nFlexible Scheduling",
                        'card_icon_color'   => 'text-orange',
                        'card_button_text'  => 'Request Quote',
                        'card_button_style' => 'navy',
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ] );

        $this->end_controls_section();

        /* ── Alert Bar ── */
        $this->start_controls_section( 'sec_alert', [
            'label' => __( 'Bottom Alert Bar', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'alert_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Need an Interlock System Check?',
            ] );

            $this->add_control( 'alert_text', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'We certify gas interlock systems for commercial kitchens compliance.',
            ] );

            $this->add_control( 'alert_button_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Call Specialist Engineer',
            ] );

            $this->add_control( 'alert_button_link', [
                'label'   => __( 'Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:02081455369' ],
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        // Highlight word in heading
        $heading   = esc_html( $s['heading'] );
        $highlight = esc_html( $s['heading_highlight'] );
        if ( $highlight && strpos( $heading, $highlight ) !== false ) {
            $heading = str_replace( $highlight, '<span class="text-safety">' . $highlight . '</span>', $heading );
        }

        $alert_url    = esc_url( $s['alert_button_link']['url'] ?? '#' );
        $alert_target = ! empty( $s['alert_button_link']['is_external'] ) ? ' target="_blank"' : '';
        ?>
        <section class="py-24 bg-white relative overflow-hidden" id="pricing">
            <div class="max-w-7xl mx-auto px-4 relative z-10">

                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-black text-navy mb-4"><?php echo wp_kses_post( $heading ); ?></h2>
                    <p class="text-lg text-navy/60 font-medium"><?php echo esc_html( $s['subheading'] ); ?></p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ( $s['pricing_cards'] as $card ) :
                        $features   = array_filter( array_map( 'trim', explode( "\n", $card['card_features'] ) ) );
                        $btn_url    = esc_url( $card['card_button_link']['url'] ?? '#' );
                        $btn_target = ! empty( $card['card_button_link']['is_external'] ) ? ' target="_blank"' : '';
                        $btn_norel  = ! empty( $card['card_button_link']['nofollow'] )    ? ' rel="nofollow"'  : '';

                        if ( $card['card_style'] === 'featured' ) {
                            $card_cls = 'bg-white p-8 rounded-[32px] border-2 border-electric shadow-xl scale-105 transition-all hover:shadow-2xl hover:-translate-y-2 group relative z-20';
                        } elseif ( $card['card_style'] === 'custom' ) {
                            $card_cls = 'bg-light-grey p-8 rounded-[32px] border-2 border-orange/10 transition-all hover:shadow-2xl hover:-translate-y-2 group relative';
                        } else {
                            $card_cls = 'bg-light-grey p-8 rounded-[32px] border border-gray-100 transition-all hover:shadow-2xl hover:-translate-y-2 group relative';
                        }

                        if ( $card['card_button_style'] === 'solid' ) {
                            $btn_cls = 'w-full py-4 bg-electric text-white rounded-2xl font-bold transition-all shadow-lg shadow-electric/20 hover:scale-105 active:scale-95';
                        } elseif ( $card['card_button_style'] === 'navy' ) {
                            $btn_cls = 'w-full py-4 border-2 border-navy text-navy rounded-2xl font-bold transition-all hover:bg-navy hover:text-white';
                        } else {
                            $btn_cls = 'w-full py-4 border-2 border-electric text-electric rounded-2xl font-bold transition-all hover:bg-electric hover:text-white';
                        }
                    ?>
                        <div class="<?php echo $card_cls; ?>">

                            <?php if ( ! empty( $card['card_badge'] ) ) :
                                if ( $card['card_badge_style'] === 'ribbon' ) : ?>
                                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-electric text-white text-[10px] font-black px-6 py-2 rounded-full uppercase shadow-xl">
                                        <?php echo esc_html( $card['card_badge'] ); ?>
                                    </div>
                                <?php else : ?>
                                    <div class="absolute top-6 right-6">
                                        <span class="bg-electric/10 text-electric text-[10px] font-black px-3 py-1 rounded-full uppercase">
                                            <?php echo esc_html( $card['card_badge'] ); ?>
                                        </span>
                                    </div>
                                <?php endif;
                            endif; ?>

                            <?php if ( $card['card_style'] === 'custom' ) : ?>
                                <div class="absolute top-6 right-6">
                                    <i data-lucide="help-circle" class="text-orange w-6 h-6 animate-pulse"></i>
                                </div>
                            <?php endif; ?>

                            <h3 class="font-black text-xl mb-2 <?php echo $card['card_style'] === 'featured' ? 'text-navy' : ''; ?> italic">
                                <?php echo esc_html( $card['card_title'] ); ?>
                            </h3>
                            <p class="text-navy/40 text-sm mb-6"><?php echo esc_html( $card['card_subtitle'] ); ?></p>

                            <div class="flex items-baseline gap-1 mb-8 <?php echo $card['card_style'] !== 'default' ? 'text-navy' : ''; ?>">
                                <span class="<?php echo $card['card_style'] === 'custom' ? 'text-3xl' : 'text-4xl'; ?> font-black italic">
                                    <?php echo esc_html( $card['card_price'] ); ?>
                                </span>
                                <?php if ( ! empty( $card['card_price_suffix'] ) ) : ?>
                                    <span class="text-navy/40 text-xs font-bold"><?php echo esc_html( $card['card_price_suffix'] ); ?></span>
                                <?php endif; ?>
                            </div>

                            <ul class="space-y-4 mb-8 <?php echo $card['card_style'] === 'featured' ? 'text-navy/80' : ''; ?>">
                                <?php foreach ( $features as $feature ) : ?>
                                    <li class="flex items-center gap-3 text-sm font-medium">
                                        <i data-lucide="check-circle" class="w-5 h-5 <?php echo esc_attr( $card['card_icon_color'] ); ?>"></i>
                                        <?php echo esc_html( $feature ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <a class="<?php echo $btn_cls; ?> block text-center"
                               href="<?php echo $btn_url; ?>"
                               <?php echo $btn_target . $btn_norel; ?>>
                                <?php echo esc_html( $card['card_button_text'] ); ?>
                            </a>

                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Alert Bar -->
                <div class="mt-12 bg-safety/5 rounded-3xl p-6 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-safety/20 rounded-full flex items-center justify-center text-safety">
                            <i data-lucide="alert-circle" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="font-bold text-navy"><?php echo esc_html( $s['alert_title'] ); ?></p>
                            <p class="text-sm text-navy/60"><?php echo esc_html( $s['alert_text'] ); ?></p>
                        </div>
                    </div>
                    <a href="<?php echo $alert_url; ?>"
                       class="bg-navy text-white px-8 py-3 rounded-xl font-bold hover:bg-navy/90 transition-all"
                       <?php echo $alert_target; ?>>
                        <?php echo esc_html( $s['alert_button_text'] ); ?>
                    </a>
                </div>

            </div>
        </section>
        <?php
    }
}