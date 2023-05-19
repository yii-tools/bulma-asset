<?php

declare(strict_types=1);

namespace Yii\Assets\Tests;

use PHPUnit\Framework\TestCase;
use Yii\Assets\Tests\Support\TestTrait;
use Yiisoft\Assets\Exception\InvalidConfigException;
use Yiisoft\Files\PathMatcher\PathMatcher;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class NpmAssetTest extends TestCase
{
    use TestTrait;

    /**
     * @dataProvider \Yii\Assets\Tests\Provider\NpmAssetProvider::assetBundles
     *
     * @throws InvalidConfigException
     *
     * @psalm-suppress InvalidStringClass
     */
    public function testAssetRegister(string $type, string $assetBundle, string $bundleDepend = null): void
    {
        $bundle = new $assetBundle();
        $depend = null;

        if ($bundleDepend !== null) {
            $depend = new $bundleDepend();
        }

        $this->assetManager->registerMany([$assetBundle]);

        if ($type === 'Css' && is_string($bundle->sourcePath) && isset($bundle->css[0])) {
            $getPublishedUrl = $this->assetPublisher->getPublishedUrl($bundle->sourcePath);

            /** @psalm-var string|null $css */
            $css = $bundle->css[0];

            if ($getPublishedUrl !== null && $css !== null) {
                $bundleUrl = $getPublishedUrl . '/' . $css;

                $this->assertInstanceOf(PathMatcher::class, $bundle->publishOptions['filter']);
                $this->assertSame($bundleUrl, $this->assetManager->getCssFiles()[$bundleUrl][0]);
            }
        }

        if ($type === 'Css' && $depend !== null && is_string($depend->sourcePath) && isset($depend->css[0])) {
            $getPublishedUrl = $this->assetPublisher->getPublishedUrl($depend->sourcePath);
            /** @psalm-var string|null $css */
            $css = $depend->css[0];

            if ($getPublishedUrl !== null && $css !== null) {
                $dependUrl = $getPublishedUrl . '/' . $css;

                $this->assertSame($dependUrl, $this->assetManager->getCssFiles()[$dependUrl][0]);
            }
        }

        if ($type === 'Js' && $depend !== null && is_string($depend->sourcePath) && isset($depend->js[0])) {
            $getPublishedUrl = $this->assetPublisher->getPublishedUrl($depend->sourcePath);
            /** @psalm-var string|null $js */
            $js = $depend->js[0];
            if ($getPublishedUrl !== null && $js !== null) {
                $dependUrl = $getPublishedUrl . '/' . $js;

                $this->assertSame($dependUrl, $this->assetManager->getJsFiles()[$dependUrl][0]);
            }
        }

        if ($type === 'Js' && is_string($bundle->sourcePath) && isset($bundle->js[0])) {
            $getPublishedUrl = $this->assetPublisher->getPublishedUrl($bundle->sourcePath);
            /** @psalm-var string|null $js */
            $js = $bundle->js[0];

            if ($getPublishedUrl !== null && $js !== null) {
                $bundleUrl = $getPublishedUrl . '/' . $js;

                $this->assertInstanceOf(PathMatcher::class, $bundle->publishOptions['filter']);
                $this->assertSame($bundleUrl, $this->assetManager->getJsFiles()[$bundleUrl][0]);
            }
        }
    }
}
