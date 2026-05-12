<?php
/**
 * Widget: Gas Safety – Importance / Safety Warning Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Importance extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-importance'; }
    public function get_title()      { return __( 'HTE – Gas Safety Importance', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-alert'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'importance', 'safety', 'warning', 'gas', 'risk', 'danger' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Left Column ── */
        $this->start_controls_section( 'sec_left', [
            'label' => __( 'Left Column', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'warning_badge', [
                'label'   => __( 'Warning Badge Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Important Safety Warning', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Why Gas Safety is Non-Negotiable', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Property safety isn\'t just about paperwork. An unmaintained gas appliance is a silent danger that can have catastrophic consequences.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Risk Items ── */
        $this->start_controls_section( 'sec_risks', [
            'label' => __( 'Risk Items', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'risk_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'alert-triangle',
            ] );

            $repeater->add_control( 'risk_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Carbon Monoxide (CO)', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'risk_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'The "silent killer". It has no smell, taste or color. A CP12 verifies your system isn\'t leaking CO.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'risks', [
                'label'       => __( 'Risk Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'risk_icon' => 'alert-triangle', 'risk_title' => 'Carbon Monoxide (CO)',     'risk_desc' => 'The "silent killer". It has no smell, taste or color. A CP12 verifies your system isn\'t leaking CO.' ],
                    [ 'risk_icon' => 'flame',           'risk_title' => 'Explosion & Fire Risks',  'risk_desc' => 'Gas tightness testing identifies micro-leaks in pipework before they build up to dangerous levels.' ],
                    [ 'risk_icon' => 'scale',           'risk_title' => 'Legal Liability',         'risk_desc' => 'Without a certificate, you are legally liable for any gas-related incidents at your property.' ],
                ],
                'title_field' => '{{{ risk_title }}}',
            ] );

        $this->end_controls_section();

        /* ── Right Stats ── */
        $this->start_controls_section( 'sec_stats', [
            'label' => __( 'Right Column Stats', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'stat_number', [
                'label'   => __( 'Stat Number', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '99.9%',
            ] );

            $this->add_control( 'stat_title', [
                'label'   => __( 'Stat Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Peace of Mind', 'html-to-elementor' ),
            ] );

            $this->add_control( 'stat_desc', [
                'label'   => __( 'Stat Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Our checks ensure your property meets the highest safety standards documented in the industry.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'trust_title', [
                'label'   => __( 'Trust Box Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Protect Your Family & Tenants', 'html-to-elementor' ),
            ] );

            $this->add_control( 'trust_desc', [
                'label'   => __( 'Trust Box Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Over 4,000 households across London trust EuroSafe to keep their homes and tenants safe every year.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="section-importance py-24 bg-navy text-white overflow-hidden relative">
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/10 via-transparent to-transparent"></div>
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-20 items-center">

                    <!-- Left -->
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-500/20 border border-red-500/40 text-red-100 mb-6 text-xs font-bold uppercase tracking-widest">
                            <?php echo esc_html( $s['warning_badge'] ); ?>
                        </div>
                        <h3 class="text-4xl md:text-5xl font-bold mb-8 font-heading"><?php echo esc_html( $s['heading'] ); ?></h3>
                        <p class="text-lg text-white/60 mb-10 leading-relaxed"><?php echo esc_html( $s['description'] ); ?></p>

                        <div class="space-y-6">
                            <?php foreach ( $s['risks'] as $risk ) : ?>
                                <div class="flex items-start gap-5">
                                    <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-red-500 shrink-0 border border-white/10">
                                        <i data-lucide="<?php echo esc_attr( $risk['risk_icon'] ); ?>"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-xl mb-1"><?php echo esc_html( $risk['risk_title'] ); ?></h4>
                                        <p class="text-sm text-white/40"><?php echo esc_html( $risk['risk_desc'] ); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Right: Stats -->
                    <div class="grid grid-cols-1 gap-6">
                        <div class="p-10 bg-white/5 rounded-[3rem] border border-white/10 backdrop-blur-md">
                            <div class="text-safety text-5xl font-bold mb-4 font-heading"><?php echo esc_html( $s['stat_number'] ); ?></div>
                            <p class="font-bold text-xl mb-2"><?php echo esc_html( $s['stat_title'] ); ?></p>
                            <p class="text-white/40 text-sm"><?php echo esc_html( $s['stat_desc'] ); ?></p>
                        </div>
                        <div class="p-10 bg-electric/10 rounded-[3rem] border border-electric/20 backdrop-blur-md">
                            <i data-lucide="users" class="w-10 h-10 text-electric mb-6"></i>
                            <h4 class="font-bold text-xl mb-2"><?php echo esc_html( $s['trust_title'] ); ?></h4>
                            <p class="text-white/40 text-sm"><?php echo esc_html( $s['trust_desc'] ); ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}