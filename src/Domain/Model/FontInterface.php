<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Model;

interface FontInterface
{
    public function setFamily(string $family): void;

    public function getFamily(): string;
}
