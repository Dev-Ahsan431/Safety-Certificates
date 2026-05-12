<?php
/**
 * Widget: Fire Alarms Pricing Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Fire_Alarm_Installation_Fire_Pricing extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-fire-pricing'; }
    public function get_title()      { return __( 'HTE – Fire Alarm Pricing', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-price-table'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fire', 'pricing', 'cost', 'Fire Alarm Installation Fire Pricing' ]; }

    protected function register_controls() {

        /* ── Left: Heading & Price ── */
        $this->start_controls_section( 'sec_left', [
            'label' => __( 'Heading & Price', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Fire Alarm', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted Word(s)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Pricing', 'html-to-elementor' ),
            ] );

            $this->add_control( 'price', [
                'label'   => __( 'Price', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£210',
            ] );

            $this->add_control( 'price_suffix', [
                'label'   => __( 'Price Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Per Alarm', 'html-to-elementor' ),
            ] );

            $this->add_control( 'price_description', [
                'label'   => __( 'Price Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Professional installation including all labour and high-quality materials.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Stats ── */
        $this->start_controls_section( 'sec_stats', [
            'label' => __( 'Stats Row', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $stat_rep = new \Elementor\Repeater();
            $stat_rep->add_control( 'stat_label', [
                'label'   => __( 'Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Experience', 'html-to-elementor' ),
            ] );
            $stat_rep->add_control( 'stat_value', [
                'label'   => __( 'Value', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '10+ Years', 'html-to-elementor' ),
            ] );

            $this->add_control( 'stats', [
                'label'       => __( 'Stats', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $stat_rep->get_controls(),
                'default'     => [
                    [ 'stat_label' => __( 'Experience', 'html-to-elementor' ),    'stat_value' => __( '10+ Years', 'html-to-elementor' ) ],
                    [ 'stat_label' => __( 'Certifications', 'html-to-elementor' ), 'stat_value' => __( 'Accredited Team', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ stat_label }}}',
            ] );

        $this->end_controls_section();

        /* ── Right: Feature List + Button ── */
        $this->start_controls_section( 'sec_right', [
            'label' => __( 'Feature List & Button', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $feat_rep = new \Elementor\Repeater();
            $feat_rep->add_control( 'icon', [
                'label'   => __( 'Lucide Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'hard-hat',
            ] );
            $feat_rep->add_control( 'feat_text', [
                'label'   => __( 'Feature Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Certified Installers', 'html-to-elementor' ),
            ] );

            $this->add_control( 'features', [
                'label'       => __( 'Features', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $feat_rep->get_controls(),
                'default'     => [
                    [ 'icon' => 'hard-hat', 'feat_text' => __( 'Certified Installers', 'html-to-elementor' ) ],
                    [ 'icon' => 'cog',      'feat_text' => __( 'Qualified Engineers', 'html-to-elementor' ) ],
                    [ 'icon' => 'award',    'feat_text' => __( 'UK Safety Regs Following', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ feat_text }}}',
            ] );

            $this->add_control( 'button_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book Assessment', 'html-to-elementor' ),
            ] );

            $this->add_control( 'button_link', [
                'label'         => __( 'Button Link', 'html-to-elementor' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'default'       => [ 'url' => '#booking' ],
                'show_external' => true,
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $btn_target = ! empty( $s['button_link']['is_external'] ) ? ' target="_blank"' : '';
        $btn_norel  = ! empty( $s['button_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        ?>
        <section class="py-24 bg-light-grey">
            <div class="max-w-7xl mx-auto px-4">
                <div class="bg-navy p-12 lg:p-20 rounded-[80px] text-white overflow-hidden relative shadow-2xl">
                    <!-- Decorative blob -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute -top-10 -right-10 w-96 h-96 bg-orange rounded-full blur-[100px]"></div>
                    </div>

                    <div class="relative z-10 grid lg:grid-cols-2 gap-20 items-center">

                        <!-- Left -->
                        <div>
                            <h2 class="text-4xl lg:text-6xl font-black mb-8 italic uppercase leading-none">
                                <?php echo esc_html( $s['heading_before'] ); ?>
                                <?php if ( ! empty( $s['heading_highlight'] ) ) : ?>
                                    <span class="text-orange"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                                <?php endif; ?>
                            </h2>

                            <div class="text-6xl font-black text-orange mb-6 italic">
                                <?php echo esc_html( $s['price'] ); ?>
                                <span class="text-white text-2xl uppercase tracking-widest not-italic">
                                    <?php echo esc_html( $s['price_suffix'] ); ?>
                                </span>
                            </div>

                            <?php if ( ! empty( $s['price_description'] ) ) : ?>
                                <p class="text-xl text-white/50 italic font-medium mb-10 max-w-lg leading-relaxed">
                                    <?php echo wp_kses_post( $s['price_description'] ); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ( ! empty( $s['stats'] ) ) : ?>
                                <div class="grid grid-cols-2 gap-6">
                                    <?php foreach ( $s['stats'] as $stat ) : ?>
                                        <div class="flex flex-col gap-1">
                                            <span class="text-xs font-black text-white/30 uppercase tracking-widest">
                                                <?php echo esc_html( $stat['stat_label'] ); ?>
                                            </span>
                                            <span class="text-lg font-bold italic">
                                                <?php echo esc_html( $stat['stat_value'] ); ?>
                                            </span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Right: Feature Card -->
                        <div class="bg-white/5 border border-white/10 backdrop-blur-md p-10 rounded-[40px] space-y-6">
                            <?php foreach ( $s['features'] as $feat ) : ?>
                                <div class="flex items-center gap-4 group">
                                    <div class="w-12 h-12 rounded-2xl bg-orange/20 flex items-center justify-center text-orange group-hover:scale-110 transition-transform">
                                        <i data-lucide="<?php echo esc_attr( $feat['icon'] ); ?>" class="w-6 h-6"></i>
                                    </div>
                                    <span class="text-lg font-black italic"><?php echo esc_html( $feat['feat_text'] ); ?></span>
                                </div>
                            <?php endforeach; ?>

                            <?php if ( ! empty( $s['button_text'] ) ) : ?>
                                <a href="<?php echo esc_url( $s['button_link']['url'] ); ?>"
                                   class="block w-full text-center bg-orange hover:bg-white hover:text-navy py-5 rounded-2xl font-black text-xl transition-all shadow-xl shadow-orange/30 mt-4"
                                   <?php echo $btn_target . $btn_norel; ?>>
                                    <?php echo esc_html( $s['button_text'] ); ?>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}