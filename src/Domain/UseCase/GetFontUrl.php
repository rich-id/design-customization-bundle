<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Port\GetCustomFontInterface;

class GetFontUrl
{
    public const GOOGLE_FONT_URL = 'https://fonts.googleapis.com/css2?family=%s:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

    /** @var GetFontFamily */
    protected $getFontFamily;

    /** @var GetCustomFontInterface */
    protected $getCustomFont;

    public function __construct(GetFontFamily $getFontFamily, GetCustomFontInterface $getCustomFont)
    {
        $this->getFontFamily = $getFontFamily;
        $this->getCustomFont = $getCustomFont;
    }

    public function __invoke(string $configurationSlug): ?string
    {
        $fontFamily = ($this->getFontFamily)($configurationSlug);

        if ($fontFamily === null) {
            return null;
        }

        $customFontUrl = $this->getCustomFont->getCustomFontUrlFor($fontFamily);

        if ($customFontUrl !== null) {
            return $customFontUrl;
        }

        return \sprintf(
            self::GOOGLE_FONT_URL,
            \str_replace(' ', '+', $fontFamily)
        );
    }
}
