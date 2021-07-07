<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma\Tests;

use Yii\Extension\Asset\Bulma\AlertPluginCdnAsset;
use Yii\Extension\Asset\Bulma\DropdownPluginCdnAsset;
use Yii\Extension\Asset\Bulma\FilePluginCdnAsset;
use Yii\Extension\Asset\Bulma\MessagePluginCdnAsset;
use Yii\Extension\Asset\Bulma\ModalPluginCdnAsset;
use Yii\Extension\Asset\Bulma\NavBarPluginCdnAsset;
use Yii\Extension\Asset\Bulma\NotificationPluginCdnAsset;
use Yii\Extension\Asset\Bulma\PanelPluginCdnAsset;
use Yii\Extension\Asset\Bulma\PanelTabsPluginCdnAsset;
use Yii\Extension\Asset\Bulma\VizuaalogJsCdnAsset;
use Yiisoft\Assets\AssetBundle;
use Yiisoft\Assets\Exception\InvalidConfigException;

final class CdnAssetTest extends TestCase
{
    /**
     * @return array
     */
    public function registerCdnDataProvider(): array
    {
        return [
            [
                'Js',
                AlertPluginCdnAsset::class,
            ],
            [
                'Js',
                DropdownPluginCdnAsset::class,
            ],
            [
                'Js',
                FilePluginCdnAsset::class,
            ],
            [
                'Js',
                MessagePluginCdnAsset::class,
            ],
            [
                'Js',
                ModalPluginCdnAsset::class,
            ],
            [
                'Js',
                NavBarPluginCdnAsset::class,
            ],
            [
                'Js',
                NotificationPluginCdnAsset::class,
            ],
            [
                'Js',
                PanelPluginCdnAsset::class,
            ],
            [
                'Js',
                PanelTabsPluginCdnAsset::class,
            ],
            [
                'Js',
                VizuaalogJsCdnAsset::class,
            ],
        ];
    }

    /**
     * @dataProvider registerCdnDataProvider
     *
     * @param string $type
     * @param string $cdnBundle
     * @param string|null $cdnDepend
     *
     * @throws InvalidConfigException
     */
    public function testCdnAssetRegister(string $type, string $cdnBundle, ?string $cdnDepend = null): void
    {
        $bundle = new $cdnBundle();

        if ($cdnDepend !== null) {
            $depend = new $cdnDepend();
        }

        $this->assertEmpty($this->getRegisteredBundles($this->assetManager));

        $this->assetManager->register([$cdnBundle]);

        if ($cdnDepend !== null && $type === 'Css') {
            $this->assertEquals($depend->css[0], $this->assetManager->getCssFiles()[$depend->css[0]][0]);
        } elseif ($type === 'Css') {
            $this->assertEquals($bundle->css[0], $this->assetManager->getCssFiles()[$bundle->css[0]][0]);
        }

        if ($cdnDepend !== null && $type === 'Js') {
            $this->assertEquals($depend->js[0], $this->assetManager->getJsFiles()[$depend->js[0]][0]);
        } elseif ($type === 'Js') {
            $this->assertEquals($bundle->js[0], $this->assetManager->getJsFiles()[$bundle->js[0]][0]);
        }

        $this->removeAssets('@assets');
    }

    /**
     * @dataProvider registerCdnDataProvider
     *
     * @param string $type
     * @param string $cdnBundle
     * @param string|null $cdnDepend
     *
     * @throws InvalidConfigException
     */
    public function testCdnAssetDependency(string $type, string $cdnBundle, ?string $cdnDepend = null): void
    {
        $this->assertEmpty($this->getRegisteredBundles($this->assetManager));

        $this->assetManager->register([$cdnBundle]);

        if ($cdnDepend !== null) {
            $this->assertCount(2, $this->getRegisteredBundles($this->assetManager));
        } else {
            $this->assertCount(1, $this->getRegisteredBundles($this->assetManager));
        }

        $this->assertArrayHasKey($cdnBundle, $this->getRegisteredBundles($this->assetManager));
        $this->assertInstanceOf(AssetBundle::class, $this->getRegisteredBundles($this->assetManager)[$cdnBundle]);

        if ($cdnDepend !== null) {
            $this->assertArrayHasKey($cdnDepend, $this->getRegisteredBundles($this->assetManager));
            $this->assertInstanceOf(AssetBundle::class, $this->getRegisteredBundles($this->assetManager)[$cdnDepend]);
        }
    }
}
