<?php
/**
 * Widget: Final CTA with Trust Logos
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Commercial_Gas_Cta_Final extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-commercial-gas-cta-final'; }
    public function get_title()      { return __( 'HTE – Final CTA', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-call-to-action'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'cta', 'call to action', 'booking', 'final', 'Commercial Gas Cta Final' ]; }

    protected function register_controls() {

        /* ── Badge ── */
        $this->start_controls_section( 'sec_badge', [
            'label' => __( 'Top Badge', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Compliance Deadline Ticking?', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Heading ── */
        $this->start_controls_section( 'sec_heading', [
            'label' => __( 'Heading', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book Your Commercial', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted Word(s)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Gas Certificate', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_after', [
                'label'   => __( 'Heading – After Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Today', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Buttons ── */
        $this->start_controls_section( 'sec_buttons', [
            'label' => __( 'Buttons', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'primary_btn_text', [
                'label'   => __( 'Primary Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book Now £199.99', 'html-to-elementor' ),
            ] );

            $this->add_control( 'primary_btn_link', [
                'label'         => __( 'Primary Button Link', 'html-to-elementor' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'default'       => [ 'url' => '#booking' ],
                'show_external' => true,
            ] );

            $this->add_control( 'secondary_btn_text', [
                'label'   => __( 'Secondary Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '020 8145 5369', 'html-to-elementor' ),
            ] );

            $this->add_control( 'secondary_btn_link', [
                'label'         => __( 'Secondary Button Link (tel:)', 'html-to-elementor' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'default'       => [ 'url' => 'tel:+442081455369' ],
                'show_external' => false,
            ] );

        $this->end_controls_section();

        /* ── Trust Logos Repeater ── */
        $this->start_controls_section( 'sec_logos', [
            'label' => __( 'Trust Logos', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'logo_type', [
                'label'   => __( 'Logo Type', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'image' => __( 'Image', 'html-to-elementor' ),
                    'text'  => __( 'Text / Icon', 'html-to-elementor' ),
                ],
                'default' => 'image',
            ] );

            $repeater->add_control( 'logo_image', [
                'label'     => __( 'Logo Image', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::MEDIA,
                'default'   => [ 'url' => 'https://gas-safe-register.com/media/2513/gas-safe-logo.svg' ],
                'condition' => [ 'logo_type' => 'image' ],
            ] );

            $repeater->add_control( 'logo_image_alt', [
                'label'     => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'Trust Logo', 'html-to-elementor' ),
                'condition' => [ 'logo_type' => 'image' ],
            ] );

            $repeater->add_control( 'logo_invert', [
                'label'        => __( 'Invert Image (white on dark bg)', 'html-to-elementor' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'html-to-elementor' ),
                'label_off'    => __( 'No', 'html-to-elementor' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [ 'logo_type' => 'image' ],
            ] );

            $repeater->add_control( 'logo_icon', [
                'label'     => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'star',
                'condition' => [ 'logo_type' => 'text' ],
            ] );

            $repeater->add_control( 'logo_text', [
                'label'     => __( 'Logo Text', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Trustpilot',
                'condition' => [ 'logo_type' => 'text' ],
            ] );

            $this->add_control( 'logos', [
                'label'       => __( 'Trust Logos', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'logo_type'      => 'image',
                        'logo_image'     => [ 'url' => 'https://gas-safe-register.com/media/2513/gas-safe-logo.svg' ],
                        'logo_image_alt' => 'Gas Safe',
                        'logo_invert'    => 'yes',
                    ],
                    [
                        'logo_type' => 'text',
                        'logo_icon' => 'star',
                        'logo_text' => 'Trustpilot',
                    ],
                ],
                'title_field' => '{{{ logo_type === "image" ? logo_image_alt : logo_text }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $pri_target = ! empty( $s['primary_btn_link']['is_external'] )   ? ' target="_blank"' : '';
        $pri_norel  = ! empty( $s['primary_btn_link']['nofollow'] )       ? ' rel="nofollow"'  : '';
        $sec_target = ! empty( $s['secondary_btn_link']['is_external'] )  ? ' target="_blank"' : '';
        $sec_norel  = ! empty( $s['secondary_btn_link']['nofollow'] )     ? ' rel="nofollow"'  : '';
        ?>
        <section class="py-24 bg-navy relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full bg-safety/5"></div>

            <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">

                <!-- Badge -->
                <?php if ( ! empty( $s['badge_text'] ) ) : ?>
                    <div class="inline-block bg-white/5 border border-white/10 px-6 py-2 rounded-full text-white/60 text-sm font-bold mb-8 uppercase tracking-widest">
                        <?php echo esc_html( $s['badge_text'] ); ?>
                    </div>
                <?php endif; ?>

                <!-- Heading -->
                <h2 class="text-5xl lg:text-7xl font-black text-white mb-10 leading-tight">
                    <?php echo esc_html( $s['heading_before'] ); ?>
                    <?php if ( ! empty( $s['heading_highlight'] ) ) : ?>
                        <span class="text-safety"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['heading_after'] ) ) : ?>
                        <?php echo ' ' . esc_html( $s['heading_after'] ); ?>
                    <?php endif; ?>
                </h2>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <?php if ( ! empty( $s['primary_btn_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $s['primary_btn_link']['url'] ); ?>"
                           class="bg-orange hover:bg-orange/90 text-white px-12 py-6 rounded-[30px] font-black text-2xl transition-all transform hover:scale-105 shadow-2xl shadow-orange/20"
                           <?php echo $pri_target . $pri_norel; ?>>
                            <?php echo esc_html( $s['primary_btn_text'] ); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['secondary_btn_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $s['secondary_btn_link']['url'] ); ?>"
                           class="bg-navy text-white px-12 py-6 rounded-[30px] font-bold text-2xl transition-all transform hover:scale-105 border border-white/10 shadow-2xl"
                           <?php echo $sec_target . $sec_norel; ?>>
                            <?php echo esc_html( $s['secondary_btn_text'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Trust Logos -->
                <?php if ( ! empty( $s['logos'] ) ) : ?>
                    <div class="mt-16 flex flex-wrap justify-center items-center gap-10">
                        <?php foreach ( $s['logos'] as $logo ) : ?>
                            <div class="bg-white/10 backdrop-blur-md p-4 rounded-xl border border-white/20 transition-all hover:bg-white/20 group">
                                <?php if ( $logo['logo_type'] === 'image' && ! empty( $logo['logo_image']['url'] ) ) : ?>
                                    <?php
                                    $invert_class = ( $logo['logo_invert'] === 'yes' )
                                        ? 'brightness-0 invert group-hover:invert-0 group-hover:brightness-100'
                                        : '';
                                    ?>
                                    <img src="<?php echo esc_url( $logo['logo_image']['url'] ); ?>"
                                         alt="<?php echo esc_attr( $logo['logo_image_alt'] ); ?>"
                                         class="h-10 transition-all <?php echo esc_attr( $invert_class ); ?>">
                                <?php elseif ( $logo['logo_type'] === 'text' ) : ?>
                                    <div class="flex items-center gap-2">
                                        <?php if ( ! empty( $logo['logo_icon'] ) ) : ?>
                                            <i data-lucide="<?php echo esc_attr( $logo['logo_icon'] ); ?>" class="w-6 h-6 text-safety fill-current"></i>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $logo['logo_text'] ) ) : ?>
                                            <span class="text-2xl font-black italic tracking-tighter text-white">
                                                <?php echo esc_html( $logo['logo_text'] ); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
    }
}