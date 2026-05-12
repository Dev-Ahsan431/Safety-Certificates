<?php
/**
 * Widget: Why PAT Matters – Cards (Section 04)
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Pat_Why_Matters extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-why-matters'; }
    public function get_title()      { return __( 'HTE – Why PAT Matters', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-icon-box'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'compliance', 'safety', 'cards' ]; }

    protected function register_controls() {

        /* ── Section Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Compliance & Safety', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Why PAT Testing London Matters for Your Property', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Subheading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Ensuring your portable appliances are tested isn\'t just about ticking a box—it\'s about comprehensive protection.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Cards Repeater ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'user-check',
            ] );

            $repeater->add_control( 'icon_color', [
                'label'   => __( 'Icon Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-electric',
                'description' => __( 'Tailwind class, e.g. text-electric, text-safety, text-orange', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'icon_bg_color', [
                'label'   => __( 'Icon BG Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'bg-electric/10',
                'description' => __( 'Tailwind class, e.g. bg-electric/10, bg-safety/10, bg-orange/10', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_heading', [
                'label'   => __( 'Card Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tenant Safety', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_text', [
                'label'   => __( 'Card Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Gives your tenants peace of mind that the appliances you provide are safe for daily use.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'cards', [
                'label'       => __( 'Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'icon'          => 'user-check',
                        'icon_color'    => 'text-electric',
                        'icon_bg_color' => 'bg-electric/10',
                        'card_heading'  => __( 'Tenant Safety', 'html-to-elementor' ),
                        'card_text'     => __( 'Gives your tenants peace of mind that the appliances you provide—from kettles to washing machines—are safe for daily use.', 'html-to-elementor' ),
                    ],
                    [
                        'icon'          => 'gavel',
                        'icon_color'    => 'text-safety',
                        'icon_bg_color' => 'bg-safety/10',
                        'card_heading'  => __( 'Legal Compliance', 'html-to-elementor' ),
                        'card_text'     => __( 'Meet your obligations under the Electrical Equipment (Safety) Regulations 1994 and the Landlord and Tenant Act 1985.', 'html-to-elementor' ),
                    ],
                    [
                        'icon'          => 'shield-alert',
                        'icon_color'    => 'text-orange',
                        'icon_bg_color' => 'bg-orange/10',
                        'card_heading'  => __( 'Financial Protection', 'html-to-elementor' ),
                        'card_text'     => __( 'Most insurance policies require evidence of electrical maintenance to validate a claim in the event of a fire.', 'html-to-elementor' ),
                    ],
                ],
                'title_field' => '{{{ card_heading }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-light-grey">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16">
                <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                    <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2">
                        <?php echo esc_html( $s['eyebrow'] ); ?>
                    </h2>
                <?php endif; ?>
                <?php if ( ! empty( $s['heading'] ) ) : ?>
                    <h3 class="text-4xl font-extrabold text-navy mb-6">
                        <?php echo esc_html( $s['heading'] ); ?>
                    </h3>
                <?php endif; ?>
                <?php if ( ! empty( $s['subheading'] ) ) : ?>
                    <p class="text-lg text-navy/60 max-w-2xl mx-auto">
                        <?php echo wp_kses_post( $s['subheading'] ); ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-3 gap-8">
                <?php foreach ( $s['cards'] as $card ) : ?>
                    <div class="bg-white p-8 rounded-[40px] shadow-sm hover:shadow-xl transition-all border border-gray-100 group">
                        <div class="w-16 h-16 <?php echo esc_attr( $card['icon_bg_color'] ); ?> <?php echo esc_attr( $card['icon_color'] ); ?> rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                            <i data-lucide="<?php echo esc_attr( $card['icon'] ); ?>" class="w-8 h-8"></i>
                        </div>
                        <h4 class="text-xl font-bold text-navy mb-4"><?php echo esc_html( $card['card_heading'] ); ?></h4>
                        <p class="text-navy/60 leading-relaxed"><?php echo wp_kses_post( $card['card_text'] ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}