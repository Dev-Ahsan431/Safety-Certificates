<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Main_Header extends \Elementor\Widget_Base {

    public function get_name()       { return 'site_header'; }
    public function get_title()      { return __( 'Site – Header / Nav', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-nav-menu'; }
    public function get_categories() { return [ 'general' ]; }

    private function get_menus_options() {
        $options = [ '' => __( '— Select a Menu —', 'plugin-name' ) ];
        foreach ( (array) wp_get_nav_menus() as $menu ) {
            $options[ $menu->term_id ] = $menu->name;
        }
        return $options;
    }

    /**
     * Build a 3-level tree from WordPress nav items.
     *
     * Returns:
     * [
     *   [
     *     'item'     => WP_Post,           // level 1
     *     'children' => [
     *       [
     *         'item'     => WP_Post,       // level 2
     *         'children' => [ WP_Post… ]   // level 3 (grandchildren, plain WP_Post)
     *       ],
     *       …
     *     ]
     *   ],
     *   …
     * ]
     */
    private function get_menu_tree( $menu_id ) {
        if ( empty( $menu_id ) ) return [];
        $raw = wp_get_nav_menu_items( (int) $menu_id );
        if ( empty( $raw ) || is_wp_error( $raw ) ) return [];

        $indexed = [];
        foreach ( $raw as $item ) { $indexed[ $item->ID ] = $item; }

        $level1 = [];  // [ id => [ 'item'=>, 'children'=>[] ] ]
        $level2 = [];  // [ id => [ 'item'=>, 'children'=>[] ] ]
        $level3 = [];  // [ parent_id => [ WP_Post, … ] ]

        foreach ( $raw as $item ) {
            $pid = (int) $item->menu_item_parent;
            if ( $pid === 0 || ! isset( $indexed[ $pid ] ) ) {
                $level1[ $item->ID ] = [ 'item' => $item, 'children' => [] ];
            } elseif ( isset( $level1[ $pid ] ) ) {
                $level2[ $item->ID ] = [ 'item' => $item, 'children' => [] ];
            } else {
                $level3[ $pid ][] = $item;
            }
        }

        // Attach level-3 to level-2
        foreach ( $level3 as $pid => $grandkids ) {
            if ( isset( $level2[ $pid ] ) ) {
                $level2[ $pid ]['children'] = $grandkids;
            }
        }

        // Attach level-2 to level-1
        foreach ( $level2 as $id => $node ) {
            $pid = (int) $node['item']->menu_item_parent;
            if ( isset( $level1[ $pid ] ) ) {
                $level1[ $pid ]['children'][] = $node;
            }
        }

        return array_values( $level1 );
    }

    private function item_url( $item ) {
        return ! empty( $item->url ) ? esc_url( $item->url ) : '#';
    }

    /**
     * Recursively check if an item or any descendant is the current page.
     * $children can be WP_Post[] (level 3) or [ [ 'item', 'children' ] ][] (level 2).
     */
    private function is_active( $item, $children = [] ) {
        $flags = [ 'current-menu-item', 'current-menu-ancestor', 'current-menu-parent' ];
        foreach ( $flags as $f ) {
            if ( in_array( $f, (array) $item->classes ) ) return true;
        }
        foreach ( $children as $child ) {
            if ( is_array( $child ) ) {
                if ( $this->is_active( $child['item'], $child['children'] ) ) return true;
            } else {
                if ( in_array( 'current-menu-item', (array) $child->classes ) ) return true;
            }
        }
        return false;
    }

    /** Check if a level-2 node (or its grandchildren) is the current page. */
    private function child_node_is_active( $child_node ) {
        if ( in_array( 'current-menu-item',     (array) $child_node['item']->classes ) ) return true;
        if ( in_array( 'current-menu-ancestor',  (array) $child_node['item']->classes ) ) return true;
        foreach ( $child_node['children'] as $gc ) {
            if ( in_array( 'current-menu-item', (array) $gc->classes ) ) return true;
        }
        return false;
    }

    /* ═══════════════════════════════════════════════════════════
     * CONTROLS
     * ═══════════════════════════════════════════════════════════ */
    protected function _register_controls() {

        /* ── LOGO ── */
        $this->start_controls_section( 'section_logo', [ 'label' => __( 'Logo', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'logo_image', [ 'label' => __( 'Logo Image', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => [ 'url' => '' ], 'description' => __( 'Upload a logo. If empty the text logo is used.', 'plugin-name' ) ] );
            $this->add_responsive_control( 'logo_image_width', [ 'label' => __( 'Logo Width', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::SLIDER, 'size_units' => [ 'px', 'rem' ], 'range' => [ 'px' => [ 'min' => 40, 'max' => 300 ] ], 'default' => [ 'unit' => 'px', 'size' => 140 ], 'condition' => [ 'logo_image[url]!' => '' ], 'selectors' => [ '{{WRAPPER}} .sh-logo-img' => 'width: {{SIZE}}{{UNIT}}; height: auto;' ] ] );
            $this->add_control( 'logo_image_alt', [ 'label' => __( 'Logo Alt Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => get_bloginfo( 'name' ), 'condition' => [ 'logo_image[url]!' => '' ] ] );
            $this->add_control( 'logo_divider', [ 'label' => __( 'Text Logo (fallback when no image)', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::HEADING, 'separator' => 'before' ] );
            $this->add_control( 'logo_text_plain',  [ 'label' => __( 'Plain Part',  'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Euro' ] );
            $this->add_control( 'logo_text_accent', [ 'label' => __( 'Accent Part', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Safe' ] );
            $this->add_control( 'logo_url', [ 'label' => __( 'Logo Link URL', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => home_url( '/' ) ] ] );
        $this->end_controls_section();

        /* ── NAVIGATION MENU ── */
        $this->start_controls_section( 'section_nav', [ 'label' => __( 'Navigation Menu', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'nav_menu_info', [
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw'  => sprintf( '<p style="font-size:12px;line-height:1.6">Build your menu at <strong>Appearance → Menus</strong>.<br>• Level 1 items = top nav links<br>• Level 2 items = dropdown rows<br>• Level 3 items = fly-out submenu (opens to the right of the dropdown row)<br><a href="%s" target="_blank">Open Menu Editor ↗</a></p>', admin_url( 'nav-menus.php' ) ),
                'separator' => 'after',
            ] );
            $this->add_control( 'nav_menu', [ 'label' => __( 'Select WordPress Menu', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::SELECT, 'options' => $this->get_menus_options(), 'default' => '' ] );
            $this->add_control( 'nav_breakpoint', [ 'label' => __( 'Mobile Breakpoint (px)', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 768, 'min' => 320, 'max' => 1400, 'separator' => 'before', 'description' => __( 'Below this width the hamburger appears. Default: 768.', 'plugin-name' ) ] );
        $this->end_controls_section();

        /* ── CTA & PHONE ── */
        $this->start_controls_section( 'section_cta', [ 'label' => __( 'CTA & Phone', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'phone_display', [ 'label' => __( 'Phone Display Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '0800 123 456' ] );
            $this->add_control( 'phone_href',    [ 'label' => __( 'Phone href (tel:)',   'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'tel:+44800123456' ] );
            $this->add_control( 'cta_text', [ 'label' => __( 'CTA Button Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Get a Quote' ] );
            $this->add_control( 'cta_url',  [ 'label' => __( 'CTA Button URL',  'plugin-name' ), 'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => '#' ] ] );
        $this->end_controls_section();

        /* ── HEADER BEHAVIOUR ── */
        $this->start_controls_section( 'style_behaviour', [ 'label' => __( 'Header Behaviour', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'sticky_enabled', [ 'label' => __( 'Enable Sticky / Scroll Effect', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::SWITCHER, 'label_on' => 'Yes', 'label_off' => 'No', 'return_value' => 'yes', 'default' => 'yes' ] );
            $this->add_control( 'header_bg_initial',  [ 'label' => __( 'Initial Background (before scroll)', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'transparent', 'condition' => [ 'sticky_enabled' => 'yes' ] ] );
            $this->add_control( 'header_bg_scrolled', [ 'label' => __( 'Scrolled / Static Background', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(255,255,255,0.85)' ] );
        $this->end_controls_section();

        /* ── TEXT LOGO COLOURS ── */
        $this->start_controls_section( 'style_logo', [ 'label' => __( 'Text Logo Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'logo_icon_bg',     [ 'label' => __( 'Icon Background',   'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .sh-logo-icon' => 'background-color: {{VALUE}};' ] ] );
            $this->add_control( 'logo_icon_color',  [ 'label' => __( 'Icon Colour',        'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff', 'selectors' => [ '{{WRAPPER}} .sh-logo-icon' => 'color: {{VALUE}};' ] ] );
            $this->add_control( 'logo_plain_color', [ 'label' => __( 'Plain Text Colour',  'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff', 'selectors' => [ '{{WRAPPER}} .sh-logo-plain'  => 'color: {{VALUE}};' ] ] );
            $this->add_control( 'logo_accent_color',[ 'label' => __( 'Accent Text Colour', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .sh-logo-accent' => 'color: {{VALUE}};' ] ] );
        $this->end_controls_section();

        /* ── NAV LINKS — INITIAL ── */
        $this->start_controls_section( 'style_nav_initial', [ 'label' => __( 'Nav Links — Initial State', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE, 'condition' => [ 'sticky_enabled' => 'yes' ] ] );
            $this->add_control( 'nav_color_initial',   [ 'label' => __( 'Link Colour',              'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff' ] );
            $this->add_control( 'nav_hover_initial',   [ 'label' => __( 'Link Hover Colour',        'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF' ] );
            $this->add_control( 'nav_active_initial',  [ 'label' => __( 'Active / Current Colour',  'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF' ] );
            $this->add_control( 'phone_color_initial', [ 'label' => __( 'Phone Link Colour',        'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff' ] );
        $this->end_controls_section();

        /* ── NAV LINKS — STICKY ── */
        $this->start_controls_section( 'style_nav_sticky', [ 'label' => __( 'Nav Links — Sticky / Static State', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'nav_color_sticky',   [ 'label' => __( 'Link Colour',             'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A' ] );
            $this->add_control( 'nav_hover_sticky',   [ 'label' => __( 'Link Hover Colour',       'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF' ] );
            $this->add_control( 'nav_active_sticky',  [ 'label' => __( 'Active / Current Colour', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF' ] );
            $this->add_control( 'phone_color_sticky', [ 'label' => __( 'Phone Link Colour',       'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A' ] );
        $this->end_controls_section();

        /* ── DROPDOWN LEVEL 2 ── */
        $this->start_controls_section( 'style_dropdown', [ 'label' => __( 'Dropdown — Level 2', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'dropdown_bg',           [ 'label' => __( 'Background',          'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff', 'selectors' => [ '{{WRAPPER}} .sh-dropdown'            => 'background-color: {{VALUE}};' ] ] );
            $this->add_control( 'dropdown_link_color',   [ 'label' => __( 'Link Colour',          'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .sh-drop-link'            => 'color: {{VALUE}};' ] ] );
            $this->add_control( 'dropdown_hover_color',  [ 'label' => __( 'Link Hover Colour',    'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .sh-drop-link:hover'      => 'color: {{VALUE}};' ] ] );
            $this->add_control( 'dropdown_hover_bg',     [ 'label' => __( 'Link Hover BG',        'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .sh-drop-link:hover'      => 'background-color: {{VALUE}};' ] ] );
            $this->add_control( 'dropdown_active_color', [ 'label' => __( 'Active Item Colour',   'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .sh-drop-link.is-active'  => 'color: {{VALUE}};' ] ] );
            $this->add_control( 'dropdown_active_bg',    [ 'label' => __( 'Active Item BG',       'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .sh-drop-link.is-active'  => 'background-color: {{VALUE}};' ] ] );
        $this->end_controls_section();

        /* ── FLY-OUT LEVEL 3 ── */
        $this->start_controls_section( 'style_flyout', [ 'label' => __( 'Fly-out Submenu — Level 3', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'flyout_info', [ 'type' => \Elementor\Controls_Manager::RAW_HTML, 'raw' => '<p style="font-size:12px;line-height:1.5">Level-3 menu items open as a fly-out panel to the <strong>right side</strong> of the dropdown row they belong to.</p>', 'separator' => 'after' ] );
            $this->add_control( 'flyout_bg',           [ 'label' => __( 'Background',          'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff', 'selectors' => [ '{{WRAPPER}} .sh-flyout'               => 'background-color: {{VALUE}};' ] ] );
            $this->add_control( 'flyout_link_color',   [ 'label' => __( 'Link Colour',          'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .sh-flyout-link'          => 'color: {{VALUE}};' ] ] );
            $this->add_control( 'flyout_hover_color',  [ 'label' => __( 'Link Hover Colour',    'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .sh-flyout-link:hover'    => 'color: {{VALUE}};' ] ] );
            $this->add_control( 'flyout_hover_bg',     [ 'label' => __( 'Link Hover BG',        'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .sh-flyout-link:hover'    => 'background-color: {{VALUE}};' ] ] );
            $this->add_control( 'flyout_active_color', [ 'label' => __( 'Active Item Colour',   'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .sh-flyout-link.is-active'=> 'color: {{VALUE}};' ] ] );
            $this->add_control( 'flyout_active_bg',    [ 'label' => __( 'Active Item BG',       'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .sh-flyout-link.is-active'=> 'background-color: {{VALUE}};' ] ] );
            $this->add_control( 'flyout_arrow_color',  [ 'label' => __( 'Arrow Icon Colour',    'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .sh-flyout-arrow'         => 'color: {{VALUE}};' ] ] );
        $this->end_controls_section();

        /* ── CTA BUTTON ── */
        $this->start_controls_section( 'style_cta_btn', [ 'label' => __( 'CTA Button', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'cta_bg',         [ 'label' => __( 'Background',       'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF7A00', 'selectors' => [ '{{WRAPPER}} .sh-cta-btn'       => 'background-color: {{VALUE}};' ] ] );
            $this->add_control( 'cta_bg_hover',   [ 'label' => __( 'Hover Background', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#e56e00', 'selectors' => [ '{{WRAPPER}} .sh-cta-btn:hover' => 'background-color: {{VALUE}};' ] ] );
            $this->add_control( 'cta_text_color', [ 'label' => __( 'Text Colour',      'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff', 'selectors' => [ '{{WRAPPER}} .sh-cta-btn'       => 'color: {{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    /* ═══════════════════════════════════════════════════════════
     * RENDER
     * ═══════════════════════════════════════════════════════════ */
    protected function render() {
        $s         = $this->get_settings_for_display();
        $logo_url  = ! empty( $s['logo_url']['url'] ) ? esc_url( $s['logo_url']['url'] ) : home_url( '/' );
        $cta_url   = ! empty( $s['cta_url']['url'] )  ? esc_url( $s['cta_url']['url'] )  : '#';
        $menu_tree = $this->get_menu_tree( $s['nav_menu'] );

        $logo_img_url = ! empty( $s['logo_image']['url'] ) ? esc_url( $s['logo_image']['url'] ) : '';
        $logo_img_alt = ! empty( $s['logo_image_alt'] )   ? esc_attr( $s['logo_image_alt'] )   : esc_attr( get_bloginfo( 'name' ) );

        $sticky     = ( $s['sticky_enabled'] === 'yes' );
        $breakpoint = ! empty( $s['nav_breakpoint'] ) ? (int) $s['nav_breakpoint'] : 768;

        $nci  = esc_attr( $s['nav_color_initial']   ?? '#ffffff' );
        $nhi  = esc_attr( $s['nav_hover_initial']   ?? '#1E90FF' );
        $nai  = esc_attr( $s['nav_active_initial']  ?? '#1E90FF' );
        $pci  = esc_attr( $s['phone_color_initial'] ?? '#ffffff' );
        $ncs  = esc_attr( $s['nav_color_sticky']    ?? '#0B1F3A' );
        $nhs  = esc_attr( $s['nav_hover_sticky']    ?? '#1E90FF' );
        $nas  = esc_attr( $s['nav_active_sticky']   ?? '#1E90FF' );
        $pcs  = esc_attr( $s['phone_color_sticky']  ?? '#0B1F3A' );
        $bgi  = esc_attr( $s['header_bg_initial']   ?? 'transparent' );
        $bgs  = esc_attr( $s['header_bg_scrolled']  ?? 'rgba(255,255,255,0.85)' );

        $hstyle = $sticky ? "background-color:{$bgi};" : "background-color:{$bgs};";
        $nistyle = "color:{$nci};";
        $pistyle = "color:{$pci};";
        ?>
        <style>
            #main-header .sh-nav-link:hover          { color: var(--sh-nav-hover,  <?php echo $nhi; ?>) !important; }
            #main-header .sh-nav-link.is-active      { color: var(--sh-nav-active, <?php echo $nai; ?>) !important; }
            #main-header .sh-phone-link:hover        { color: var(--sh-nav-hover,  <?php echo $nhi; ?>) !important; }

            /* ── Breakpoint ── */
            #main-header .sh-desktop-nav,
            #main-header .sh-desktop-cta { display: none; }
            #main-header .sh-hamburger   { display: block; }
            @media (min-width: <?php echo $breakpoint; ?>px) {
                #main-header .sh-desktop-nav { display: flex !important; }
                #main-header .sh-desktop-cta { display: flex !important; }
                #main-header .sh-hamburger   { display: none  !important; }
                #mobile-menu                 { display: none  !important; }
            }

            /* ══ LEVEL-2 DROPDOWN ══ */
            .sh-dropdown {
                position: absolute; top: 100%; left: 0;
                min-width: 224px;
                border-radius: 12px;
                box-shadow: 0 20px 25px -5px rgba(0,0,0,.10), 0 8px 10px -6px rgba(0,0,0,.08);
                border: 1px solid #f3f4f6;
                overflow: visible; /* must be visible so flyout isn't clipped */
                opacity: 0; visibility: hidden; transform: translateY(8px);
                transition: opacity .2s ease, visibility .2s ease, transform .2s ease;
                z-index: 100;
            }
            .sh-nav-has-drop:hover > .sh-dropdown,
            .sh-nav-has-drop:focus-within > .sh-dropdown {
                opacity: 1; visibility: visible; transform: translateY(0);
            }

            /* ══ LEVEL-3 FLY-OUT ══ */
            .sh-drop-has-flyout { position: relative; }
            .sh-flyout {
                position: absolute;
                top: -1px;      /* align with parent row top */
                left: 100%;     /* open to the RIGHT */
                min-width: 200px;
                border-radius: 12px;
                box-shadow: 0 20px 25px -5px rgba(0,0,0,.10), 0 8px 10px -6px rgba(0,0,0,.08);
                border: 1px solid #f3f4f6;
                overflow: hidden;
                opacity: 0; visibility: hidden; transform: translateX(6px);
                transition: opacity .18s ease, visibility .18s ease, transform .18s ease;
                z-index: 200;
            }
            .sh-drop-has-flyout:hover > .sh-flyout,
            .sh-drop-has-flyout:focus-within > .sh-flyout {
                opacity: 1; visibility: visible; transform: translateX(0);
            }

            /* Arrow on level-2 rows that have a flyout */
            .sh-flyout-arrow { margin-left: auto; flex-shrink: 0; width: 14px; height: 14px; opacity: .6; }

            /* ── Shared link row styles ── */
            .sh-drop-link, .sh-flyout-link {
                display: flex; align-items: center; gap: 8px;
                padding: 10px 16px; font-size: .875rem;
                white-space: nowrap; text-decoration: none;
                transition: color .15s, background-color .15s;
            }
            .sh-drop-link + .sh-drop-link,
            .sh-flyout-link + .sh-flyout-link { border-top: 1px solid #f9fafb; }
        </style>

        <header id="main-header"
                class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-5"
                style="<?php echo $hstyle; ?>"
                data-sticky="<?php echo $sticky ? 'true' : 'false'; ?>"
                data-bg-initial="<?php echo $bgi; ?>"
                data-bg-scrolled="<?php echo $bgs; ?>"
                data-nav-color-initial="<?php echo $nci; ?>"
                data-nav-hover-initial="<?php echo $nhi; ?>"
                data-nav-active-initial="<?php echo $nai; ?>"
                data-phone-color-initial="<?php echo $pci; ?>"
                data-nav-color-sticky="<?php echo $ncs; ?>"
                data-nav-hover-sticky="<?php echo $nhs; ?>"
                data-nav-active-sticky="<?php echo $nas; ?>"
                data-phone-color-sticky="<?php echo $pcs; ?>"
                data-breakpoint="<?php echo $breakpoint; ?>">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">

                <!-- LOGO -->
                <a href="<?php echo $logo_url; ?>" class="flex items-center gap-2" aria-label="<?php echo $logo_img_alt; ?>">
                    <?php if ( $logo_img_url ) : ?>
                        <img src="<?php echo $logo_img_url; ?>" alt="<?php echo $logo_img_alt; ?>" class="sh-logo-img block" />
                    <?php else : ?>
                        <div class="sh-logo-icon p-2 rounded-lg"><i data-lucide="shield-check"></i></div>
                        <span class="sh-logo-plain font-heading font-bold text-2xl" style="<?php echo $nistyle; ?>">
                            <?php echo esc_html( $s['logo_text_plain'] ); ?><span class="sh-logo-accent"><?php echo esc_html( $s['logo_text_accent'] ); ?></span>
                        </span>
                    <?php endif; ?>
                </a>

                <!-- DESKTOP NAV -->
                <nav class="sh-desktop-nav items-center gap-8 font-medium" aria-label="Primary navigation">
                    <?php if ( empty( $menu_tree ) ) : ?>
                        <span style="opacity:.5;font-size:.875rem;font-style:italic;">No menu selected.</span>
                    <?php else :
                        foreach ( $menu_tree as $node ) :
                            $item      = $node['item'];
                            $children  = $node['children']; // [ [ 'item'=>WP_Post, 'children'=>WP_Post[] ], … ]
                            $has_drop  = ! empty( $children );
                            $url       = $this->item_url( $item );
                            $is_active = $this->is_active( $item, $children );
                    ?>

                        <?php if ( $has_drop ) : ?>
                            <!-- Level 1 WITH dropdown -->
                            <div class="sh-nav-has-drop" style="position:relative;">
                                <a href="<?php echo $url; ?>"
                                   class="sh-nav-link <?php echo $is_active ? 'is-active' : ''; ?> transition-colors flex items-center gap-1 py-2"
                                   style="<?php echo $nistyle; ?>"
                                   aria-haspopup="true">
                                    <?php echo esc_html( $item->title ); ?>
                                    <i data-lucide="chevron-down" style="width:16px;height:16px;transition:transform .2s;"></i>
                                </a>

                                <!-- Level-2 dropdown -->
                                <div class="sh-dropdown" role="menu">
                                    <?php foreach ( $children as $child_node ) :
                                        $child      = $child_node['item'];
                                        $grandkids  = $child_node['children']; // plain WP_Post[]
                                        $has_flyout = ! empty( $grandkids );
                                        $child_url  = $this->item_url( $child );
                                        $child_act  = $this->child_node_is_active( $child_node );
                                    ?>
                                        <?php if ( $has_flyout ) : ?>
                                            <!-- Level-2 WITH fly-out -->
                                            <div class="sh-drop-has-flyout" role="none">
                                                <a href="<?php echo $child_url; ?>"
                                                   class="sh-drop-link <?php echo $child_act ? 'is-active' : ''; ?>"
                                                   role="menuitem"
                                                   aria-haspopup="true">
                                                    <?php echo esc_html( $child->title ); ?>
                                                    <i data-lucide="chevron-right" class="sh-flyout-arrow"></i>
                                                </a>

                                                <!-- Level-3 fly-out (right side) -->
                                                <div class="sh-flyout" role="menu">
                                                    <?php foreach ( $grandkids as $gc ) :
                                                        $gc_url = $this->item_url( $gc );
                                                        $gc_act = in_array( 'current-menu-item', (array) $gc->classes );
                                                    ?>
                                                        <a href="<?php echo $gc_url; ?>"
                                                           class="sh-flyout-link <?php echo $gc_act ? 'is-active' : ''; ?>"
                                                           role="menuitem">
                                                            <?php echo esc_html( $gc->title ); ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>

                                        <?php else : ?>
                                            <!-- Level-2 plain link -->
                                            <a href="<?php echo $child_url; ?>"
                                               class="sh-drop-link <?php echo $child_act ? 'is-active' : ''; ?>"
                                               role="menuitem">
                                                <?php echo esc_html( $child->title ); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div><!-- /.sh-dropdown -->
                            </div><!-- /.sh-nav-has-drop -->

                        <?php else : ?>
                            <!-- Level-1 plain link -->
                            <a href="<?php echo $url; ?>"
                               class="sh-nav-link <?php echo $is_active ? 'is-active' : ''; ?> transition-colors"
                               style="<?php echo $nistyle; ?>">
                                <?php echo esc_html( $item->title ); ?>
                            </a>
                        <?php endif; ?>

                    <?php endforeach; endif; ?>
                </nav>

                <!-- DESKTOP CTA -->
                <div class="sh-desktop-cta items-center gap-4">
                    <a href="<?php echo esc_attr( $s['phone_href'] ); ?>"
                       class="sh-phone-link flex items-center gap-2 font-semibold transition-colors"
                       style="<?php echo $pistyle; ?>">
                        <i data-lucide="phone" style="width:16px;height:16px;"></i>
                        <span><?php echo esc_html( $s['phone_display'] ); ?></span>
                    </a>
                    <a href="<?php echo $cta_url; ?>"
                       class="sh-cta-btn text-white px-6 py-2.5 rounded-full font-semibold transition-all transform hover:scale-105 shadow-lg">
                        <?php echo esc_html( $s['cta_text'] ); ?>
                    </a>
                </div>

                <!-- MOBILE HAMBURGER -->
                <button id="mobile-menu-btn"
                        class="sh-hamburger sh-nav-link transition-colors"
                        style="<?php echo $nistyle; ?>"
                        aria-label="Toggle mobile menu"
                        aria-expanded="false"
                        aria-controls="mobile-menu">
                    <i data-lucide="menu"></i>
                </button>
            </div>

            <!-- MOBILE MENU (3-level indented list) -->
            <div id="mobile-menu"
                 class="hidden absolute top-full left-0 right-0 glass border-t border-white/20 p-4 flex-col gap-2 shadow-xl"
                 role="navigation"
                 aria-label="Mobile navigation">

                <?php if ( ! empty( $menu_tree ) ) :
                    foreach ( $menu_tree as $node ) :
                        $item       = $node['item'];
                        $children   = $node['children'];
                        $has_drop   = ! empty( $children );
                        $url        = $this->item_url( $item );
                        $mob_active = $this->is_active( $item, $children );
                ?>
                    <?php if ( $has_drop ) : ?>
                        <div class="p-2">
                            <div style="color:#0B1F3A;font-weight:600;margin-bottom:6px;"><?php echo esc_html( $item->title ); ?></div>
                            <div style="padding-left:14px;border-left:2px solid rgba(30,144,255,.2);margin-left:6px;display:flex;flex-direction:column;gap:4px;">
                                <?php foreach ( $children as $child_node ) :
                                    $child      = $child_node['item'];
                                    $grandkids  = $child_node['children'];
                                    $has_flyout = ! empty( $grandkids );
                                    $child_url  = $this->item_url( $child );
                                    $child_act  = $this->child_node_is_active( $child_node );
                                    $cstyle     = $child_act ? 'color:#1E90FF;font-weight:600;' : 'color:rgba(11,31,58,.8);';
                                ?>
                                    <?php if ( $has_flyout ) : ?>
                                        <!-- Mobile level-2 group with level-3 children -->
                                        <div>
                                            <a href="<?php echo $child_url; ?>" style="<?php echo $cstyle; ?>display:block;padding:4px 0;font-size:.875rem;">
                                                <?php echo esc_html( $child->title ); ?>
                                            </a>
                                            <!-- Level-3: deeper indent -->
                                            <div style="padding-left:14px;border-left:2px solid rgba(30,144,255,.12);margin-left:6px;margin-top:4px;display:flex;flex-direction:column;gap:2px;">
                                                <?php foreach ( $grandkids as $gc ) :
                                                    $gc_url = $this->item_url( $gc );
                                                    $gc_act = in_array( 'current-menu-item', (array) $gc->classes );
                                                    $gstyle = $gc_act ? 'color:#1E90FF;font-weight:600;' : 'color:rgba(11,31,58,.65);';
                                                ?>
                                                    <a href="<?php echo $gc_url; ?>" style="<?php echo $gstyle; ?>display:block;padding:3px 0;font-size:.8125rem;">
                                                        <?php echo esc_html( $gc->title ); ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <a href="<?php echo $child_url; ?>" style="<?php echo $cstyle; ?>display:block;padding:4px 0;font-size:.875rem;">
                                            <?php echo esc_html( $child->title ); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    <?php else : ?>
                        <?php $mstyle = $mob_active ? 'color:#1E90FF;font-weight:600;' : 'color:#0B1F3A;font-weight:500;'; ?>
                        <a href="<?php echo $url; ?>" style="<?php echo $mstyle; ?>display:block;padding:8px;">
                            <?php echo esc_html( $item->title ); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; endif; ?>

                <div style="height:1px;background:rgba(11,31,58,.1);margin:8px 0;"></div>
                <a href="<?php echo $cta_url; ?>" class="sh-cta-btn text-white px-6 py-3 rounded-xl font-semibold w-full text-center block">
                    <?php echo esc_html( $s['cta_text'] ); ?>
                </a>
            </div>
        </header>

        <script>
        (function() {
            const header = document.getElementById('main-header');
            if ( ! header ) return;

            const sticky         = header.dataset.sticky === 'true';
            const bgInitial      = header.dataset.bgInitial        || 'transparent';
            const bgScrolled     = header.dataset.bgScrolled       || 'rgba(255,255,255,0.85)';
            const navInitial     = header.dataset.navColorInitial  || '#ffffff';
            const navHoverInit   = header.dataset.navHoverInitial  || '#1E90FF';
            const navActiveInit  = header.dataset.navActiveInitial || '#1E90FF';
            const phoneInit      = header.dataset.phoneColorInitial|| '#ffffff';
            const navSticky      = header.dataset.navColorSticky   || '#0B1F3A';
            const navHoverStick  = header.dataset.navHoverSticky   || '#1E90FF';
            const navActiveStick = header.dataset.navActiveSticky  || '#1E90FF';
            const phoneSticky    = header.dataset.phoneColorSticky || '#0B1F3A';
            const breakpoint     = parseInt( header.dataset.breakpoint || '768', 10 );

            const desktopNav = header.querySelector('.sh-desktop-nav');
            const desktopCta = header.querySelector('.sh-desktop-cta');
            const hamburger  = header.querySelector('#mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const navLinks   = header.querySelectorAll('.sh-nav-link');
            const phoneLinks = header.querySelectorAll('.sh-phone-link');

            /* ── Breakpoint ── */
            function applyBreakpoint() {
                const isMobile = window.innerWidth < breakpoint;
                if ( desktopNav ) desktopNav.style.display = isMobile ? 'none' : 'flex';
                if ( desktopCta ) desktopCta.style.display = isMobile ? 'none' : 'flex';
                if ( hamburger  ) hamburger.style.display  = isMobile ? 'block' : 'none';
                if ( ! isMobile && mobileMenu && ! mobileMenu.classList.contains('hidden') ) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.style.display = '';
                    if ( hamburger ) hamburger.setAttribute('aria-expanded', 'false');
                }
            }
            window.addEventListener('resize', applyBreakpoint, { passive: true });
            applyBreakpoint();

            /* ── Colours ── */
            function applyColors( isScrolled ) {
                const navCol    = isScrolled ? navSticky      : navInitial;
                const navHover  = isScrolled ? navHoverStick  : navHoverInit;
                const navActive = isScrolled ? navActiveStick : navActiveInit;
                const phoneCol  = isScrolled ? phoneSticky    : phoneInit;

                header.style.setProperty('--sh-nav-hover',  navHover);
                header.style.setProperty('--sh-nav-active', navActive);

                navLinks.forEach(function(el) {
                    el.style.color = el.classList.contains('is-active') ? navActive : navCol;
                });
                phoneLinks.forEach(function(el) { el.style.color = phoneCol; });
                if ( hamburger ) hamburger.style.color = navCol;
            }

            /* ── Mobile menu toggle ── */
            if ( hamburger && mobileMenu ) {
                hamburger.addEventListener('click', function() {
                    const isOpen = ! mobileMenu.classList.contains('hidden');
                    if ( isOpen ) {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.style.display = '';
                        hamburger.setAttribute('aria-expanded', 'false');
                        const ico = hamburger.querySelector('i[data-lucide]');
                        if ( ico ) { ico.setAttribute('data-lucide','menu'); if(window.lucide) lucide.createIcons(); }
                    } else {
                        mobileMenu.classList.remove('hidden');
                        mobileMenu.style.display = 'flex';
                        hamburger.setAttribute('aria-expanded', 'true');
                        const ico = hamburger.querySelector('i[data-lucide]');
                        if ( ico ) { ico.setAttribute('data-lucide','x'); if(window.lucide) lucide.createIcons(); }
                    }
                });
                mobileMenu.querySelectorAll('a').forEach(function(link) {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.style.display = '';
                        hamburger.setAttribute('aria-expanded', 'false');
                        const ico = hamburger.querySelector('i[data-lucide]');
                        if ( ico ) { ico.setAttribute('data-lucide','menu'); if(window.lucide) lucide.createIcons(); }
                    });
                });
            }

            /* ── Sticky scroll ── */
            if ( ! sticky ) {
                header.style.backgroundColor = bgScrolled;
                applyColors( true );
                return;
            }

            function onScroll() {
                const isScrolled = window.scrollY > 20;
                if ( isScrolled ) {
                    header.classList.add('glass','py-3','shadow-sm');
                    header.classList.remove('py-5');
                    header.style.backgroundColor = bgScrolled;
                } else {
                    header.classList.remove('glass','py-3','shadow-sm');
                    header.classList.add('py-5');
                    header.style.backgroundColor = bgInitial;
                }
                applyColors( isScrolled );
            }
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        })();
        </script>
        <?php
    }
}