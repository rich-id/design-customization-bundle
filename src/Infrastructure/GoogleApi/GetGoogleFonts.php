<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\GoogleApi;

use RichId\DesignCustomizationBundle\Domain\Exception\InvalidGoogleFontApiKeyException;
use RichId\DesignCustomizationBundle\Domain\Model\GoogleFont;
use RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetParameter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetGoogleFonts
{
    protected const GOOGLE_API_URL = 'https://www.googleapis.com/webfonts/v1/webfonts?key=%s';

    /** @var GetParameter */
    protected $getParameter;

    /** @var DenormalizerInterface */
    protected $denormalizer;

    /** @var HttpClientInterface */
    protected $httpClient;

    public function __construct(
        GetParameter $getParameter,
        DenormalizerInterface $denormalizer,
        HttpClientInterface $httpClient
    )
    {
        $this->getParameter = $getParameter;
        $this->denormalizer = $denormalizer;
        $this->httpClient = $httpClient;
    }

    /** @return GoogleFont[] */
    public function __invoke(): array
    {
        $apiKey = $this->getParameter->getGoogleFontsApiKey();

        $response = $this->httpClient->request(
            'GET',
            \sprintf(self::GOOGLE_API_URL, $apiKey)
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode === Response::HTTP_FORBIDDEN) {
            throw new InvalidGoogleFontApiKeyException();
        }

        return \array_map(
            function (array $data) {
                return $this->denormalizer->denormalize($data, GoogleFont::class);
            },
            $response->toArray()['items'] ?? []
        );
    }
}
