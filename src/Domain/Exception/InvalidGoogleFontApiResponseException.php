<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Exception;

class InvalidGoogleFontApiResponseException extends DesignCustomizationException
{
    public function __construct()
    {
        $message = 'Invalid google font api response.';

        parent::__construct($message);
    }
}
