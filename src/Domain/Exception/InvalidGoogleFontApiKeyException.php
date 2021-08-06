<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Domain\Exception;

class InvalidGoogleFontApiKeyException extends DesignCustomizationException
{
    public function __construct()
    {
        $message = 'Invalid google font api key. Check your configuration.';

        parent::__construct($message);
    }
}
