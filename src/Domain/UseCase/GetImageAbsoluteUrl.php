<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Port\UrlGeneratorInterface;

class GetImageAbsoluteUrl
{
    /** @var GetImagePath */
    protected $getImagePath;

    /** @var UrlGeneratorInterface */
    protected $urlGenerator;

    public function __construct(GetImagePath $getImagePath, UrlGeneratorInterface $urlGenerator)
    {
        $this->getImagePath = $getImagePath;
        $this->urlGenerator = $urlGenerator;
    }

    public function __invoke(string $configurationSlug): string
    {
        $path = ($this->getImagePath)($configurationSlug);

        if ($path === null || $path === '') {
            return '';
        }

        return $this->urlGenerator->getAbsoluteUrlFromPath($path);
    }
}
