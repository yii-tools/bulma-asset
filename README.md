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

## Installation

```shell
composer require asset-bulma
```

## Using assets

Bulma is a CSS framework that provides all the CSS to customize your application, the widgets by default
do not register any Asset so you must register them in your application to be used, since you can simply use the default CSS file layout, or build your own custom CCS.

`Three Assets are provided:`

- [BulmaAsset](src/BulmaAsset.php): Asset file for [Bulma](https://bulma.io/documentation/overview/start/) Css Framework include `Css` files.
- [BulmaHelpersAsset](src/BulmaHelperAsset.php): Asset file for [BulmaHelper library](https://github.com/jmaczan/bulma-helpers) include `Css` files.
- [VizuaalogJsAsset](src/VizuaalogJsAsset.php): Asset file for [VizuaalogJs library](https://github.com/VizuaaLOG/BulmaJS) include `Js` files.
- [VizuaalogJsCdnAsset](src/VizuaalogJsCdnAsset.php): Asset file for [VizuaalogJs library](https://www.jsdelivr.com/package/npm/@vizuaalog/bulmajs) include `Js` files.
- [AlertPluginAsset](src/AlertPluginAsset.php): Asset file for Alert include `Js` files.
- [AlertPluginCdnAsset](src/AlertPluginCdnAsset.php): Asset file for Cdn Alert include `Js` files.
- [DropdownPluginAsset](src/DropdownPluginAsset.php): Asset file for Dropdown include `Js` files.
- [DropdownPluginCdnAsset](src/DropdownPluginCdnAsset.php): Asset file for Cdn Dropdown include `Js` files.
- [FilePluginAsset](src/FilePluginAsset.php): Asset file for File include `Js` files.
- [FilePluginCdnAsset](src/FilePluginCdnAsset.php): Asset file for Cdn File include `Js` files.
- [MessagePluginAsset](src/MessagePluginAsset.php): Asset file for Message include `Js` files.
- [MessagePluginCdnAsset](src/MessagePluginCdnAsset.php): Asset file for Cdn Message include `Js` files.]
- [ModalPluginAsset](src/ModalPluginAsset.php): Asset file for Modal include `Js` files.
- [ModalPluginCdnAsset](src/ModalPluginCdnAsset.php): Asset file for Cdn Modal include `Js` files.
- [NavBarsPluginAsset](src/NavBarsPluginAsset.php): Asset file for NavBars include `Js` files.
- [NavBarsPluginCdnAsset](src/NavBarsPluginCdnAsset.php): Asset file for Cdn NavBars include `Js` files.
- [NotificationPluginAsset](src/NotificationPluginAsset.php): Asset file for Notification include `Js` files.
- [NotificationPluginCdnAsset](src/NotificationPluginCdnAsset.php): Asset file for Cdn Notification include `Js` files.
- [PanelPluginAsset](src/PanelPluginAsset.php): Asset file for Panel include `Js` files.
- [PanelPluginCdnAsset](src/PanelPluginCdnAsset.php): Asset file for Cdn Panel include `Js` files.
- [PanelTabsPluginAsset](src/PanelTabsPluginAsset.php): Asset file for PanelTabs include `Js` files.
- [PanelTabsPluginCdnAsset](src/PanelTabsPluginCdnAsset.php): Asset file for Cdn PanelTabs include `Js` files.

For more information [Bulma](https://bulma.io/documentation/overview/start/).

To use widgets only, register `BulmaAsset::class`, which we can do in several ways explained below.

`Note:` You need to have [npm](https://docs.npmjs.com/getting-started) installed, this extension uses [foxy](https://github.com/fxpio/foxy) to install assets. 

`Register asset in view layout or individual view:`

By registering the Asset in the `layout/main.php` it will be available for all views.

If you need it registered for individual view (such as `views/user/login.php`) only,
register it in that view.


```php
use Yii\Extension\Asset\Bulma\BulmaAsset;

/**
 * @var Yiisoft\Assets\AssetManager $assetManager
 * @var Yiisoft\View\WebView $this
 */

$assetManager->register([
    BulmaAsset::class,
]);

$this->setCssFiles($assetManager->getCssFiles());
$this->setJsFiles($assetManager->getJsFiles());
```

`Register asset in application params:`

You can register asset in the assets parameters, (by default, this is `config/packages/yiisoft/assets/params.php`).
Asset will be available for all views of this application.

```php
use Yii\Extension\Asset\Bulma\BulmaAsset;

'yiisoft/asset' => [
    'assetManager' => [
        'register' => [
            BulmaAsset::class,
        ],
    ],
],
```

Then in `layout/main.php`:

```php
/* @var Yiisoft\View\WebView $this */

$this->setCssFiles($assetManager->getCssFiles());
$this->setJsFiles($assetManager->getJsFiles());
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

## License

The `yii-extension/asset-bulma` for Yii Packages is free software.

It is released under the terms of the BSD License. Please see [`LICENSE`](./LICENSE.md) for more information.

Maintained by [Yii Extension](https://github.com/yii-extension).

## Support the project

[![Open Collective](https://img.shields.io/badge/Open%20Collective-sponsor-7eadf1?logo=open%20collective&logoColor=7eadf1&labelColor=555555)](https://opencollective.com/yiisoft)

## Powered by Yii Framework

[![Official website](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)
