<?php

declare(strict_types=1);

namespace Yii\Assets\Tests\Support;

use Exception;
use Psr\Log\NullLogger;
use Yii\Support\Assert;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetConverter;
use Yiisoft\Assets\AssetLoader;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Assets\AssetPublisher;

trait TestTrait
{
    protected AssetManager $assetManager;
    protected AssetPublisher $assetPublisher;
    private Aliases $aliases;

    protected function setUp(): void
    {
        $this->aliases = new Aliases(
            [
                '@root' => dirname(__DIR__, 2),
                '@npm' => '@root/node_modules',
                '@assetsUrl' => '/',
                '@assets' => __DIR__ . '/runtime',
            ]
        );
        $this->assetManager = $this->createAssetManager($this->aliases);
    }

    /**
     * @throws Exception
     */
    protected function tearDown(): void
    {
        Assert::removeFilesFromDirectory($this->aliases->get('@assets'));

        unset($this->assetManager);
    }

    /**
     * Create AssetManager with AssetConverter and AssetPublisher instances for testing.
     *
     * @param Aliases $aliases The aliases instance.
     *
     * @return AssetManager The AssetManager instance.
     */
    protected function createAssetManager(Aliases $aliases): AssetManager
    {
        $converter = new AssetConverter($aliases, new NullLogger(), [], false);
        $loader = new AssetLoader($aliases, false, [], null, null);

        $this->assetPublisher = new AssetPublisher($aliases, false, false);

        $manager = new AssetManager($aliases, $loader, [], []);

        return $manager->withConverter($converter)->withPublisher($this->assetPublisher);
    }
}
