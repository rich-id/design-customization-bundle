<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Port;

use RichId\DesignCustomizationBundle\Domain\Model\GoogleFont;

interface GetDesignGoogleFontsInterface
{
    /** @return GoogleFont[] */
    public function getGoogleFonts(): array;
}
