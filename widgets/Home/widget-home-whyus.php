<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Home_Whyus extends \Elementor\Widget_Base {

    public function get_name() { return 'home_whyus'; }
    public function get_title() { return __( 'Home – Why Choose Us', 'plugin-name' ); }
    public function get_icon() { return 'eicon-check-circle'; }
    public function get_categories() { return [ 'general' ]; }

    protected function _register_controls() {

        /* ── LEFT COLUMN ── */
        $this->start_controls_section( 'section_left', [ 'label' => __( 'Left Column', 'plugin-name' ) ] );
            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Why Choose EuroSafe',
            ] );
            $this->add_control( 'title', [
                'label'   => __( 'Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'The Smart Way to Stay Compliant',
            ] );
            $this->add_control( 'description', [
                'label'   => __( 'Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "We've stripped away the complexity of property compliance. No more chasing multiple contractors, waiting weeks for reports, or dealing with confusing jargon.",
            ] );
        $this->end_controls_section();

        /* ── USP ITEMS ── */
        $this->start_controls_section( 'section_usps', [ 'label' => __( 'USP Items', 'plugin-name' ) ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'usp_icon', [
                'label'   => __( 'Lucide Icon Name', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'award',
            ] );
            $repeater->add_control( 'usp_title', [
                'label'   => __( 'Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Certified Engineers',
            ] );
            $repeater->add_control( 'usp_description', [
                'label'   => __( 'Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'All our inspectors are fully vetted, insured, and registered with relevant industry bodies.',
            ] );
            $this->add_control( 'usps', [
                'label'       => __( 'USPs', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'usp_icon' => 'award',         'usp_title' => 'Certified Engineers',   'usp_description' => 'All our inspectors are fully vetted, insured, and registered with relevant industry bodies.' ],
                    [ 'usp_icon' => 'clock',          'usp_title' => '24-48h Turnaround',     'usp_description' => 'We know speed matters. Get your digital certificates delivered to your inbox within 48 hours.' ],
                    [ 'usp_icon' => 'banknote',       'usp_title' => 'Transparent Pricing',   'usp_description' => 'No hidden fees or surprise charges. The price you are quoted is exactly the price you pay.' ],
                    [ 'usp_icon' => 'shield-check',   'usp_title' => '100% Compliant',        'usp_description' => 'Our reports are legally binding and guaranteed to meet all current European and local regulations.' ],
                ],
                'title_field' => '{{{ usp_title }}}',
            ] );
        $this->end_controls_section();

        /* ── RIGHT COLUMN (image) ── */
        $this->start_controls_section( 'section_image', [ 'label' => __( 'Right Column – Image', 'plugin-name' ) ] );
            $this->add_control( 'inspector_image', [
                'label'   => __( 'Inspector Image', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://picsum.photos/seed/inspector/800/1000' ],
            ] );
            $this->add_control( 'image_alt', [
                'label'   => __( 'Image Alt Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Professional Inspector',
            ] );
            $this->add_control( 'stat_value', [
                'label'   => __( 'Stat Badge Value', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '98%',
            ] );
            $this->add_control( 'stat_title', [
                'label'   => __( 'Stat Badge Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'First-Time Pass Rate',
            ] );
            $this->add_control( 'stat_subtitle', [
                'label'   => __( 'Stat Badge Subtitle', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'For properties following our prep guide',
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $img_url = ! empty( $s['inspector_image']['url'] ) ? esc_url( $s['inspector_image']['url'] ) : 'https://picsum.photos/seed/inspector/800/1000';
        ?>
        <section id="why-us" class="py-24 bg-navy text-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- LEFT: Copy & USPs -->
                    <div>
                        <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                        <h3 class="text-4xl font-bold mb-6"><?php echo esc_html( $s['title'] ); ?></h3>
                        <p class="text-lg text-white/70 mb-8"><?php echo esc_html( $s['description'] ); ?></p>

                        <div class="space-y-8">
                            <?php foreach ( $s['usps'] as $usp ) : ?>
                            <div class="flex gap-4 slide-in-left">
                                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-electric">
                                    <i data-lucide="<?php echo esc_attr( $usp['usp_icon'] ); ?>"></i>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold mb-2"><?php echo esc_html( $usp['usp_title'] ); ?></h4>
                                    <p class="text-white/60"><?php echo esc_html( $usp['usp_description'] ); ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- RIGHT: Image -->
                    <div class="relative fade-in">
                        <div class="aspect-[4/5] rounded-3xl overflow-hidden relative">
                            <img src="<?php echo $img_url; ?>"
                                 alt="<?php echo esc_attr( $s['image_alt'] ); ?>"
                                 class="w-full h-full object-cover"
                                 referrerpolicy="no-referrer" />
                            <div class="absolute inset-0 bg-gradient-to-t from-navy via-transparent to-transparent"></div>
                            <!-- Stat badge overlay -->
                            <div class="absolute bottom-8 left-8 right-8 glass-dark p-6 rounded-2xl">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-12 h-12 rounded-full bg-safety flex items-center justify-center text-white font-bold text-xl">
                                        <?php echo esc_html( $s['stat_value'] ); ?>
                                    </div>
                                    <div>
                                        <p class="font-bold text-lg"><?php echo esc_html( $s['stat_title'] ); ?></p>
                                        <p class="text-sm text-white/60"><?php echo esc_html( $s['stat_subtitle'] ); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Decorative dot pattern -->
                        <div class="absolute -top-8 -right-8 w-32 h-32 bg-[radial-gradient(circle,rgba(255,255,255,0.2)_2px,transparent_2px)] bg-[length:16px_16px]"></div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}
