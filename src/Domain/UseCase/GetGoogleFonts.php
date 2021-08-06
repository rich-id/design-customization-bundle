<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Model\GoogleFont;
use RichId\DesignCustomizationBundle\Domain\Port\GetDesignGoogleFontsInterface;

class GetGoogleFonts
{
    /** @var GetDesignGoogleFontsInterface */
    protected $getDesignGoogleFonts;

    public function __construct(GetDesignGoogleFontsInterface $getDesignGoogleFonts)
    {
        $this->getDesignGoogleFonts = $getDesignGoogleFonts;
    }

    /** @return GoogleFont[] */
    public function __invoke(): array
    {
        return $this->getDesignGoogleFonts->getGoogleFonts();
    }
}
