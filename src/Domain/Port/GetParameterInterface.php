<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Port;

interface GetParameterInterface
{
    /** @return string[] */
    public function getAdminRoles(): array;

    /** @return array<string, string> */
    public function getCustomFonts(): array;

    public function getDesignCustomizationPrefix(): string;

    public function getGoogleFontsApiKey(): string;

    public function getImageUploadsDir(): string;
}
