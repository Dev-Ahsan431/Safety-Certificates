<?php
/**
 * Widget: Fire Alarms Expert Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Fire_Alarm_Installation_Fire_Expert extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-fire-expert'; }
    public function get_title()      { return __( 'HTE – Fire Expert Section', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-image-rollover'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fire', 'expert', 'about', 'features', 'Fire Alarm Installation Fire Expert' ]; }

    protected function register_controls() {

        /* ── Image ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Image', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'image', [
                'label'   => __( 'Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&q=80&w=800' ],
            ] );

            $this->add_control( 'image_alt', [
                'label'   => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Electrician installing safety equipment', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Text Content ── */
        $this->start_controls_section( 'sec_content', [
            'label' => __( 'Text Content', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'We are', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted Word(s)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Expert', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_after', [
                'label'   => __( 'Heading – After Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'in Fire Alarm Installation', 'html-to-elementor' ),
            ] );

            $this->add_control( 'paragraph_1', [
                'label'   => __( 'Paragraph 1', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Our team of qualified engineers begins with a detailed survey of your property to understand your specific safety needs. We then design a fire alarm system tailored to your building\'s size and layout.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'paragraph_2', [
                'label'   => __( 'Paragraph 2', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'During installation, we use only trusted, high-quality equipment and follow all UK safety regulations. After the system is installed, we conduct thorough testing and provide clear instructions on how to use and maintain it.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Feature Badges ── */
        $this->start_controls_section( 'sec_features', [
            'label' => __( 'Feature Badges', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'route',
            ] );

            $repeater->add_control( 'feature_text', [
                'label'   => __( 'Feature Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Emergency escape routes', 'html-to-elementor' ),
            ] );

            $this->add_control( 'features', [
                'label'       => __( 'Features', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'icon' => 'route',           'feature_text' => __( 'Emergency escape routes', 'html-to-elementor' ) ],
                    [ 'icon' => 'eye',             'feature_text' => __( 'Fire detection systems', 'html-to-elementor' ) ],
                    [ 'icon' => 'flame-kindling',  'feature_text' => __( 'Firefighting equipment', 'html-to-elementor' ) ],
                    [ 'icon' => 'signpost',        'feature_text' => __( 'Safety signage', 'html-to-elementor' ) ],
                    [ 'icon' => 'zap-off',         'feature_text' => __( 'Electrical/fuel hazards', 'html-to-elementor' ) ],
                    [ 'icon' => 'trending-down',   'feature_text' => __( 'Risk reduction measures', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ feature_text }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-20 items-center">

                    <!-- Left: Image -->
                    <div class="relative">
                        <div class="absolute -top-10 -left-10 w-40 h-40 bg-electric/10 rounded-full blur-3xl animate-pulse"></div>
                        <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                            <img src="<?php echo esc_url( $s['image']['url'] ); ?>"
                                 alt="<?php echo esc_attr( $s['image_alt'] ); ?>"
                                 class="relative z-10 rounded-[40px] shadow-2xl border border-gray-100">
                        <?php endif; ?>
                    </div>

                    <!-- Right: Content -->
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-black text-navy mb-8 italic uppercase tracking-tight">
                            <?php echo esc_html( $s['heading_before'] ); ?>
                            <?php if ( ! empty( $s['heading_highlight'] ) ) : ?>
                                <span class="text-orange"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                            <?php endif; ?>
                            <?php if ( ! empty( $s['heading_after'] ) ) : ?>
                                <?php echo ' ' . esc_html( $s['heading_after'] ); ?>
                            <?php endif; ?>
                        </h2>

                        <div class="prose prose-lg text-navy/70 italic space-y-6 leading-relaxed mb-10">
                            <?php if ( ! empty( $s['paragraph_1'] ) ) : ?>
                                <p><?php echo wp_kses_post( $s['paragraph_1'] ); ?></p>
                            <?php endif; ?>
                            <?php if ( ! empty( $s['paragraph_2'] ) ) : ?>
                                <p><?php echo wp_kses_post( $s['paragraph_2'] ); ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if ( ! empty( $s['features'] ) ) : ?>
                            <div class="grid sm:grid-cols-2 gap-4">
                                <?php foreach ( $s['features'] as $feat ) : ?>
                                    <div class="flex items-center gap-3 p-4 rounded-2xl bg-light-grey font-bold italic text-navy text-sm">
                                        <i data-lucide="<?php echo esc_attr( $feat['icon'] ); ?>" class="text-orange w-5 h-5"></i>
                                        <?php echo esc_html( $feat['feature_text'] ); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}