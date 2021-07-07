<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma\Tests;

use Exception;
use PHPUnit\Framework\TestCase as AbstractTestCase;
use Psr\Log\NullLogger;
use ReflectionClass;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetConverter;
use Yiisoft\Assets\AssetConverterInterface;
use Yiisoft\Assets\AssetLoader;
use Yiisoft\Assets\AssetLoaderInterface;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Assets\AssetPublisher;
use Yiisoft\Assets\AssetPublisherInterface;
use Yiisoft\Files\FileHelper;
use Yiisoft\Test\Support\Container\SimpleContainer;

abstract class TestCase extends AbstractTestCase
{
    protected AssetManager $assetManager;
    protected AssetPublisherInterface $assetPublisher;
    private Aliases $aliases;

    protected function setUp(): void
    {
        $container = $this->createContainer();
        /** @var Aliases */
        $this->aliases = $container->get(Aliases::class);
        /** @var AssetManager */
        $this->assetManager = $container->get(AssetManager::class);
        /** @var AssetPublisherInterface */
        $this->assetPublisher = $container->get(AssetPublisherInterface::class);
    }

    /**
     * @throws Exception
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        $this->removeAssets('@assets');

        unset($this->aliases, $this->assetManager, $this->assetPublisher);
    }

    /**
     * Returns the registered asset bundles.
     *
     * @param AssetManager $manager
     *
     * @return array The registered asset bundles {@see AssetManager::$registeredBundles}.
     */
    protected function getRegisteredBundles(AssetManager $manager): array
    {
        $reflection = new ReflectionClass($manager);
        $property = $reflection->getProperty('registeredBundles');
        $property->setAccessible(true);
        /** @var array */
        $registeredBundles = $property->getValue($manager);
        $property->setAccessible(false);
        return $registeredBundles;
    }

    /**
     * @throws Exception
     */
    protected function removeAssets(string $basePath): void
    {
        $handle = opendir($dir = $this->aliases->get($basePath));

        if ($handle === false) {
            throw new Exception("Unable to open directory: $dir");
        }

        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..' || $file === '.gitignore') {
                continue;
            }
            $path = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($path)) {
                FileHelper::removeDirectory($path);
            } else {
                FileHelper::unlink($path);
            }
        }

        closedir($handle);
    }

    private function createContainer(): SimpleContainer
    {
        $aliases = new Aliases([
            '@assetsUrl' => '/assets',
            '@assets' => dirname(__DIR__) . '/tests/data/assets',
            '@npm' => dirname(__DIR__) . '/node_modules',
            '@vendor' => dirname(__DIR__) . '/vendor',
        ]);

        $converter = new AssetConverter($aliases, new NullLogger(), [], false);

        $loader = new AssetLoader($aliases, false, [], null, null);

        $publisher = new AssetPublisher($aliases, false, false);

        $manager = new AssetManager($aliases, $loader, [], []);
        $manager = $manager->withConverter($converter)->withPublisher($publisher);

        return new SimpleContainer([
            Aliases::class => $aliases,
            AssetManager::class => $manager,
            AssetLoaderInterface::class => $loader,
            AssetConverterInterface::class => $converter,
            AssetPublisherInterface::class => $publisher,
        ]);
    }
}
