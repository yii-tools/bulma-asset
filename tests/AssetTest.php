<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma\Tests;

use Exception;
use Yii\Extension\Asset\Bulma\AlertPluginAsset;
use Yii\Extension\Asset\Bulma\BulmaAsset;
use Yii\Extension\Asset\Bulma\BulmaHelpersAsset;
use Yii\Extension\Asset\Bulma\DropdownPluginAsset;
use Yii\Extension\Asset\Bulma\FilePluginAsset;
use Yii\Extension\Asset\Bulma\MessagePluginAsset;
use Yii\Extension\Asset\Bulma\ModalPluginAsset;
use Yii\Extension\Asset\Bulma\NavBarPluginAsset;
use Yii\Extension\Asset\Bulma\NotificationPluginAsset;
use Yii\Extension\Asset\Bulma\PanelPluginAsset;
use Yii\Extension\Asset\Bulma\PanelTabsPluginAsset;
use Yii\Extension\Asset\Bulma\VizuaalogJsAsset;
use Yiisoft\Assets\Exception\InvalidConfigException;

final class AssetTest extends TestCase
{
    /**
     * @return array
     */
    public function registerCdnDataProvider(): array
    {
        return [
            [
                'Css',
                BulmaAsset::class,
            ],
            [
                'Css',
                BulmaHelpersAsset::class,
            ],
            [
                'Js',
                AlertPluginAsset::class,
            ],
            [
                'Js',
                DropdownPluginAsset::class,
            ],
            [
                'Js',
                FilePluginAsset::class,
            ],
            [
                'Js',
                MessagePluginAsset::class,
            ],
            [
                'Js',
                ModalPluginAsset::class,
            ],
            [
                'Js',
                NavBarPluginAsset::class,
            ],
            [
                'Js',
                NotificationPluginAsset::class,
            ],
            [
                'Js',
                PanelPluginAsset::class,
            ],
            [
                'Js',
                PanelTabsPluginAsset::class,
            ],
            [
                'Js',
                VizuaalogJsAsset::class,
            ],
        ];
    }

    /**
     * @dataProvider registerCdnDataProvider
     *
     * @param string $type
     * @param string $asset
     * @param string|null $depend
     *
     * @throws Exception|InvalidConfigException
     */
    public function testAssetRegister(string $type, string $asset, ?string $depend = null): void
    {
        $bundle = new $asset();

        if ($depend !== null) {
            $depend = new $depend();
        }

        $this->assertEmpty($this->getRegisteredBundles($this->assetManager));

        $this->assetManager->register([$asset]);

        if ($depend !== null && $type === 'Css') {
            $dependUrl = $this->assetPublisher->getPublishedUrl($depend->sourcePath) . '/' . $depend->css[0];
            $this->assertEquals($dependUrl, $this->assetManager->getCssFiles()[$dependUrl][0]);
        } elseif ($type === 'Css') {
            $bundleUrl = $this->assetPublisher->getPublishedUrl($bundle->sourcePath) . '/' . $bundle->css[0];
            $this->assertEquals($bundleUrl, $this->assetManager->getCssFiles()[$bundleUrl][0]);
        }

        if ($depend !== null && $type === 'Js') {
            $dependUrl = $this->assetPublisher->getPublishedUrl($depend->sourcePath) . '/' . $depend->js[0];
            $this->assertEquals($dependUrl, $this->assetManager->getJsFiles()[$dependUrl][0]);
        } elseif ($type === 'Js') {
            $bundleUrl = $this->assetPublisher->getPublishedUrl($bundle->sourcePath) . '/' . $bundle->js[0];
            $this->assertEquals($bundleUrl, $this->assetManager->getJsFiles()[$bundleUrl][0]);
        }

        $this->removeAssets('@assets');
    }
}
