<?php

declare(strict_types=1);

namespace Yii\Bulma\Asset\Tests\Provider;

use Yii\Bulma\Asset\BulmaCdnAsset;

final class CdnAssetProvider
{
    /**
     * @return array array of asset bundles.
     */
    public static function assetBundles(): array
    {
        return [
            ['Css', BulmaCdnAsset::class],
        ];
    }
}
