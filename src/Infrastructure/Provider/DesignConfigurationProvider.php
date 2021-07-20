<?php declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Provider;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Infrastructure\Repository\DesignConfigurationRepository;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class DesignConfigurationProvider
{
    protected const CACHE_LIFETIME = 'PT1H';
    protected const DESIGN_CONFIGURATION = 'design-configuration-';

    /** @var DesignConfigurationRepository */
    protected $designConfigurationRepository;

    /** @var CacheInterface */
    protected $cache;

    public function __construct(DesignConfigurationRepository $designConfigurationRepository, CacheInterface $cache)
    {
        $this->designConfigurationRepository = $designConfigurationRepository;
        $this->cache = $cache;
    }

    public function getConfiguration(string $configurationSlug): ?DesignConfiguration
    {
        return $this->cache->get(
            $this->cacheKey($configurationSlug),
            function (ItemInterface $item) use ($configurationSlug) {
                $item->expiresAfter(new \DateInterval(self::CACHE_LIFETIME));

                return $this->getSavedConfiguration($configurationSlug);
            }
        );
    }

    public function clearCache(string $configurationSlug): void
    {
        $this->cache->delete($this->cacheKey($configurationSlug));
    }

    protected function cacheKey(string $configurationSlug): string
    {
        return self::DESIGN_CONFIGURATION . $configurationSlug;
    }

    protected function getSavedConfiguration(string $configurationSlug): ?DesignConfiguration
    {
        return $this->designConfigurationRepository->findOneBySlug($configurationSlug);
    }
}
