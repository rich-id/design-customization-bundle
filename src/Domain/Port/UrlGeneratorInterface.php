<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Port;

interface UrlGeneratorInterface
{
    public function getAbsoluteUrlFromPath(string $path): string;
}
