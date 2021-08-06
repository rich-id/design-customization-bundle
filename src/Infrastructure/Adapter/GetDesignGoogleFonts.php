<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Adapter;

use RichId\DesignCustomizationBundle\Domain\Model\GoogleFont;
use RichId\DesignCustomizationBundle\Domain\Port\GetDesignGoogleFontsInterface;
use RichId\DesignCustomizationBundle\Infrastructure\Cache\GoogleFontCache;

class GetDesignGoogleFonts implements GetDesignGoogleFontsInterface
{
    /** @var GoogleFontCache */
    protected $googleFontCache;

    public function __construct(GoogleFontCache $googleFontCache)
    {
        $this->googleFontCache = $googleFontCache;
    }

    /** @return GoogleFont[] */
    public function getGoogleFonts(): array
    {
        return $this->googleFontCache->getGoogleFonts();
    }
}
