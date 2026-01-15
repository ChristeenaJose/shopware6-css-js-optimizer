# CssJsOptimizer – Shopware 6 Storefront Performance Plugin

A lightweight Shopware 6 plugin to eliminate render-blocking CSS and JavaScript in the storefront and improve Core Web Vitals (FCP, LCP, TTI), especially on mobile devices.

---

## Features

- Async loading of non-critical CSS
- Defer non-critical JavaScript
- Compatible with Shopware 6.5+
- No core file overrides
- Zero configuration by default

---

## Motivation

The default Shopware storefront loads multiple CSS and JS assets synchronously, which:

- Blocks rendering
- Delays First Contentful Paint (FCP)
- Degrades Largest Contentful Paint (LCP)
- Reduces Google PageSpeed mobile scores

CssJsOptimizer restructures asset loading to improve both perceived and measured performance.

---

## Installation

### Via Git

cd custom/plugins
git clone https://github.com/yourname/shopware6-css-js-optimizer.git CssJsOptimizer

bin/console plugin:refresh
bin/console plugin:install --activate CssJsOptimizer

## Usage

Once activated, the plugin works automatically.

No configuration required.

Optional (if implemented):

- Exclude specific JS files

- Enable critical CSS injection

## How it works (technical overview)

- Hooks into storefront rendering pipeline

- Converts blocking CSS <link> tags to preload + async loading pattern

Adds defer attribute to non-critical JS files

Preserves execution order for required scripts

## Example performance impact
Metric	Before	After
FCP	3.0s	1.4s
LCP	5.1s	2.3s
PageSpeed Mobile	44	86

(Replace with your real measurements)

## Compatibility

Shopware 6.5+

PHP 8.0+

Default Storefront theme

## Known limitations

Third-party scripts (tracking, ads) are not optimized

Critical CSS must be generated separately

Complex themes may require exclusions

## Roadmap

Admin configuration UI

Critical CSS auto-generator

Per-route optimization rules

Bulk asset grouping

## License

MIT

## Author

Christeena
