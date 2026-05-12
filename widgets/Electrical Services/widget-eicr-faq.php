<?php
/**
 * Widget: EICR FAQ
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Eicr_Faq extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-eicr-faq'; }
    public function get_title()      { return __( 'HTE – EICR FAQ', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-toggle'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'faq', 'accordion', 'questions', 'eicr' ]; }

    protected function register_controls() {

        /* ── Section Header ─────────────────────────────────────────── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'FAQ', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Electrical Safety Questions', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── FAQ Items ──────────────────────────────────────────────── */
        $this->start_controls_section( 'sec_faqs', [
            'label' => __( 'FAQ Items', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'faq_question', [
                'label'   => __( 'Question', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'FAQ Question?', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'faq_answer', [
                'label'   => __( 'Answer', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'FAQ Answer goes here.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'faqs', [
                'label'       => __( 'FAQ Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'faq_question' => 'How often do landlords need to conduct electrical safety checks?',
                        'faq_answer'   => 'Every rental property must undergo an EICR once every 5 years. Landlords must hire a qualified electrician to inspect the fixed wiring and provide a report confirming safety or outlining necessary remedial works.',
                    ],
                    [
                        'faq_question' => 'Who is qualified to perform electrical safety tests?',
                        'faq_answer'   => 'Only qualified and competent persons, such as registered electricians (e.g., NICEIC or NAPIT approved), are legally allowed to perform EICR inspections and issue valid certificates.',
                    ],
                    [
                        'faq_question' => 'How do inspections protect landlords and tenants?',
                        'faq_answer'   => 'For tenants, it ensures they are living in a safe environment free from shock and fire hazards. For landlords, it protects their investment from damage, validates their insurance, and shields them from legal liability and heavy fines.',
                    ],
                ],
                'title_field' => '{{{ faq_question }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-16 fade-in">
                    <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                        <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['heading'] ) ) : ?>
                        <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <?php endif; ?>
                </div>

                <?php if ( ! empty( $s['faqs'] ) ) : ?>
                <div class="space-y-4 fade-in">
                    <?php foreach ( $s['faqs'] as $index => $item ) :
                        $uid = 'faq-' . $this->get_id() . '-' . $index;
                    ?>
                        <div class="bg-light-grey border border-gray-200 rounded-2xl overflow-hidden transition-all hover:border-electric/30">
                            <button class="faq-btn w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none"
                                    aria-expanded="false"
                                    aria-controls="<?php echo esc_attr( $uid ); ?>">
                                <span class="font-bold text-navy text-lg"><?php echo esc_html( $item['faq_question'] ); ?></span>
                                <i data-lucide="chevron-down" class="faq-icon text-navy/50 transition-transform duration-300"></i>
                            </button>
                            <div id="<?php echo esc_attr( $uid ); ?>"
                                 class="faq-content hidden px-6 pb-5 text-navy/70">
                                <?php echo esc_html( $item['faq_answer'] ); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
    }
}
