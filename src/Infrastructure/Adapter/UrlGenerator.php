<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Adapter;

use RichId\DesignCustomizationBundle\Domain\Port\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\UrlHelper;

class UrlGenerator implements UrlGeneratorInterface
{
    /** @var UrlHelper */
    protected $urlHelper;

    public function __construct(UrlHelper $urlHelper)
    {
        $this->urlHelper = $urlHelper;
    }

    public function getAbsoluteUrlFromPath(string $path): string
    {
        return $this->urlHelper->getAbsoluteUrl($path);
    }
}
