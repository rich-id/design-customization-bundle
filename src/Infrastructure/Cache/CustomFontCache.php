<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Cache;

use RichId\DesignCustomizationBundle\Infrastructure\Repository\CustomFontRepository;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class CustomFontCache
{
    public const CACHE_LIFETIME = 'PT1H';
    public const CACHE_KEY = 'custom-fonts';

    /** @var CustomFontRepository */
    protected $customFontRepository;

    /** @var CacheInterface */
    protected $cache;

    public function __construct(CustomFontRepository $customFontRepository, CacheInterface $cache)
    {
        $this->customFontRepository = $customFontRepository;
        $this->cache = $cache;
    }

    /** @return array<string, string> */
    public function getCustomFonts(): array
    {
        return $this->cache->get(
            self::CACHE_KEY,
            function (ItemInterface $item) {
                $item->expiresAfter(new \DateInterval(self::CACHE_LIFETIME));

                return $this->getSavedCustomFonts();
            }
        );
    }

    public function getCustomFontUrlFor(string $fontFamily): ?string
    {
        $customFonts = $this->getCustomFonts();

        return $customFonts[$fontFamily] ?? null;
    }

    public function clearCache(): void
    {
        $this->cache->delete(self::CACHE_KEY);
    }

    /** @return array<string, string> */
    protected function getSavedCustomFonts(): array
    {
        $results = [];
        $customFonts = $this->customFontRepository->findAll();

        foreach ($customFonts as $customFont) {
            $results[$customFont->getFontFamily()] = $customFont->getUrl();
        }

        return $results;
    }
}
