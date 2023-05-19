## Using assets

Assets are files that are not processed by Webpack. They are copied directly to the output folder. This includes images, fonts, and any other files that you want to use in your project.

To use an asset, you need to import it from JavaScript or CSS.

Register the asset bundle with a view component such as a layout view. You can register it in a layout view so that it is available in all views that extend from this layout, or you can register it in a view that uses the asset.

```php
file: ./resources/views/layout/main.php

<?php

declare(strict_types=1);

use Yii\Assets\BulmaDev;

/**
 * @var \Yiisoft\Assets\AssetManager $assetManager
 */

// Register the asset bundle with a asset manager component.
$assetManager->register(BulmaDev::class);

// Set parameters for the registered asset bundle a view component.
$this->addCssFiles($assetManager->getCssFiles());
$this->addCssStrings($assetManager->getCssStrings());
$this->addJsFiles($assetManager->getJsFiles());
$this->addJsStrings($assetManager->getJsStrings());
$this->addJsVars($assetManager->getJsVars());
```

Also you can register the asset bundle via container configuration:

```php
file: ./config/params.php

<?php

declare(strict_types=1);

use Yii\Assets\BulmaCdn;

return [
    'yiisoft/assets' => [
        'assetManager' => [
            'register' => [
                BulmaCdn::class,
            ],
        ],
    ],
];
```

## Using npm packages

You can install [npm](https://www.npmjs.com/) packages [fxpio/foxy](https://github.com/fxpio/foxy),
and they will be available in the `node_modules` directory.
