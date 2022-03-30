<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\UseCase;

use RichId\DesignCustomizationBundle\Domain\Port\GetParameterInterface;
use RichId\DesignCustomizationBundle\Domain\Port\UrlGeneratorInterface;

class GetCustomImageAbsoluteUrl
{
    /** @var GetParameterInterface */
    protected $getParameter;

    /** @var UrlGeneratorInterface */
    protected $urlGenerator;

    public function __construct(GetParameterInterface $getParameter, UrlGeneratorInterface $urlGenerator)
    {
        $this->getParameter = $getParameter;
        $this->urlGenerator = $urlGenerator;
    }

    public function __invoke(string $imagePath): string
    {
        $imageUploadsDir = $this->getParameter->getImageUploadsDir();

        return $this->urlGenerator->getAbsoluteUrlFromPath(
            \sprintf(
                '%s/%s',
                $imageUploadsDir,
                $imagePath
            )
        );
    }
}
