<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Infrastructure\Cache;

use RichId\DesignCustomizationBundle\Domain\Entity\DesignConfiguration;
use RichId\DesignCustomizationBundle\Infrastructure\Repository\DesignConfigurationRepository;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class DesignConfigurationCache
{
    public const CACHE_LIFETIME = 'PT1H';
    public const CACHE_KEY = 'design-configurations';

    /** @var DesignConfigurationRepository */
    protected $designConfigurationRepository;

    /** @var CacheInterface */
    protected $cache;

    public function __construct(DesignConfigurationRepository $designConfigurationRepository, CacheInterface $cache)
    {
        $this->designConfigurationRepository = $designConfigurationRepository;
        $this->cache = $cache;
    }

    /** @return array<string, DesignConfiguration> */
    public function getDesignConfigurations(): array
    {
        return $this->cache->get(
            self::CACHE_KEY,
            function (ItemInterface $item) {
                $item->expiresAfter(new \DateInterval(self::CACHE_LIFETIME));

                return $this->getSavedConfigurations();
            }
        );
    }

    public function getDesignConfiguration(string $configurationSlug): ?DesignConfiguration
    {
        $configurations = $this->getDesignConfigurations();

        return $configurations[$configurationSlug] ?? null;
    }

    public function clearCache(): void
    {
        $this->cache->delete(self::CACHE_KEY);
    }

    /** @return array<string, DesignConfiguration> */
    protected function getSavedConfigurations(): array
    {
        $results = [];
        $configurations = $this->designConfigurationRepository->findAll();

        foreach ($configurations as $configuration) {
            $results[$configuration->getSlug()] = $configuration;
        }

        return $results;
    }
}
