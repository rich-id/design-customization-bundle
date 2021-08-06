<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Model;

class GoogleFont implements FontInterface
{
    /** @var string */
    protected $family;

    public function setFamily(string $family): void
    {
        $this->family = $family;
    }

    public function getFamily(): string
    {
        return $this->family;
    }
}
