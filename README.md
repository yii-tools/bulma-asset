<p align="center">
    <a href="https://github.com/yii-extension" target="_blank">
        <img src="https://lh3.googleusercontent.com/ehSTPnXqrkk0M3U-UPCjC0fty9K6lgykK2WOUA2nUHp8gIkRjeTN8z8SABlkvcvR-9PIrboxIvPGujPgWebLQeHHgX7yLUoxFSduiZrTog6WoZLiAvqcTR1QTPVRmns2tYjACpp7EQ=w2400" height="100px">
    </a>
    <h1 align="center">Asset Bulma for Yii3.</h1>
    <br>
</p>

[![Total Downloads](https://poser.pugx.org/yii-extension/asset-bulma/downloads.png)](https://packagist.org/packages/yii-extension/asset-bulma)
[![Build Status](https://github.com/yii-extension/asset-bulma/workflows/build/badge.svg)](https://github.com/yii-extension/asset-bulma/actions?query=workflow%3Abuild)
[![static analysis](https://github.com/yii-extension/asset-bulma/workflows/static%20analysis/badge.svg)](https://github.com/yii-extension/asset-bulma/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yii-extension/asset-bulma/coverage.svg)](https://shepherd.dev/github/yii-extension/asset-bulma)

## Installation

```shell
composer require asset-bulma
```

## Usage
If you want to add the asset to the entire application, you must add it in layout `main.php`, in case of using it only in one view you must add it to it. 

### Asset Bulma:
```php
<?php

declare(strict_types=1);

use Yii\Extension\Asset\Bulma\BulmaAsset;

/**
 * @var AssetManager $assetManager
 * @var WebView $this
 */

/* Register assets in view */
$assetManager->register([BulmaAsset::class]);

$this->addCssFiles($assetManager->getCssFiles());
$this->addJsFiles($assetManager->getJsFiles());
?>
```

### [Asset Bulma-Helpers](https://github.com/jmaczan/bulma-helpers):
```php
<?php

declare(strict_types=1);

use Yii\Extension\Asset\Bulma\BulmaHelpersAsset;

/**
 * @var AssetManager $assetManager
 * @var WebView $this
 */

/* Register assets in view */
$assetManager->register([BulmaHelpersAsset::class]);

$this->addCssFiles($assetManager->getCssFiles());
$this->addJsFiles($assetManager->getJsFiles());
?>
```

### [Asset @Vizuaalog-Bulmajs](https://github.com/VizuaaLOG/BulmaJS):
```php
<?php

declare(strict_types=1);

use Yii\Extension\Asset\Bulma\VizuaalogJsAsset;

/**
 * @var AssetManager $assetManager
 * @var WebView $this
 */

/* Register assets in view bundlejs */
$assetManager->register([VizuaalogJsAsset::class]);

$this->addCssFiles($assetManager->getCssFiles());
$this->addJsFiles($assetManager->getJsFiles());
?>
```

```php
<?php

declare(strict_types=1);

use Yii\Extension\Asset\Bulma\AlertPluginAsset;

/**
 * @var AssetManager $assetManager
 * @var WebView $this
 */

/* Register assets in view plugin individually */
$assetManager->register([AlertPluginAsset::class]);

$this->addCssFiles($assetManager->getCssFiles());
$this->addJsFiles($assetManager->getJsFiles());
?>
```


### Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

## Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/docs). To run static analysis:

```shell
./vendor/bin/psalm
```

### Support the project

[![Open Collective](https://img.shields.io/badge/Open%20Collective-sponsor-7eadf1?logo=open%20collective&logoColor=7eadf1&labelColor=555555)](https://opencollective.com/yiisoft)

### License

The asset-bulma for Yii Packages is free software. It is released under the terms of the BSD License.
Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Yii Extension](https://github.com/yii-extension).
