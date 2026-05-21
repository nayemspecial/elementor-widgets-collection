# PPA Elementor Widgets Collection

A professional, lightweight, and performance-optimized custom Elementor addon plugin — built for the **ProjuktiPlus Academy** community to demonstrate real-world WordPress and Elementor widget development.

>  Developed by **Md. Nayemur Rahman** | Instructor, ProjuktiPlus Academy

---

##  Features at a Glance

- 7 custom Elementor widgets, all prefixed with `PPA_` for zero conflicts
- Assets enqueued **only when widgets are active** — no bloat
- Full **Elementor Controls API** usage: Repeater, Icons Manager, Typography, Color Picker
- Output sanitized with `esc_html()`, `esc_attr()`, and `esc_url()` throughout
- Slick Carousel integrated as a shared, registered dependency

---

##  Widgets Included

| Widget | Description |
|---|---|
| **PPA Blog Card** | Displays posts in a clean grid card layout |
| **PPA Team Member** | Slick Slider-powered team showcase with flip hover effects and social icons |
| **PPA Slider** | General-purpose image/content slider using Slick Carousel |
| **PPA Call to Action** | Customizable CTA section with button and background controls |
| **PPA Newsletter Subscriber** | Styled newsletter signup form with full design control |
| **PPA Pricing Table** | Feature-rich pricing card with badge support, repeater-based feature list, and CTA |
| **PPA Testimonial Slider** | Animated testimonial carousel with Slick integration |

---

##  Project Structure

```
elementor-widgets-collection/
├── assets/
│   ├── css/
│   │   ├── cta.css
│   │   ├── newsletter.css
│   │   ├── pricing-table.css
│   │   ├── slick.min.css
│   │   ├── style.css
│   │   └── testimonial.css
│   └── js/
│       ├── cta.js
│       ├── custom.js
│       ├── main.js
│       ├── slick.min.js
│       └── testimonial.js
├── widgets/
│   ├── blog-widget.php
│   ├── call-to-action-widget.php
│   ├── newsletter-widget.php
│   ├── pricing-table-widget.php
│   ├── slider-widget.php
│   ├── team-member.php
│   └── testimonial-slider-widget.php
├── ppa-elementor-addon.php   ← Main plugin entry point
├── LICENSE
└── README.md
```

---

##  Installation

### Requirements
- WordPress **5.0+**
- [Elementor Page Builder](https://wordpress.org/plugins/elementor/) — must be installed and **active**
- PHP **7.4+**

### Steps

1. **Download** — Clone this repository or download as a `.zip` file
   ```bash
   git clone https://github.com/your-username/elementor-widgets-collection.git
   ```
2. **Upload** — Go to `WordPress Dashboard → Plugins → Add New → Upload Plugin`, then select the `.zip` file
3. **Activate** — Click **Activate Plugin**
4. **Use** — Open any page with Elementor editor, then search for **"PPA"** in the widget panel

---

##  Technical Highlights

**Security**
All dynamic output is properly sanitized using WordPress escaping functions — `esc_html()`, `esc_attr()`, and `esc_url()` — preventing XSS vulnerabilities.

**Performance**
CSS and JS assets are registered via `wp_register_style()` / `wp_register_script()` and enqueued conditionally — only loaded when the relevant widget is present on the page.

**Conflict Prevention**
All classes, functions, hooks, and asset handles are prefixed with `ppa_` or `PPA_` to prevent naming collisions with themes or other plugins.

**Modern Elementor API**
Uses up-to-date Elementor APIs including `Icons_Manager` for SVG icon support and `Repeater` for dynamic, user-managed content blocks.

---

##  About the Author

**Md. Nayemur Rahman**
WordPress & Laravel Developer | Instructor at ProjuktiPlus Academy

Specializes in building scalable web solutions and teaching modern development workflows to Bengali developers.

- 🔗 [Facebook](https://www.facebook.com/nayemspecial)
- 🔗 [LinkedIn](https://www.linkedin.com/in/nayemspecial)

---

## License

This project is licensed under the **GPL-2.0 License** — see the [LICENSE](LICENSE) file for full details.

---

<p align="center">Made with ❤️ for the <strong>ProjuktiPlus</strong> developer community</p>
