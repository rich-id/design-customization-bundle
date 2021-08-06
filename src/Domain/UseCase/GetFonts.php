<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Model\Font;
use RichId\DesignCustomizationBundle\Domain\Port\GetParameterInterface;

class GetFonts
{
    /** @var GetParameterInterface */
    protected $getParameter;

    /** @var GetGoogleFonts */
    protected $getGoogleFonts;

    public function __construct(GetParameterInterface $getParameter, GetGoogleFonts $getGoogleFonts)
    {
        $this->getParameter = $getParameter;
        $this->getGoogleFonts = $getGoogleFonts;
    }

    /** @return Font[] */
    public function __invoke(): array
    {
        $customFonts = [];
        $fonts = $this->getParameter->getCustomFonts();

        foreach ($fonts as $fontFamily => $fontUrl) {
            $font = new Font();
            $font->setFamily($fontFamily);
            $font->setUrl($fontUrl);

            $customFonts[] = $font;
        }

        $googleFonts = ($this->getGoogleFonts)();

        return \array_merge($customFonts, $googleFonts);
    }
}
