<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Port;

interface GetCustomFontInterface
{
    public function getCustomFontUrlFor(string $fontFamily): ?string;

    /** @return array<string, string> */
    public function getCustomFonts(): array;
}
