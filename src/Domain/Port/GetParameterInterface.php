<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Port;

interface GetParameterInterface
{
    public function getDesignCustomizationPrefix(): string;

    public function getImageUploadsDir(): string;
}
