	<?php
/**
 * Widget: Footer
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Main_Footer extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-footer'; }
    public function get_title()      { return __( 'HTE – Footer', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-footer'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'footer', 'nav', 'menu' ]; }

    /* ── Helpers ──────────────────────────────────────────────────────── */

    private function get_menus_options() {
        $options = [ '' => __( '— Select a Menu —', 'html-to-elementor' ) ];
        foreach ( (array) wp_get_nav_menus() as $menu ) {
            $options[ $menu->term_id ] = $menu->name;
        }
        return $options;
    }

    private function render_menu( $menu_id ) {
        if ( empty( $menu_id ) ) return;
        $items = wp_get_nav_menu_items( (int) $menu_id );
        if ( empty( $items ) || is_wp_error( $items ) ) return;
        foreach ( $items as $item ) {
            $url    = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
            $target = $item->target === '_blank' ? ' target="_blank"' : '';
            echo '<li><a href="' . $url . '"' . $target . ' class="hover:text-electric transition-colors">' . esc_html( $item->title ) . '</a></li>';
        }
    }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── LOGO ── */
        $this->start_controls_section( 'sec_logo', [
            'label' => __( 'Logo', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'logo_image', [
                'label'       => __( 'Logo Image', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'default'     => [ 'url' => '' ],
                'description' => __( 'Upload a logo image. If empty, the text logo below is used.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'logo_image_alt', [
                'label'     => __( 'Logo Alt Text', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => get_bloginfo( 'name' ),
                'condition' => [ 'logo_image[url]!' => '' ],
            ] );

            $this->add_control( 'logo_text_plain', [
                'label'     => __( 'Logo Plain Text', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Euro',
                'condition' => [ 'logo_image[url]' => '' ],
            ] );

            $this->add_control( 'logo_text_accent', [
                'label'     => __( 'Logo Accent Text', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Safe',
                'condition' => [ 'logo_image[url]' => '' ],
            ] );

            $this->add_control( 'logo_url', [
                'label'   => __( 'Logo Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => home_url( '/' ) ],
            ] );

            $this->add_control( 'logo_description', [
                'label'   => __( 'Tagline / Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Europe's leading provider of property safety certificates. Fast, reliable, and fully compliant.",
                'rows'    => 3,
            ] );

        $this->end_controls_section();

        /* ── COLUMN 2 — SERVICES MENU ── */
        $this->start_controls_section( 'sec_col2', [
            'label' => __( 'Column 2 – Services Menu', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'col2_heading', [
                'label'   => __( 'Column Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Services',
            ] );

            $this->add_control( 'col2_menu_info', [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw'  => sprintf(
                    '<p style="font-size:12px;line-height:1.6;">Build your menu at <strong>Appearance → Menus</strong>.<br><a href="%s" target="_blank">Open Menu Editor ↗</a></p>',
                    admin_url( 'nav-menus.php' )
                ),
            ] );

            $this->add_control( 'col2_menu', [
                'label'   => __( 'Select WordPress Menu', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_menus_options(),
                'default' => '',
            ] );

        $this->end_controls_section();

        /* ── COLUMN 3 — COMPANY MENU ── */
        $this->start_controls_section( 'sec_col3', [
            'label' => __( 'Column 3 – Company Menu', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'col3_heading', [
                'label'   => __( 'Column Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Company',
            ] );

            $this->add_control( 'col3_menu_info', [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw'  => sprintf(
                    '<p style="font-size:12px;line-height:1.6;">Build your menu at <strong>Appearance → Menus</strong>.<br><a href="%s" target="_blank">Open Menu Editor ↗</a></p>',
                    admin_url( 'nav-menus.php' )
                ),
            ] );

            $this->add_control( 'col3_menu', [
                'label'   => __( 'Select WordPress Menu', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_menus_options(),
                'default' => '',
            ] );

        $this->end_controls_section();

        /* ── COLUMN 4 — CONTACT ── */
        $this->start_controls_section( 'sec_col4', [
            'label' => __( 'Column 4 – Contact', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'col4_heading', [
                'label'   => __( 'Column Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Contact Us',
            ] );

            $this->add_control( 'phone_number', [
                'label'   => __( 'Phone Number (display)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '0800 123 456',
            ] );

            $this->add_control( 'phone_href', [
                'label'   => __( 'Phone href (tel:)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'tel:+44800123456',
            ] );

            $this->add_control( 'email_address', [
                'label'   => __( 'Email Address', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'hello@eurosafe.example.com',
            ] );

        $this->end_controls_section();

        /* ── BOTTOM BAR ── */
        $this->start_controls_section( 'sec_bottom', [
            'label' => __( 'Bottom Bar', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'copyright_text', [
                'label'   => __( 'Copyright Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '© 2026 EuroSafe Compliance Ltd. All rights reserved.',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();

        $logo_url       = ! empty( $s['logo_url']['url'] ) ? esc_url( $s['logo_url']['url'] ) : home_url( '/' );
        $logo_img_url   = ! empty( $s['logo_image']['url'] ) ? esc_url( $s['logo_image']['url'] ) : '';
        $logo_img_alt   = ! empty( $s['logo_image_alt'] ) ? esc_attr( $s['logo_image_alt'] ) : esc_attr( get_bloginfo( 'name' ) );
        $email          = ! empty( $s['email_address'] ) ? sanitize_email( $s['email_address'] ) : '';
        ?>

        <footer class="bg-navy text-white pt-20 pb-10 border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- ── FOUR COLUMN GRID ── -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

                    <!-- COL 1 — LOGO + TAGLINE -->
                    <div class="lg:col-span-1">
                        <div class="flex items-center gap-2 mb-6">
                            <a href="<?php echo $logo_url; ?>" class="flex items-center gap-2" aria-label="<?php echo $logo_img_alt; ?>">
                                <?php if ( $logo_img_url ) : ?>
                                    <img src="<?php echo $logo_img_url; ?>"
                                         alt="<?php echo $logo_img_alt; ?>"
                                         class="h-8 w-auto block" />
                                <?php else : ?>
                                    <div class="bg-electric text-white p-2 rounded-lg">
                                        <i data-lucide="shield-check"></i>
                                    </div>
                                    <span class="font-heading font-bold text-2xl text-white">
                                        <?php echo esc_html( $s['logo_text_plain'] ); ?><span class="text-electric"><?php echo esc_html( $s['logo_text_accent'] ); ?></span>
                                    </span>
                                <?php endif; ?>
                            </a>
                        </div>
                        <?php if ( ! empty( $s['logo_description'] ) ) : ?>
                            <p class="text-white/60 mb-6"><?php echo esc_html( $s['logo_description'] ); ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- COL 2 — SERVICES MENU -->
                    <div>
                        <?php if ( ! empty( $s['col2_heading'] ) ) : ?>
                            <h4 class="font-bold text-lg mb-6"><?php echo esc_html( $s['col2_heading'] ); ?></h4>
                        <?php endif; ?>
                        <ul class="space-y-3 text-white/60">
                            <?php if ( ! empty( $s['col2_menu'] ) ) :
                                $this->render_menu( $s['col2_menu'] );
                            else : ?>
                                <li class="text-sm italic opacity-50"><?php esc_html_e( 'No menu selected.', 'html-to-elementor' ); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- COL 3 — COMPANY MENU -->
                    <div>
                        <?php if ( ! empty( $s['col3_heading'] ) ) : ?>
                            <h4 class="font-bold text-lg mb-6"><?php echo esc_html( $s['col3_heading'] ); ?></h4>
                        <?php endif; ?>
                        <ul class="space-y-3 text-white/60">
                            <?php if ( ! empty( $s['col3_menu'] ) ) :
                                $this->render_menu( $s['col3_menu'] );
                            else : ?>
                                <li class="text-sm italic opacity-50"><?php esc_html_e( 'No menu selected.', 'html-to-elementor' ); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- COL 4 — CONTACT -->
                    <div>
                        <?php if ( ! empty( $s['col4_heading'] ) ) : ?>
                            <h4 class="font-bold text-lg mb-6"><?php echo esc_html( $s['col4_heading'] ); ?></h4>
                        <?php endif; ?>
                        <ul class="space-y-4 text-white/60">
                            <?php if ( ! empty( $s['phone_number'] ) ) : ?>
                                <li class="flex items-start gap-3">
                                    <i data-lucide="phone" class="text-electric shrink-0 mt-0.5"></i>
                                    <a href="<?php echo esc_attr( $s['phone_href'] ); ?>" class="hover:text-electric transition-colors">
                                        <?php echo esc_html( $s['phone_number'] ); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ( $email ) : ?>
                                <li class="flex items-start gap-3">
                                    <i data-lucide="mail" class="text-electric shrink-0 mt-0.5"></i>
                                    <a href="mailto:<?php echo $email; ?>" class="hover:text-electric transition-colors">
                                        <?php echo $email; ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div><!-- /.grid -->

                <!-- ── BOTTOM BAR ── -->
                <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-white/40">
                    <?php if ( ! empty( $s['copyright_text'] ) ) : ?>
                        <p><?php echo esc_html( $s['copyright_text'] ); ?></p>
                    <?php endif; ?>
                </div>

            </div>
        </footer>

        <?php
    }
}
