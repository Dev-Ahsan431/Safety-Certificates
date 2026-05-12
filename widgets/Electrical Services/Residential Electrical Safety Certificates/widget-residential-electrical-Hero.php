<?php
/**
 * Widget: Hero Section (Section 01)
 * @package HTML_To_Elementor
 */
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Hero extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-hero'; }
    public function get_title()      { return __( 'HTE – Hero', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-banner'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'hero', 'banner', 'residential',  'electrical' ]; }

    protected function register_controls() {

        /* ── BADGE ── */
        $this->start_controls_section( 'sec_badge', [
            'label' => __( 'Trust Badge', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '4.8/5 Rated by London Landlords',
            ] );
            $this->add_control( 'badge_stars', [
                'label'   => __( 'Star Count', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 5, 'min' => 1, 'max' => 5,
            ] );
        $this->end_controls_section();

        /* ── HEADLINE ── */
        $this->start_controls_section( 'sec_headline', [
            'label' => __( 'Headline', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'heading_plain', [
                'label'   => __( 'Heading – Plain Part', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Residential EICR Certificate in London –',
                'rows'    => 2,
            ] );
            $this->add_control( 'heading_accent', [
                'label'   => __( 'Heading – Accent Part (blue)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Fast, Certified & Fully Compliant',
                'rows'    => 2,
            ] );
            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Expert electrical safety inspections for landlords and homeowners. Ensure legal compliance and protect your property with London\'s leading certification specialists.',
                'rows'    => 3,
            ] );
        $this->end_controls_section();

        /* ── BULLET POINTS ── */
        $this->start_controls_section( 'sec_bullets', [
            'label' => __( 'Bullet Points', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'bullet_text', [
                'label'   => __( 'Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Bullet point',
            ] );
            $this->add_control( 'bullets', [
                'label'       => __( 'Bullet Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'bullet_text' => 'All-inclusive pricing' ],
                    [ 'bullet_text' => 'Qualified electricians' ],
                    [ 'bullet_text' => 'Digital report within 24h' ],
                    [ 'bullet_text' => 'Limited availability' ],
                    [ 'bullet_text' => 'Clear C1/C2/C3 results' ],
                    [ 'bullet_text' => 'Covering all London' ],
                ],
                'title_field' => '{{{ bullet_text }}}',
            ] );
        $this->end_controls_section();

        /* ── BUTTONS ── */
        $this->start_controls_section( 'sec_buttons', [
            'label' => __( 'Buttons', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'btn_primary_text', [
                'label'   => __( 'Primary Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Book Now',
            ] );
            $this->add_control( 'btn_primary_url', [
                'label'   => __( 'Primary Button URL', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );
            $this->add_control( 'btn_secondary_text', [
                'label'   => __( 'Secondary Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Call Now',
            ] );
            $this->add_control( 'btn_secondary_url', [
                'label'   => __( 'Secondary Button URL (tel:)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'tel:+44800123456',
            ] );
        $this->end_controls_section();

        /* ── STATS BAR ── */
        $this->start_controls_section( 'sec_stats', [
            'label' => __( 'Stats Bar', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'stat_number', [
                'label'   => __( 'Stat Number', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '15,000+',
            ] );
            $this->add_control( 'stat_label', [
                'label'   => __( 'Stat Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Certificates Issued',
            ] );
            $this->add_control( 'guarantee_text', [
                'label'   => __( 'Guarantee Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '100% Compliance Guarantee',
            ] );
        $this->end_controls_section();

        /* ── HERO IMAGE ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Hero Image', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'hero_image', [
                'label'   => __( 'Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=2069&auto=format&fit=crop' ],
            ] );
            $this->add_control( 'hero_image_alt', [
                'label'   => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Electrician Inspecting Fuse Board',
            ] );
        $this->end_controls_section();

        /* ── FLOATING CARD ── */
        $this->start_controls_section( 'sec_card', [
            'label' => __( 'Floating Card (on image)', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
            $this->add_control( 'card_title', [
                'label'   => __( 'Card Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Digital EICR Report',
            ] );
            $this->add_control( 'card_subtitle', [
                'label'   => __( 'Card Subtitle', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Instant generation after testing',
            ] );
            $this->add_control( 'card_progress_label_left', [
                'label'   => __( 'Progress Label Left', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'System Integrity',
            ] );
            $this->add_control( 'card_progress_label_right', [
                'label'   => __( 'Progress Label Right', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '85% Checked',
            ] );
            $this->add_control( 'card_progress_value', [
                'label'   => __( 'Progress Bar %', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 85, 'min' => 0, 'max' => 100,
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s           = $this->get_settings_for_display();
        $primary_url = ! empty( $s['btn_primary_url']['url'] ) ? esc_url( $s['btn_primary_url']['url'] ) : '#';
        $img_url     = ! empty( $s['hero_image']['url'] ) ? esc_url( $s['hero_image']['url'] ) : '';
        $stars       = max( 1, min( 5, (int) $s['badge_stars'] ) );
        $progress    = (int) $s['card_progress_value'];
        $bullets     = $s['bullets'] ?? [];
        $half        = (int) ceil( count( $bullets ) / 2 );
        $col1        = array_slice( $bullets, 0, $half );
        $col2        = array_slice( $bullets, $half );
        ?>
        <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-navy text-white clip-diagonal">
            <div class="absolute inset-0 z-0 opacity-20">
                <div class="absolute top-0 right-1/4 w-96 h-96 bg-electric rounded-full mix-blend-screen filter blur-[100px] animate-pulse"></div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="fade-in">
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6">
                            <div class="flex text-orange">
                                <?php for ( $i = 0; $i < $stars; $i++ ) : ?>
                                    <i data-lucide="star" class="w-3 h-3 fill-current"></i>
                                <?php endfor; ?>
                            </div>
                            <span class="text-xs font-bold text-white/90"><?php echo esc_html( $s['badge_text'] ); ?></span>
                        </div>

                        <!-- Heading -->
                        <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                            <?php echo esc_html( $s['heading_plain'] ); ?> <span class="text-electric"><?php echo esc_html( $s['heading_accent'] ); ?></span>
                        </h1>
                        <p class="text-lg text-white/80 mb-8 leading-relaxed"><?php echo esc_html( $s['subheading'] ); ?></p>

                        <!-- Bullets -->
                        <?php if ( ! empty( $bullets ) ) : ?>
                        <div class="grid sm:grid-cols-2 gap-4 mb-8">
                            <ul class="space-y-3">
                                <?php foreach ( $col1 as $item ) : ?>
                                    <li class="flex items-center gap-2 text-sm text-white/70">
                                        <i data-lucide="check-circle-2" class="text-safety w-4 h-4"></i>
                                        <?php echo esc_html( $item['bullet_text'] ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="space-y-3">
                                <?php foreach ( $col2 as $item ) : ?>
                                    <li class="flex items-center gap-2 text-sm text-white/70">
                                        <i data-lucide="check-circle-2" class="text-safety w-4 h-4"></i>
                                        <?php echo esc_html( $item['bullet_text'] ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <!-- Buttons -->
                        <div class="flex flex-wrap gap-4 mb-8">
                            <a href="<?php echo $primary_url; ?>" class="bg-orange hover:bg-orange/90 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(255,122,0,0.4)] flex items-center gap-2">
                                <?php echo esc_html( $s['btn_primary_text'] ); ?>
                            </a>
                            <a href="<?php echo esc_attr( $s['btn_secondary_url'] ); ?>" class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all flex items-center gap-2 italic">
                                <?php echo esc_html( $s['btn_secondary_text'] ); ?>
                            </a>
                        </div>

                        <!-- Stats -->
                        <div class="flex items-center gap-6 border-t border-white/10 pt-6">
                            <div>
                                <span class="block text-2xl font-bold text-white leading-none"><?php echo esc_html( $s['stat_number'] ); ?></span>
                                <span class="text-xs text-white/40 uppercase tracking-wider"><?php echo esc_html( $s['stat_label'] ); ?></span>
                            </div>
                            <div class="w-px h-10 bg-white/10"></div>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-safety/20 text-safety flex items-center justify-center">
                                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                                </div>
                                <span class="text-sm font-bold text-white/80"><?php echo esc_html( $s['guarantee_text'] ); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Image + Card -->
                    <?php if ( $img_url ) : ?>
                    <div class="relative hidden lg:block slide-in-right">
                        <div class="glass-dark p-4 rounded-[40px] shadow-2xl border border-white/10 relative z-10 overflow-hidden">
                            <img src="<?php echo $img_url; ?>" alt="<?php echo esc_attr( $s['hero_image_alt'] ); ?>" class="rounded-[32px] w-full h-[500px] object-cover">
                            <div class="absolute bottom-10 left-10 right-10 bg-navy/90 backdrop-blur-md border border-white/10 p-6 rounded-2xl shadow-xl">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-12 h-12 bg-electric rounded-xl flex items-center justify-center text-white"><i data-lucide="file-check-2"></i></div>
                                    <div>
                                        <h4 class="font-bold text-white"><?php echo esc_html( $s['card_title'] ); ?></h4>
                                        <p class="text-xs text-white/50"><?php echo esc_html( $s['card_subtitle'] ); ?></p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="h-1.5 w-full bg-white/10 rounded-full overflow-hidden">
                                        <div class="h-full bg-safety" style="width:<?php echo $progress; ?>%"></div>
                                    </div>
                                    <div class="flex justify-between text-[10px] uppercase font-bold text-white/40">
                                        <span><?php echo esc_html( $s['card_progress_label_left'] ); ?></span>
                                        <span><?php echo esc_html( $s['card_progress_label_right'] ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-orange rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
}