<?php

namespace Plugin\ShareThis;

use Eccube\Event\TemplateEvent;
use Plugin\ShareThis\Repository\ShareThisConfigRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ShareThisEvent implements EventSubscriberInterface
{
    private ShareThisConfigRepository $configRepository;

    public function __construct(ShareThisConfigRepository $configRepository)
{
    $this->configRepository = $configRepository;
}

    public static function getSubscribedEvents()
    {
        return [
            'Product/detail.twig'=>'productDetail'
        ];
    }

    public function productDetail(TemplateEvent $event)
    {
        $config=$this->configRepository->get();
        if (!is_null($config)){
            $event->addSnippet('ShareThis/Resource/template/default/share.html.twig');
            $params=$event->getParameters();
            $params['property_id']=$config->getPropertyId();
            $params['display_inline']=$config->isDisplayInline();
            $params['inline_selector']=$config->getInlineSelector()?:'.ec-productRole__title';
            $event->setParameters($params);
        }
    }
}