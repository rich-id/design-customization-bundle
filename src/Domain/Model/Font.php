<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Model;

class Font implements FontInterface
{
    /** @var string */
    protected $family;

    /** @var string */
    protected $url;

    public function setFamily(string $family): void
    {
        $this->family = $family;
    }

    public function getFamily(): string
    {
        return $this->family;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
