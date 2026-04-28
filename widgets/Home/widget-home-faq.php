<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Home_Faq extends \Elementor\Widget_Base {

    public function get_name() { return 'home_faq'; }
    public function get_title() { return __( 'Home – FAQ', 'plugin-name' ); }
    public function get_icon() { return 'eicon-accordion'; }
    public function get_categories() { return [ 'general' ]; }

    protected function _register_controls() {

        /* ── SECTION HEADER ── */
        $this->start_controls_section( 'section_header', [ 'label' => __( 'Section Header', 'plugin-name' ) ] );
            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'FAQ',
            ] );
            $this->add_control( 'title', [
                'label'   => __( 'Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Common Questions',
            ] );
        $this->end_controls_section();

        /* ── FAQ ITEMS ── */
        $this->start_controls_section( 'section_faqs', [ 'label' => __( 'FAQ Items', 'plugin-name' ) ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'faq_question', [
                'label'   => __( 'Question', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'What is an EICR and is it mandatory?',
            ] );
            $repeater->add_control( 'faq_answer', [
                'label'   => __( 'Answer', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'An Electrical Installation Condition Report (EICR) is an in-depth inspection of your property\'s electrical systems. Yes, it is legally mandatory for all landlords in the UK/EU to have a valid EICR renewed every 5 years or at the start of a new tenancy.',
            ] );
            $this->add_control( 'faq_items', [
                'label'       => __( 'FAQs', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'faq_question' => 'What is an EICR and is it mandatory?',
                        'faq_answer'   => "An Electrical Installation Condition Report (EICR) is an in-depth inspection of your property's electrical systems. Yes, it is legally mandatory for all landlords in the UK/EU to have a valid EICR renewed every 5 years or at the start of a new tenancy.",
                    ],
                    [
                        'faq_question' => 'How long does an inspection take?',
                        'faq_answer'   => 'Most standard residential inspections (like Gas Safety or EPC) take between 30 to 60 minutes. An EICR might take 1 to 3 hours depending on the size of the property and the complexity of the electrical installation.',
                    ],
                    [
                        'faq_question' => 'When will I receive my certificate?',
                        'faq_answer'   => 'We pride ourselves on speed. In 98% of cases, you will receive your digital, legally-binding certificate via email within 24 to 48 hours after the inspection is completed.',
                    ],
                ],
                'title_field' => '{{{ faq_question }}}',
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section id="faq" class="py-24 bg-light-grey">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center mb-16 fade-in">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['title'] ); ?></h3>
                </div>

                <!-- Accordion -->
                <div class="space-y-4 fade-in">
                    <?php foreach ( $s['faq_items'] as $item ) : ?>
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden transition-all hover:border-electric/30">
                        <button class="faq-btn w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none">
                            <span class="font-bold text-navy text-lg"><?php echo esc_html( $item['faq_question'] ); ?></span>
                            <i data-lucide="chevron-down" class="faq-icon text-navy/50 transition-transform duration-300"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-5 text-navy/70">
                            <?php echo wp_kses_post( $item['faq_answer'] ); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}
