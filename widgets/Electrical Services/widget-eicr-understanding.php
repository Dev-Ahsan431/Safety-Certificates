<?php
/**
 * Widget: EICR Understanding
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Eicr_Understanding extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-eicr-understanding'; }
    public function get_title()      { return __( 'HTE – EICR Understanding', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-info-box'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'eicr', 'overview', 'understanding', 'eicr' ]; }

    protected function register_controls() {

        /* ── Left Column ────────────────────────────────────────────── */
        $this->start_controls_section( 'sec_left', [
            'label' => __( 'Left Column', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Overview', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Understanding EICR and Its Importance', 'html-to-elementor' ),
            ] );

            $this->add_control( 'paragraph_1', [
                'label'   => __( 'Paragraph 1', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '<strong>What is EICR?</strong> Short for Electrical Installation Condition Report, it is a formal document created by a qualified electrician after inspecting a property\'s electrical installations, assessing their safety and compliance with BS 7671 standards.',
            ] );

            $this->add_control( 'paragraph_2', [
                'label'   => __( 'Paragraph 2', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'It is an inspection of fixed wiring, sockets, earthing, consumer units (fuse boxes), and circuits. The EICR identifies defects, risks, and non-compliance, ensuring your property is safe for occupants.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Benefits Box ───────────────────────────────────────────── */
        $this->start_controls_section( 'sec_benefits', [
            'label' => __( 'Benefits Box', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'benefits_icon', [
                'label'   => __( 'Box Icon (Lucide)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'shield-check',
            ] );

            $this->add_control( 'benefits_heading', [
                'label'   => __( 'Box Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Benefits of EICR', 'html-to-elementor' ),
            ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'benefit_text', [
                'label'   => __( 'Benefit', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Benefit item', 'html-to-elementor' ),
            ] );

            $this->add_control( 'benefits_list', [
                'label'       => __( 'Benefits', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'benefit_text' => 'Ensures the safety of tenants and property.' ],
                    [ 'benefit_text' => 'Prevents fire hazards and electric shocks.' ],
                    [ 'benefit_text' => 'Keeps you legally compliant with UK/EU regulations.' ],
                    [ 'benefit_text' => 'Validates your property insurance policies.' ],
                ],
                'title_field' => '{{{ benefit_text }}}',
            ] );

        $this->end_controls_section();

        /* ── Right Dark Card ────────────────────────────────────────── */
        $this->start_controls_section( 'sec_right', [
            'label' => __( 'Right Card', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'card_heading', [
                'label'   => __( 'Card Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'What Does an EICR Cover?', 'html-to-elementor' ),
            ] );

            $repeater2 = new \Elementor\Repeater();

            $repeater2->add_control( 'item_icon', [
                'label'   => __( 'Icon (Lucide)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'zap',
            ] );

            $repeater2->add_control( 'item_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Item Title', 'html-to-elementor' ),
            ] );

            $repeater2->add_control( 'item_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Item description here.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'cover_items', [
                'label'       => __( 'Cover Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater2->get_controls(),
                'default'     => [
                    [ 'item_icon' => 'server',       'item_title' => 'Consumer Units',   'item_desc' => 'Inspection of fuse boxes and circuit breakers.' ],
                    [ 'item_icon' => 'cable',        'item_title' => 'Wiring Systems',   'item_desc' => 'Checking for wear, damage, or degradation.' ],
                    [ 'item_icon' => 'plug',         'item_title' => 'Sockets & Switches','item_desc' => 'Testing all light fittings and power outlets.' ],
                    [ 'item_icon' => 'zap',          'item_title' => 'Earthing & RCDs',  'item_desc' => 'Ensuring bonding safety and RCD functionality.' ],
                ],
                'title_field' => '{{{ item_title }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white relative z-10 -mt-10 lg:-mt-16 mx-4 sm:mx-6 lg:mx-8 rounded-3xl shadow-xl max-w-7xl xl:mx-auto fade-in border border-gray-100">
            <div class="px-6 lg:px-12 grid lg:grid-cols-2 gap-12 items-center">

                <!-- Left Column -->
                <div>
                    <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                        <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['heading'] ) ) : ?>
                        <h3 class="text-3xl font-bold text-navy mb-6"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['paragraph_1'] ) ) : ?>
                        <p class="text-navy/70 mb-6 leading-relaxed"><?php echo wp_kses_post( $s['paragraph_1'] ); ?></p>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['paragraph_2'] ) ) : ?>
                        <p class="text-navy/70 mb-6 leading-relaxed"><?php echo esc_html( $s['paragraph_2'] ); ?></p>
                    <?php endif; ?>

                    <!-- Benefits Box -->
                    <div class="bg-light-grey p-6 rounded-2xl border border-gray-100">
                        <h4 class="font-bold text-navy mb-3 flex items-center gap-2">
                            <?php if ( ! empty( $s['benefits_icon'] ) ) : ?>
                                <i data-lucide="<?php echo esc_attr( $s['benefits_icon'] ); ?>" class="text-safety"></i>
                            <?php endif; ?>
                            <?php echo esc_html( $s['benefits_heading'] ); ?>
                        </h4>
                        <?php if ( ! empty( $s['benefits_list'] ) ) : ?>
                        <ul class="space-y-2 text-sm text-navy/70">
                            <?php foreach ( $s['benefits_list'] as $item ) : ?>
                                <li class="flex items-start gap-2">
                                    <span class="text-safety">✓</span>
                                    <?php echo esc_html( $item['benefit_text'] ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right Dark Card -->
                <div class="bg-navy text-white p-8 lg:p-10 rounded-3xl shadow-lg relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-electric rounded-full mix-blend-screen filter blur-[80px] opacity-20"></div>

                    <?php if ( ! empty( $s['card_heading'] ) ) : ?>
                        <h4 class="text-2xl font-bold mb-6 relative z-10"><?php echo esc_html( $s['card_heading'] ); ?></h4>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['cover_items'] ) ) : ?>
                    <ul class="space-y-6 relative z-10">
                        <?php foreach ( $s['cover_items'] as $item ) : ?>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0 text-electric">
                                    <i data-lucide="<?php echo esc_attr( $item['item_icon'] ); ?>"></i>
                                </div>
                                <div>
                                    <strong class="block text-lg"><?php echo esc_html( $item['item_title'] ); ?></strong>
                                    <span class="text-white/60 text-sm"><?php echo esc_html( $item['item_desc'] ); ?></span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>

            </div>
        </section>
        <?php
    }
}
