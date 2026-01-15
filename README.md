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

```bash
cd custom/plugins
git clone https://github.com/yourname/shopware6-css-js-optimizer.git CssJsOptimizer
