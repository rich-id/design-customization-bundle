<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Adapter;

use RichId\DesignCustomizationBundle\Domain\Port\GetCustomFontInterface;
use RichId\DesignCustomizationBundle\Infrastructure\Cache\CustomFontCache;

class GetCustomFont implements GetCustomFontInterface
{
    /** @var CustomFontCache */
    protected $customFontCache;

    public function __construct(CustomFontCache $customFontCache)
    {
        $this->customFontCache = $customFontCache;
    }

    public function getCustomFontUrlFor(string $fontFamily): ?string
    {
        return $this->customFontCache->getCustomFontUrlFor($fontFamily);
    }

    /** @return array<string, string> */
    public function getCustomFonts(): array
    {
        return $this->customFontCache->getCustomFonts();
    }
}
