<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Cache;

use RichId\DesignCustomizationBundle\Domain\Model\GoogleFont;
use RichId\DesignCustomizationBundle\Infrastructure\GoogleApi\GetGoogleFonts;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class GoogleFontCache
{
    public const CACHE_LIFETIME = 'PT1H';
    public const CACHE_KEY = 'design-google-fonts';

    /** @var GetGoogleFonts */
    protected $getGoogleFonts;

    /** @var CacheInterface */
    protected $cache;

    public function __construct(GetGoogleFonts $getGoogleFonts, CacheInterface $cache)
    {
        $this->getGoogleFonts = $getGoogleFonts;
        $this->cache = $cache;
    }

    /** @return GoogleFont[] */
    public function getGoogleFonts(): array
    {
        return $this->cache->get(
            self::CACHE_KEY,
            function (ItemInterface $item) {
                $item->expiresAfter(new \DateInterval(self::CACHE_LIFETIME));

                return ($this->getGoogleFonts)();
            }
        );
    }

    public function clearCache(): void
    {
        $this->cache->delete(self::CACHE_KEY);
    }
}
