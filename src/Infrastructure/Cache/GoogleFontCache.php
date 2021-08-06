<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Cache;

use RichId\DesignCustomizationBundle\Domain\Exception\InvalidGoogleFontApiKeyException;
use RichId\DesignCustomizationBundle\Domain\Model\GoogleFont;
use RichId\DesignCustomizationBundle\Infrastructure\Adapter\GetParameter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GoogleFontCache
{
    public const CACHE_LIFETIME = 'PT1H';
    public const CACHE_KEY = 'design-google-fonts';

    /** @var GetParameter */
    protected $getParameter;

    /** @var DenormalizerInterface */
    protected $denormalizer;

    /** @var HttpClientInterface */
    protected $httpClient;

    /** @var CacheInterface */
    protected $cache;

    public function __construct(GetParameter $getParameter, DenormalizerInterface $denormalizer, HttpClientInterface $httpClient, CacheInterface $cache)
    {
        $this->getParameter = $getParameter;
        $this->denormalizer = $denormalizer;
        $this->httpClient = $httpClient;
        $this->cache = $cache;
    }

    /** @return GoogleFont[] */
    public function getGoogleFonts(): array
    {
        return $this->cache->get(
            self::CACHE_KEY,
            function (ItemInterface $item) {
                $item->expiresAfter(new \DateInterval(self::CACHE_LIFETIME));

                return $this->getGoogleFontsFromApi();
            }
        );
    }

    public function clearCache(): void
    {
        $this->cache->delete(self::CACHE_KEY);
    }

    /** @return GoogleFont[] */
    protected function getGoogleFontsFromApi(): array
    {
        $apiKey = $this->getParameter->getGoogleFontsApiKey();

        $response = $this->httpClient->request(
            'GET',
            \sprintf('https://www.googleapis.com/webfonts/v1/webfonts?key=%s', $apiKey)
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
