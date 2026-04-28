<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Home_Testimonials extends \Elementor\Widget_Base {

    public function get_name() { return 'home_testimonials'; }
    public function get_title() { return __( 'Home – Testimonials', 'plugin-name' ); }
    public function get_icon() { return 'eicon-testimonial'; }
    public function get_categories() { return [ 'general' ]; }

    protected function _register_controls() {

        /* ── SECTION HEADER ── */
        $this->start_controls_section( 'section_header', [ 'label' => __( 'Section Header', 'plugin-name' ) ] );
            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Testimonials & Feedback',
            ] );
            $this->add_control( 'title', [
                'label'   => __( 'Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Trusted by Property Professionals',
            ] );
            $this->add_control( 'description', [
                'label'   => __( 'Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Don't just take our word for it. See what our clients have to say about our fast and reliable service.",
            ] );
        $this->end_controls_section();

        /* ── TESTIMONIAL CARDS ── */
        $this->start_controls_section( 'section_cards', [ 'label' => __( 'Testimonials', 'plugin-name' ) ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'avatar_url', [
                'label'   => __( 'Avatar Image URL', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://i.pravatar.cc/150?img=32',
            ] );
            $repeater->add_control( 'reviewer_name', [
                'label'   => __( 'Name', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Sarah Jenkins',
            ] );
            $repeater->add_control( 'reviewer_role', [
                'label'   => __( 'Role / Company', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Private Landlord',
            ] );
            $repeater->add_control( 'stars', [
                'label'   => __( 'Stars (1–5)', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 5,
                'default' => 5,
            ] );
            $repeater->add_control( 'quote', [
                'label'   => __( 'Quote', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Incredibly fast service. I needed an EICR and Gas Safety certificate urgently for a new tenant. EuroSafe had an engineer out the next morning and the certificates in my inbox by the evening.',
            ] );
            $this->add_control( 'testimonials', [
                'label'       => __( 'Testimonials', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'avatar_url'    => 'https://i.pravatar.cc/150?img=32',
                        'reviewer_name' => 'Sarah Jenkins',
                        'reviewer_role' => 'Private Landlord',
                        'stars'         => 5,
                        'quote'         => 'Incredibly fast service. I needed an EICR and Gas Safety certificate urgently for a new tenant. EuroSafe had an engineer out the next morning and the certificates in my inbox by the evening.',
                    ],
                    [
                        'avatar_url'    => 'https://i.pravatar.cc/150?img=11',
                        'reviewer_name' => 'David Chen',
                        'reviewer_role' => 'Property Manager, Apex Estates',
                        'stars'         => 5,
                        'quote'         => "Managing a portfolio of 40+ properties used to be a compliance nightmare. EuroSafe's bundle packages and automated reminders have saved us countless hours and reduced our costs.",
                    ],
                    [
                        'avatar_url'    => 'https://i.pravatar.cc/150?img=44',
                        'reviewer_name' => 'Emma Thompson',
                        'reviewer_role' => 'Homeowner',
                        'stars'         => 5,
                        'quote'         => "Very professional engineers. They explained everything clearly, didn't leave any mess, and the final report was easy to understand without technical jargon. Highly recommended.",
                    ],
                ],
                'title_field' => '{{{ reviewer_name }}}',
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['title'] ); ?></h3>
                    <p class="text-lg text-navy/70"><?php echo esc_html( $s['description'] ); ?></p>
                </div>

                <!-- Cards -->
                <div class="grid md:grid-cols-3 gap-8">
                    <?php foreach ( $s['testimonials'] as $t ) :
                        $stars = (int) $t['stars'];
                    ?>
                    <div class="bg-light-grey rounded-3xl p-8 relative mt-8 fade-in border border-gray-100 hover:shadow-xl transition-shadow">
                        <!-- Avatar -->
                        <div class="absolute -top-8 left-8 w-16 h-16 rounded-full border-4 border-white overflow-hidden shadow-lg">
                            <img src="<?php echo esc_url( $t['avatar_url'] ); ?>"
                                 alt="<?php echo esc_attr( $t['reviewer_name'] ); ?>"
                                 class="w-full h-full object-cover"
                                 referrerpolicy="no-referrer">
                        </div>
                        <!-- Stars -->
                        <div class="flex text-orange mb-4 mt-6">
                            <?php for ( $i = 0; $i < $stars; $i++ ) : ?>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                            <?php endfor; ?>
                        </div>
                        <!-- Quote -->
                        <p class="text-navy/80 italic mb-6">"<?php echo esc_html( $t['quote'] ); ?>"</p>
                        <!-- Name & role -->
                        <div>
                            <h4 class="font-bold text-navy"><?php echo esc_html( $t['reviewer_name'] ); ?></h4>
                            <p class="text-sm text-navy/60"><?php echo esc_html( $t['reviewer_role'] ); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}
