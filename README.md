# PPA Elementor Widgets Collection

A professional, lightweight and performance-optimized Elementor addon collection. This project is developed by **Md. Nayemur Rahman** for the **ProjuktiPlus** community to demonstrate custom widget development using WordPress and Elementor APIs.

## Features & Widgets

| Widget Name | Key Functionalities | Tech Stack |
| :--- | :--- | :--- |
| **PPA Team Member** | Slick Slider integration, Flip hover effects, Social icons. | PHP, JS, Slick |
| **PPA Service Card** | Customizable icons, Dynamic typography, Hover animations. | PHP, CSS |
| **PPA Pricing Table** | Badge support, Feature list repeater, CTA styling. | PHP, CSS |

## Technical Excellence

* **Security:** Comprehensive data validation and output escaping using `esc_html()`, `esc_attr()`, and `esc_url()`.
* **Performance:** Assets (CSS/JS) are enqueued only when the widgets are active.
* **Modern API:** Uses the latest `Icons_Manager` for SVG support and `Repeater` for dynamic content handling.
* **Conflict Prevention:** All classes, functions, and variables are prefixed with `ppa_` or `PPA_`.



## Project Structure
```text
elementor-widgets-collection/
├── assets/
│   ├── css/
│   └── js/
├── includes/
│   └── widgets/
│       ├── ppa-team-members.php
│       └── ppa-service-card.php
├── ppa-elementor-addons.php  # Main Plugin Entry Point
└── README.md

```
## Prerequisites:
Elementor Page Builder must be installed and active on your WordPress site.

## ⚙️ Installation & Usage

1. **Download:** Clone or download this repository as a `.zip` file.
2. **Upload:** Go to your WordPress Dashboard > Plugins > Add New > Upload Plugin.
3. **Activate:** Once activated, open any page with Elementor.
4. **Find:** Search for **"PPA"** in the Elementor widget panel to find all custom elements.

## 🤝 About the Author

I am **Md. Nayemur Rahman**, a Passionate WordPress and Laravel Developer. Instructor, **ProjuktiPlus Academy**. I specialize in creating scalable web solutions and teaching modern development workflows.

<!-- * **Portfolio:** [nayem.online](https://nayem.online) -->
* **Facebook:** (https://www.facebook.com/nayemspecial)
* **LinkedIn:**(https://www.linkedin.com/in/nayemspecial)
<!-- * **Agency:** [ProjuktiPlus](https://projuktiplus.com) -->
