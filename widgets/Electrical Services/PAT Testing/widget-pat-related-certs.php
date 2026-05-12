<?php
/**
 * Widget: PAT Testing – Related Certificates Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_PAT_Related_Certs extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-related-certs'; }
    public function get_title()      { return __( 'HTE – PAT: Related Certificates', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-document-file'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'related', 'certificates', 'eicr', 'gas', 'epc', 'landlord', 'compliance' ]; }

    protected function register_controls() {

        /* ── Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Related Landlord Certificates', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'One stop compliance. Combine services and save.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Certificate Cards ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Certificate Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'cert_icon', [
                'label'   => __( 'Lucide Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'file-check',
            ] );

            $repeater->add_control( 'cert_icon_bg', [
                'label'       => __( 'Icon BG Class', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'e.g. bg-navy, bg-safety, bg-orange', 'html-to-elementor' ),
                'default'     => 'bg-navy',
            ] );

            $repeater->add_control( 'cert_title', [
                'label'   => __( 'Certificate Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'EICR Certificate', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'cert_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Fixed wiring inspection for total property safety. Mandatory every 5 years for rentals.', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'cert_is_live', [
                'label'        => __( 'Is Live (has a link)?', 'html-to-elementor' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'html-to-elementor' ),
                'label_off'    => __( 'No – Coming Soon', 'html-to-elementor' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ] );

            $repeater->add_control( 'cert_link', [
                'label'     => __( 'Card Link URL', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::URL,
                'default'   => [ 'url' => '#' ],
                'condition' => [ 'cert_is_live' => 'yes' ],
            ] );

            $repeater->add_control( 'cert_coming_soon_text', [
                'label'     => __( 'Coming Soon Label', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'Coming Soon', 'html-to-elementor' ),
                'condition' => [ 'cert_is_live' => '' ],
            ] );

            $this->add_control( 'cert_cards', [
                'label'       => __( 'Certificates', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'cert_icon'     => 'file-check',
                        'cert_icon_bg'  => 'bg-navy',
                        'cert_title'    => 'EICR Certificate',
                        'cert_desc'     => 'Fixed wiring inspection for total property safety. Mandatory every 5 years for rentals.',
                        'cert_is_live'  => 'yes',
                        'cert_link'     => [ 'url' => 'residential-eicr.html' ],
                    ],
                    [
                        'cert_icon'           => 'flame',
                        'cert_icon_bg'        => 'bg-safety',
                        'cert_title'          => 'Gas Safety Certificate',
                        'cert_desc'           => '',
                        'cert_is_live'        => '',
                        'cert_coming_soon_text' => 'Coming Soon',
                    ],
                    [
                        'cert_icon'           => 'bar-chart-3',
                        'cert_icon_bg'        => 'bg-orange',
                        'cert_title'          => 'EPC Certificate',
                        'cert_desc'           => '',
                        'cert_is_live'        => '',
                        'cert_coming_soon_text' => 'Coming Soon',
                    ],
                ],
                'title_field' => '{{{ cert_title }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-light-grey">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-extrabold text-navy italic"><?php echo esc_html( $s['heading'] ); ?></h2>
                    <p class="text-navy/60 mt-4"><?php echo esc_html( $s['subheading'] ); ?></p>
                </div>

                <!-- Cards -->
                <div class="grid md:grid-cols-3 gap-8">
                    <?php foreach ( $s['cert_cards'] as $card ) :
                        $is_live    = ( 'yes' === $card['cert_is_live'] );
                        $link_url   = $is_live && ! empty( $card['cert_link']['url'] ) ? $card['cert_link']['url'] : '#';
                        $target     = $is_live && ! empty( $card['cert_link']['is_external'] ) ? ' target="_blank"' : '';
                        $norel      = $is_live && ! empty( $card['cert_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
                        $tag        = $is_live ? 'a' : 'div';
                        $href_attr  = $is_live ? ' href="' . esc_url( $link_url ) . '"' . $target . $norel : '';
                        $opacity    = $is_live ? '' : ' opacity-80';
                    ?>
                        <<?php echo $tag; ?><?php echo $href_attr; ?>
                            class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all group<?php echo $opacity; ?> <?php echo $is_live ? '' : 'flex flex-col justify-between'; ?>">
                            <div>
                                <div class="w-12 h-12 <?php echo esc_attr( $card['cert_icon_bg'] ); ?> text-white rounded-xl flex items-center justify-center mb-6 <?php echo $is_live ? 'group-hover:bg-electric transition-colors' : ''; ?>">
                                    <i data-lucide="<?php echo esc_attr( $card['cert_icon'] ); ?>"></i>
                                </div>
                                <h5 class="font-bold text-xl mb-2"><?php echo esc_html( $card['cert_title'] ); ?></h5>
                                <?php if ( $is_live && ! empty( $card['cert_desc'] ) ) : ?>
                                    <p class="text-sm text-navy/50 leading-relaxed italic"><?php echo esc_html( $card['cert_desc'] ); ?></p>
                                <?php elseif ( ! $is_live ) : ?>
                                    <p class="text-sm text-navy/50 leading-relaxed italic uppercase tracking-tighter font-black">
                                        <?php echo esc_html( $card['cert_coming_soon_text'] ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </<?php echo $tag; ?>>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}