<?php
/**
 * Widget: PAT Testing – Trust & Accreditations Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_PAT_Trust extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-trust'; }
    public function get_title()      { return __( 'HTE – PAT: Trust & Accreditations', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-logo'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'trust', 'logos', 'accreditations', 'why choose', 'electrical' ]; }

    protected function register_controls() {

        /* ── Logo Bar ── */
        $this->start_controls_section( 'sec_logos', [
            'label' => __( 'Logo Bar', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $rep = new \Elementor\Repeater();

            $rep->add_control( 'logo_type', [
                'label'   => __( 'Type', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'image' => __( 'Image', 'html-to-elementor' ),
                    'text'  => __( 'Text', 'html-to-elementor' ),
                ],
                'default' => 'image',
            ] );

            $rep->add_control( 'logo_image', [
                'label'     => __( 'Logo Image', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'condition' => [ 'logo_type' => 'image' ],
                'default'   => [ 'url' => '' ],
            ] );

            $rep->add_control( 'logo_alt', [
                'label'     => __( 'Alt / Title Text', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'NICEIC',
            ] );

            $rep->add_control( 'logo_subtitle', [
                'label'     => __( 'Sub-label (text type only)', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Compliant',
                'condition' => [ 'logo_type' => 'text' ],
            ] );

            $this->add_control( 'logos', [
                'label'       => __( 'Logos / Badges', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $rep->get_controls(),
                'default'     => [
                    [ 'logo_type' => 'image', 'logo_alt' => 'NICEIC',        'logo_image' => [ 'url' => 'https://upload.wikimedia.org/wikipedia/en/thumb/3/30/NICEIC_logo.svg/1200px-NICEIC_logo.svg.png' ] ],
                    [ 'logo_type' => 'text',  'logo_alt' => '18th Edition',  'logo_subtitle' => 'Compliant' ],
                    [ 'logo_type' => 'image', 'logo_alt' => 'SafeContractor','logo_image' => [ 'url' => 'https://static.wixstatic.com/media/8933ba_3601831828cb487f9d8544a0e96495ce~mv2.png/v1/fill/w_138,h_53,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/SafeContractor%20Logo.png' ] ],
                    [ 'logo_type' => 'image', 'logo_alt' => 'CHAS',          'logo_image' => [ 'url' => 'https://www.chas.co.uk/wp-content/uploads/2021/04/CHAS-Logo.png' ] ],
                    [ 'logo_type' => 'text',  'logo_alt' => 'Trustpilot',    'logo_subtitle' => '' ],
                ],
                'title_field' => '{{{ logo_alt }}}',
            ] );

        $this->end_controls_section();

        /* ── Why Choose Heading ── */
        $this->start_controls_section( 'sec_why_heading', [
            'label' => __( 'Why Choose – Heading', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'why_heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Why Landlords Prefer EuroSafe — Certified NICEIC, EICR Experts', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Why Choose Items ── */
        $this->start_controls_section( 'sec_why_items', [
            'label' => __( 'Why Choose – Items', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $rep2 = new \Elementor\Repeater();

            $rep2->add_control( 'item_icon', [
                'label'   => __( 'Lucide Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'check-circle-2',
            ] );

            $rep2->add_control( 'item_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Qualified PAT Testers', 'html-to-elementor' ),
            ] );

            $rep2->add_control( 'item_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'City & Guilds 2377 qualified engineers with years of experience in London property safety.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'why_items', [
                'label'       => __( 'Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $rep2->get_controls(),
                'default'     => [
                    [ 'item_icon' => 'check-circle-2', 'item_title' => 'Qualified PAT Testers',  'item_desc' => 'City & Guilds 2377 qualified engineers with years of experience in London property safety.' ],
                    [ 'item_icon' => 'clock',           'item_title' => 'Same-Day Availability', 'item_desc' => 'We understand tight deadlines. Get your digital certificate within hours of the inspection.' ],
                    [ 'item_icon' => 'users',           'item_title' => 'Trusted by 12,000+',    'item_desc' => 'Join the thousands of London landlords and managers who rely on us for their annual compliance.' ],
                ],
                'title_field' => '{{{ item_title }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-12 bg-light-grey border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Logo Bar -->
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 items-center opacity-70 filter grayscale border-b border-gray-200 pb-12 mb-12">
                    <?php foreach ( $s['logos'] as $logo ) : ?>
                        <div class="flex justify-center <?php echo ( 'text' === $logo['logo_type'] ) ? 'flex-col items-center' : ''; ?>">
                            <?php if ( 'image' === $logo['logo_type'] && ! empty( $logo['logo_image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $logo['logo_image']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $logo['logo_alt'] ); ?>"
                                     class="h-10 object-contain">
                            <?php else : ?>
                                <span class="text-xl font-bold text-navy italic"><?php echo esc_html( $logo['logo_alt'] ); ?></span>
                                <?php if ( ! empty( $logo['logo_subtitle'] ) ) : ?>
                                    <span class="text-[10px] uppercase font-bold tracking-widest"><?php echo esc_html( $logo['logo_subtitle'] ); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Why Choose -->
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-navy mb-8"><?php echo esc_html( $s['why_heading'] ); ?></h2>
                    <div class="grid md:grid-cols-3 gap-8 text-left">
                        <?php foreach ( $s['why_items'] as $item ) : ?>
                            <div class="flex gap-4 items-start">
                                <div class="w-12 h-12 bg-white rounded-xl shadow-lg flex items-center justify-center shrink-0 text-electric">
                                    <i data-lucide="<?php echo esc_attr( $item['item_icon'] ); ?>"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-navy mb-1"><?php echo esc_html( $item['item_title'] ); ?></h4>
                                    <p class="text-sm text-navy/60 leading-relaxed"><?php echo esc_html( $item['item_desc'] ); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </section>
        <?php
    }
}