# Pyarelal — WooCommerce theme for plkart.com

Editorial-luxury WordPress theme for **Pyarelal Handloom & Handicraft** — handmade
rugs, carpets, dhurries and mats, woven in Varanasi. Ivory / terracotta / antique-gold
palette, Fraunces serif. Lightweight, **no page builder**.

The repository root **is** the theme folder (`style.css` lives at the root), so WP Pusher
can install it directly and `git push` → live.

## Files
| File | Purpose |
|------|---------|
| `style.css` | Theme header + all CSS (incl. WooCommerce brand layer) |
| `functions.php` | Theme setup, WooCommerce support + product-gallery, assets, SEO/schema, analytics |
| `header.php` / `footer.php` | Store chrome: topbar, nav, cart count, WhatsApp float |
| `front-page.php` | Storefront homepage (hero, categories, featured products, story, craft) |
| `woocommerce.php` | Wraps shop / category / single-product pages in the theme |
| `page.php` · `single.php` · `index.php` | Pages, blog posts, archive fallback |
| `inc/customizer.php` | No-code settings (contact, hero, SEO, GA4/Pixel) |
| `inc/woo.php` | WooCommerce wrapper, grid density, live cart fragment |
| `assets/` | `app.js`, `logo.svg`, `logo-light.svg` |

## WooCommerce
Products, orders, cart, checkout and all store data stay **inside WooCommerce** — this
theme only styles and wraps them. Declares `woocommerce` support plus product-gallery
zoom / lightbox / slider. WooCommerce's own styles stay enabled; the theme layers a
terracotta/gold brand skin on top so cart & checkout work out of the box.

## No-code settings
**Appearance → Customize → "Pyarelal …"**: phone/WhatsApp/email, the homepage hero
(eyebrow, headline, sub-text, optional hero image), the homepage meta description, and
GA4 / Meta Pixel IDs. Upload a logo under **Site Identity** (falls back to `assets/logo.svg`).

## Expected pages / category slugs
The nav and footer link to: `product-category/rugs-carpets`, `/dhurries`, `/mats`,
`/runners`, and pages `our-story`, `the-craft`, `contact`, `shipping-delivery`,
`returns-refunds`, `privacy-policy`. Create these product categories / pages in wp-admin
(ready-to-paste page copy for Our Story / Shipping / Returns / Privacy lives in the
Pyarelal page-copy sheet). Links degrade gracefully if a slug doesn't exist yet.

## Deploy (WP Pusher OTA)
1. wp-admin → Plugins → add **WP Pusher** → activate.
2. WP Pusher → **Install Theme** → from GitHub → `sharid023/plkart-site`, branch `main`,
   leave *theme subdirectory* blank (repo root = theme).
3. Turn on **Push-to-Deploy** and add the webhook to the repo so every `git push` updates
   the live theme.

> This is a live store. Back up first and keep the current theme installed for one-click
> rollback. Activating this theme replaces page-builder layouts with coded templates; it
> does **not** touch products or orders.
