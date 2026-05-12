<?php
/**
 * Widget: Gas Why Us (trust points + circular badge hero image)
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Commercial_Gas_Why_Us extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-gas-why-us'; }
    public function get_title()      { return __( 'HTE – Gas Why Us', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-person'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'gas', 'why us', 'trust', 'team', 'Commercial' ]; }

    protected function register_controls() {

        /* ── Heading ── */
        $this->start_controls_section( 'sec_heading', [
            'label' => __( 'Heading', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Why Commercial Landlords Trust Our Experts',
            ] );

            $this->add_control( 'heading_highlight', [
                'label'       => __( 'Highlighted Phrase', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Trust Our Experts',
                'description' => __( 'This phrase will be highlighted in the accent color.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Trust Points Repeater ── */
        $this->start_controls_section( 'sec_points', [
            'label' => __( 'Trust Points', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'point_icon', [
                'label'   => __( 'Icon (Lucide name)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'clock',
            ] );

            $repeater->add_control( 'point_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Trust Point Title',
            ] );

            $repeater->add_control( 'point_text', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Trust point description.',
            ] );

            $this->add_control( 'trust_points', [
                'label'       => __( 'Trust Points', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'point_icon'  => 'clock',
                        'point_title' => 'Business Continuity Focus',
                        'point_text'  => 'We understand that downtime costs money. We schedule inspections at times that minimize disruption to your kitchen or office operations.',
                    ],
                    [
                        'point_icon'  => 'graduation-cap',
                        'point_title' => 'COCN1 & CIGA1 Qualified',
                        'point_text'  => 'Not all gas engineers are allowed to work on commercial systems. Our team holds high-level commercial core qualifications (COCN1).',
                    ],
                    [
                        'point_icon'  => 'map-pin',
                        'point_title' => 'Total London Coverage',
                        'point_text'  => 'From the City to Greater London, we deploy engineers across all N, E, SE, SW, W and NW postcodes daily.',
                    ],
                ],
                'title_field' => '{{{ point_title }}}',
            ] );

        $this->end_controls_section();

        /* ── Image & Badge ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Image & Centre Badge', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'image', [
                'label'   => __( 'Background Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
            ] );

            $this->add_control( 'image_alt', [
                'label'   => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Professional Gas Engineer',
            ] );

            $this->add_control( 'badge_stat', [
                'label'   => __( 'Badge – Large Stat', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '100%',
            ] );

            $this->add_control( 'badge_label', [
                'label'   => __( 'Badge – Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Compliance',
            ] );

            $this->add_control( 'badge_sub', [
                'label'   => __( 'Badge – Sub-label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Elite Protection Guaranteed',
            ] );

            $this->add_control( 'badge_ribbon', [
                'label'   => __( 'Badge – Bottom Ribbon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'London Leader',
            ] );

            $this->add_control( 'strip_title', [
                'label'   => __( 'Bottom Strip – Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Elite Standard Service',
            ] );

            $this->add_control( 'strip_subtitle', [
                'label'   => __( 'Bottom Strip – Subtitle', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => "London's Most Trusted Team",
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
        ?>
        <section class="py-24 bg-light-grey overflow-hidden">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left: Trust Points -->
                    <div>
                        <h2 class="text-4xl font-black text-navy mb-8"><?php echo wp_kses_post( $heading ); ?></h2>
                        <div class="space-y-4">
                            <?php foreach ( $s['trust_points'] as $point ) : ?>
                                <div class="flex gap-4 group">
                                    <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-safety shadow-sm group-hover:scale-110 transition-transform">
                                        <i data-lucide="<?php echo esc_attr( $point['point_icon'] ); ?>" class="w-6 h-6"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg mb-1"><?php echo esc_html( $point['point_title'] ); ?></h4>
                                        <p class="text-navy/60 text-sm"><?php echo wp_kses_post( $point['point_text'] ); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Right: Image Hero -->
                    <div class="relative">
                        <div class="aspect-square rounded-[50px] relative overflow-hidden group shadow-2xl border-8 border-white">

                            <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $s['image']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $s['image_alt'] ); ?>"
                                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-[15s] group-hover:scale-110">
                            <?php endif; ?>

                            <div class="absolute inset-0 bg-navy/30 group-hover:bg-navy/20 transition-colors duration-500"></div>

                            <!-- Centre Badge -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="relative scale-90 sm:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 -m-16 border border-white/30 rounded-full animate-[spin_30s_linear_infinite]"></div>
                                    <div class="absolute inset-0 -m-24 border border-safety/40 rounded-full animate-[spin_40s_linear_infinite_reverse]"></div>

                                    <div class="relative w-56 h-56 bg-white text-navy rounded-full flex items-center justify-center flex-col shadow-[0_0_50px_rgba(30,144,255,0.3)] border-8 border-electric">
                                        <div class="absolute inset-0 rounded-full bg-electric animate-pulse opacity-5"></div>
                                        <span class="text-6xl font-black italic leading-none tracking-tighter">
                                            <?php echo esc_html( $s['badge_stat'] ); ?>
                                        </span>
                                        <span class="text-[12px] font-black uppercase tracking-[0.2em] text-electric mt-2">
                                            <?php echo esc_html( $s['badge_label'] ); ?>
                                        </span>
                                        <div class="w-10 h-0.5 bg-navy/10 my-3"></div>
                                        <span class="text-[9px] font-bold uppercase tracking-widest text-navy/40 text-center px-4 leading-tight">
                                            <?php echo esc_html( $s['badge_sub'] ); ?>
                                        </span>
                                        <div class="absolute -bottom-5 bg-navy text-white px-6 py-2 rounded-full text-[9px] font-black uppercase tracking-[0.15em] shadow-xl border border-white/10 ring-4 ring-white/10 italic">
                                            <?php echo esc_html( $s['badge_ribbon'] ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom Strip -->
                            <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-navy/90 to-transparent text-white pt-20">
                                <div class="flex items-center gap-4 group/item">
                                    <div class="w-12 h-12 bg-electric rounded-2xl flex items-center justify-center shadow-xl group-hover/item:scale-110 transition-transform">
                                        <i data-lucide="shield-check" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <div>
                                        <p class="text-xl font-black italic tracking-tight leading-none mb-1">
                                            <?php echo esc_html( $s['strip_title'] ); ?>
                                        </p>
                                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/60">
                                            <?php echo esc_html( $s['strip_subtitle'] ); ?>
                                        </p>
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