<?php

declare(strict_types=1);

namespace Yii\Bulma\Asset\Tests\Support;

use Exception;
use Psr\Log\NullLogger;
use RuntimeException;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetConverter;
use Yiisoft\Assets\AssetLoader;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Assets\AssetPublisher;
use Yiisoft\Files\FileHelper;

use function closedir;
use function is_dir;
use function opendir;
use function readdir;

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
        $this->removeAssets('@assets');

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

    /**
     * Remove assets from the directory runtime/assets for testing.
     *
     * @throws RuntimeException
     */
    protected function removeAssets(string $basePath): void
    {
        $handle = opendir($dir = $this->aliases->get($basePath));

        if ($handle === false) {
            throw new RuntimeException("Unable to open directory: $dir");
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
}
