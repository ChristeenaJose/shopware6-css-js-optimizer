<?php declare(strict_types=1);

namespace CssJsOptimizer\Service;

use Shopware\Core\System\SystemConfig\SystemConfigService;

class ConfigService
{
    private const PREFIX = 'CssJsOptimizer.config.';

    public function __construct(private SystemConfigService $config) {}

    public function enabled(): bool {
        return (bool) $this->config->get(self::PREFIX.'enabled');
    }

    public function categoryCss(): string {
        return (string) $this->config->get(self::PREFIX.'categoryCss');
    }

    public function productCss(): string {
        return (string) $this->config->get(self::PREFIX.'productCss');
    }

    public function otherCss(): string {
        return (string) $this->config->get(self::PREFIX.'otherCss');
    }

    public function delayTracking(): bool {
        return (bool) $this->config->get(self::PREFIX.'delayTracking');
    }

    public function trackingDelay(): int {
        return (int) $this->config->get(self::PREFIX.'trackingDelaySeconds');
    }
}
