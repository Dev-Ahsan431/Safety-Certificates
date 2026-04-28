# HTML to Elementor – Plugin

One plugin. Two jobs:
1. Loads your global `style.css` and `main.js` on every page (and inside the Elementor editor preview).
2. Auto-registers every widget file found in `/widgets/` under the **HTE Widgets** Elementor panel category.

---

## Initial setup

| Step | What to do |
|------|-----------|
| 1 | Install & activate the plugin |
| 2 | Copy your CSS → `assets/css/style.css` |
| 3 | Copy your JS  → `assets/js/main.js` |
| 4 | Done — assets load automatically |

---

## Adding a new widget (one per HTML section)

1. Copy `widgets/widget-example.php` → `widgets/widget-<your-slug>.php`
2. Rename the **class** to match:  
   `widget-hero-section.php` → class `HTE_Widget_Hero_Section`
3. Update `get_name()`, `get_title()`, controls, and `render()`
4. Save — widget appears immediately in Elementor → **HTE Widgets**

No plugin edits needed. Just drop the file in.

---

## Common control types

| Need | Type constant |
|------|--------------|
| Short text | `Controls_Manager::TEXT` |
| Long text | `Controls_Manager::TEXTAREA` |
| Rich text (WYSIWYG) | `Controls_Manager::WYSIWYG` |
| Image | `Controls_Manager::MEDIA` |
| URL / link | `Controls_Manager::URL` |
| Color | `Controls_Manager::COLOR` |
| Typography | `Group_Control_Typography` |
| Icon | `Controls_Manager::ICONS` |
| Toggle | `Controls_Manager::SWITCHER` |
| Dropdown | `Controls_Manager::SELECT` |
| Number | `Controls_Manager::NUMBER` |
| Padding / margin | `Controls_Manager::DIMENSIONS` |
| Repeating list | `\Elementor\Repeater` |

---

## Repeater snippet

```php
$repeater = new \Elementor\Repeater();
$repeater->add_control( 'title', [ 'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT ] );
$repeater->add_control( 'icon',  [ 'label' => 'Icon',  'type' => \Elementor\Controls_Manager::ICONS ] );

$this->add_control( 'items', [
    'label'       => __( 'Items', 'html-to-elementor' ),
    'type'        => \Elementor\Controls_Manager::REPEATER,
    'fields'      => $repeater->get_controls(),
    'title_field' => '{{{ title }}}',
] );

// In render():
foreach ( $s['items'] as $item ) {
    echo '<div>' . esc_html( $item['title'] ) . '</div>';
}
```
