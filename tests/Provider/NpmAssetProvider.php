<?php

declare(strict_types=1);

namespace Yii\Bulma\Asset\Tests\Provider;

use Yii\Bulma\Asset;

final class NpmAssetProvider
{
    /**
     * @return array array of asset bundles.
     */
    public static function assetBundles(): array
    {
        return [
            ['Css', Asset\BulmaDevAsset::class],
            ['Css', Asset\BulmaMinAsset::class],
        ];
    }
}
