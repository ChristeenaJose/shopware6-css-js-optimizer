<?php declare(strict_types=1);

namespace CssJsOptimizer\Subscriber;

use Shopware\Storefront\Event\StorefrontRenderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use CssJsOptimizer\Service\ConfigService;

class StorefrontSubscriber implements EventSubscriberInterface
{
    public function __construct(private ConfigService $config) {}

    public static function getSubscribedEvents(): array
    {
        return [
            StorefrontRenderEvent::class => 'onRender'
        ];
    }

    public function onRender(StorefrontRenderEvent $event): void
    {
        if (!$this->config->enabled()) {
            return;
        }

        $route = $event->getRequest()->attributes->get('_route');

        $criticalCss = '';

        if ($route === 'frontend.navigation.page') {
            $criticalCss = $this->config->categoryCss();
            $criticalFile = '@CssJsOptimizer/critical/critical-category.css';

        } elseif ($route === 'frontend.detail.page') {
            $criticalCss = $this->config->productCss();
            $criticalFile = '@CssJsOptimizer/critical/critical-product.css';

        } else {
            $criticalCss = $this->config->otherCss();
            $criticalFile = '@CssJsOptimizer/critical/critical-other.css';
        }

        $event->setParameter('route', $route);
        $event->setParameter('criticalCssOverride', $criticalCss);
        $event->setParameter('criticalCssFile', $criticalFile);

        $event->setParameter('delayTracking', $this->config->delayTracking());
        $event->setParameter('trackingDelay', $this->config->trackingDelay());
    }
}
