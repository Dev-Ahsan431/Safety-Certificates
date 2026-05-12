<?php
/**
 * Widget: Commercial Gas Certificate Context
 * (CP42/CP17 info blocks + legal box left | image with floating badges right)
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Commercial_Gas_Service_Context extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-gas-service-context'; }
    public function get_title()      { return __( 'HTE – Gas Service Context', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-info-box'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'gas', 'certificate', 'cp42', 'cp17', 'context', 'commercial' ]; }

    protected function register_controls() {

        /* ── Heading ── */
        $this->start_controls_section( 'sec_heading', [
            'label' => __( 'Heading', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'What Exactly is a Commercial Gas Certificate?',
            ] );

            $this->add_control( 'heading_highlight', [
                'label'       => __( 'Highlighted Phrase', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Commercial Gas',
                'description' => __( 'This phrase will be wrapped in the accent color.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Certificate Type Blocks ── */
        $this->start_controls_section( 'sec_cert_blocks', [
            'label' => __( 'Certificate Type Blocks', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'cert_code', [
                'label'   => __( 'Code Label (e.g. CP42)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'CP42',
            ] );

            $repeater->add_control( 'cert_code_color', [
                'label'   => __( 'Code Color Classes', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'bg-safety/10 text-safety',
                'options' => [
                    'bg-safety/10 text-safety'   => 'Safety (Green)',
                    'bg-electric/10 text-electric' => 'Electric (Blue)',
                    'bg-orange/10 text-orange'    => 'Orange',
                ],
            ] );

            $repeater->add_control( 'cert_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Commercial Catering Report',
            ] );

            $repeater->add_control( 'cert_text', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Mandatory for any business serving food cooked via gas appliances. It covers the safety of the cooking equipment and the essential extraction/ventilation systems.',
            ] );

            $this->add_control( 'cert_blocks', [
                'label'       => __( 'Certificate Blocks', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'cert_code'       => 'CP42',
                        'cert_code_color' => 'bg-safety/10 text-safety',
                        'cert_title'      => 'Commercial Catering Report',
                        'cert_text'       => 'Mandatory for any business serving food cooked via gas appliances. It covers the safety of the cooking equipment and the essential extraction/ventilation systems.',
                    ],
                    [
                        'cert_code'       => 'CP17',
                        'cert_code_color' => 'bg-electric/10 text-electric',
                        'cert_title'      => 'Commercial Gas Installation Report',
                        'cert_text'       => 'Required for commercial premises with non-catering gas installations, such as central heating boilers over 70kW, heaters in offices, schools, and care homes.',
                    ],
                ],
                'title_field' => '{{{ cert_code }}} – {{{ cert_title }}}',
            ] );

        $this->end_controls_section();

        /* ── Legal Box ── */
        $this->start_controls_section( 'sec_legal', [
            'label' => __( 'Legal Info Box', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'legal_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Legal Requirement',
            ] );

            $this->add_control( 'legal_text', [
                'label'   => __( 'Text (HTML allowed)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'As a business owner or landlord of commercial premises, the <strong>Gas Safety (Installation and Use) Regulations 1998</strong> mandate that you keep your gas appliances and pipework safe. Failure to provide a valid certificate can lead to heavy fines or insurance invalidation.',
            ] );

            $this->add_control( 'legal_button_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Expert Advice',
            ] );

            $this->add_control( 'legal_button_link', [
                'label'   => __( 'Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );

        $this->end_controls_section();

        /* ── Image Column ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Image & Floating Elements', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'image', [
                'label'   => __( 'Main Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
            ] );

            $this->add_control( 'image_alt', [
                'label'   => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Restaurant Kitchen',
            ] );

            $this->add_control( 'badge_line1', [
                'label'   => __( 'Circular Badge – Line 1 (small)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Serving',
            ] );

            $this->add_control( 'badge_line2', [
                'label'   => __( 'Circular Badge – Line 2 (large)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'London',
            ] );

            $this->add_control( 'badge_line3', [
                'label'   => __( 'Circular Badge – Line 3 (small)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Since 2012',
            ] );

            $this->add_control( 'review_text', [
                'label'   => __( 'Review Quote', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '"Extremely thorough. They even checked our gas interlock which others missed."',
            ] );

            $this->add_control( 'reviewer_initials', [
                'label'   => __( 'Reviewer Initials', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'JW',
            ] );

            $this->add_control( 'reviewer_name', [
                'label'   => __( 'Reviewer Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'James W.',
            ] );

            $this->add_control( 'reviewer_role', [
                'label'   => __( 'Reviewer Role / Company', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Hotel Manager',
            ] );

            $this->add_control( 'review_stars', [
                'label'   => __( 'Star Rating (1–5)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 5,
                'default' => 5,
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $heading   = esc_html( $s['heading'] );
        $highlight = esc_html( $s['heading_highlight'] );
        if ( $highlight && strpos( $heading, $highlight ) !== false ) {
            $heading = str_replace( $highlight, '<span class="text-safety">' . $highlight . '</span>', $heading );
        }

        $btn_url    = esc_url( $s['legal_button_link']['url'] ?? '#' );
        $btn_target = ! empty( $s['legal_button_link']['is_external'] ) ? ' target="_blank"' : '';
        $btn_norel  = ! empty( $s['legal_button_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        $stars      = intval( $s['review_stars'] );
        ?>
        <section class="py-24 bg-light-grey">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left Column -->
                    <div>
                        <h2 class="text-4xl font-black text-navy mb-8 leading-tight"><?php echo wp_kses_post( $heading ); ?></h2>

                        <div class="space-y-6">
                            <?php foreach ( $s['cert_blocks'] as $block ) : ?>
                                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 transition-all hover:shadow-md">
                                    <div class="flex items-start gap-4">
                                        <div class="<?php echo esc_attr( $block['cert_code_color'] ); ?> p-3 rounded-xl font-bold">
                                            <?php echo esc_html( $block['cert_code'] ); ?>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-lg mb-2"><?php echo esc_html( $block['cert_title'] ); ?></h4>
                                            <p class="text-navy/60 text-sm leading-relaxed"><?php echo wp_kses_post( $block['cert_text'] ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Legal Box -->
                        <div class="mt-8 p-6 bg-navy text-white rounded-[32px]">
                            <h4 class="font-bold mb-4 flex items-center gap-2 italic">
                                <i data-lucide="info" class="text-safety w-5 h-5"></i>
                                <?php echo esc_html( $s['legal_title'] ); ?>
                            </h4>
                            <div class="text-sm text-white/70 leading-relaxed mb-4 italic">
                                <?php echo wp_kses_post( $s['legal_text'] ); ?>
                            </div>
                            <?php if ( ! empty( $s['legal_button_text'] ) ) : ?>
                                <a href="<?php echo $btn_url; ?>"
                                   class="bg-white text-navy px-6 py-2 rounded-lg font-bold text-sm tracking-tight active:scale-95 transition-transform uppercase italic inline-block"
                                   <?php echo $btn_target . $btn_norel; ?>>
                                    <?php echo esc_html( $s['legal_button_text'] ); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <div class="relative">
                            <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $s['image']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $s['image_alt'] ); ?>"
                                     class="rounded-[40px] shadow-2xl relative z-10 w-full h-auto">
                            <?php endif; ?>

                            <!-- Circular Badge -->
                            <div class="absolute -top-12 -right-4 lg:-right-8 w-40 h-40 bg-safety text-navy rounded-full flex flex-col items-center justify-center p-6 text-center shadow-2xl z-20 transition-transform duration-500 hover:rotate-6">
                                <div class="text-[10px] font-black uppercase tracking-widest leading-none mb-1">
                                    <?php echo esc_html( $s['badge_line1'] ); ?>
                                </div>
                                <div class="text-2xl font-black italic tracking-tighter leading-none mb-1 text-navy">
                                    <?php echo esc_html( $s['badge_line2'] ); ?>
                                </div>
                                <div class="text-[10px] font-bold uppercase tracking-widest leading-none">
                                    <?php echo esc_html( $s['badge_line3'] ); ?>
                                </div>
                            </div>

                            <!-- Review Card -->
                            <div class="absolute -bottom-8 -left-4 lg:-left-8 glass p-6 rounded-[32px] shadow-2xl border border-white/40 z-20 w-[90%] sm:max-w-xs transition-all hover:scale-105 duration-500">
                                <div class="flex gap-1 text-orange mb-3">
                                    <?php for ( $i = 0; $i < $stars; $i++ ) : ?>
                                        <i data-lucide="star" class="w-3 h-3 fill-current border-none"></i>
                                    <?php endfor; ?>
                                </div>
                                <p class="text-navy font-bold text-sm mb-4 leading-relaxed italic">
                                    <?php echo esc_html( $s['review_text'] ); ?>
                                </p>
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-electric text-white rounded-full flex items-center justify-center font-bold text-xs ring-4 ring-electric/10">
                                        <?php echo esc_html( $s['reviewer_initials'] ); ?>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-black text-navy italic"><?php echo esc_html( $s['reviewer_name'] ); ?></span>
                                        <span class="text-[10px] font-bold text-navy/40 uppercase tracking-wider"><?php echo esc_html( $s['reviewer_role'] ); ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}