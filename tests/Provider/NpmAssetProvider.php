<?php

declare(strict_types=1);

namespace Yii\Assets\Tests\Provider;

use Yii\Assets;

final class NpmAssetProvider
{
    /**
     * @return array array of asset bundles.
     */
    public static function assetBundles(): array
    {
        return [
            ['Css', Assets\BulmaDev::class],
            ['Css', Assets\BulmaProd::class],
        ];
    }
}
