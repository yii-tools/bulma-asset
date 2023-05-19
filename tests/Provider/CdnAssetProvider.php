<?php

declare(strict_types=1);

namespace Yii\Assets\Tests\Provider;

use Yii\Assets\BulmaCdn;

final class CdnAssetProvider
{
    /**
     * @return array array of asset bundles.
     */
    public static function assetBundles(): array
    {
        return [
            ['Css', BulmaCdn::class],
        ];
    }
}
