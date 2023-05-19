<?php

declare(strict_types=1);

namespace Yii\Assets\Tests;

use PHPUnit\Framework\TestCase;
use Yii\Assets\Tests\Support\TestTrait;
use Yiisoft\Assets\Exception\InvalidConfigException;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class CdnAssetTest extends TestCase
{
    use TestTrait;

    /**
     * @dataProvider \Yii\Assets\Tests\Provider\CdnAssetProvider::assetBundles
     *
     * @psalm-suppress InvalidStringClass
     * @psalm-suppress MixedArrayOffset
     *
     * @throws InvalidConfigException
     */
    public function testAssetRegister(string $type, string $cdnBundle, string $cdnDepend = null): void
    {
        $bundle = new $cdnBundle();

        if ($cdnDepend !== null) {
            $depend = new $cdnDepend();
        }

        $this->assetManager->registerMany([$cdnBundle]);

        if ($type === 'Css' && isset($bundle->css[0])) {
            $this->assertSame($bundle->css[0], $this->assetManager->getCssFiles()[$bundle->css[0]][0]);
        }

        if ($type === 'Css' && $cdnDepend !== null && isset($depend->css[0])) {
            $this->assertSame($depend->css[0], $this->assetManager->getCssFiles()[$depend->css[0]][0]);
        }

        if ($type === 'Js' && isset($bundle->js[0])) {
            $this->assertEquals($bundle->js[0], $this->assetManager->getJsFiles()[$bundle->js[0]][0]);
        }

        if ($type === 'Js' && $cdnDepend !== null && isset($depend->js[0])) {
            $this->assertEquals($depend->js[0], $this->assetManager->getJsFiles()[$depend->js[0]][0]);
        }
    }
}
