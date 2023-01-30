<?php

declare(strict_types=1);

namespace Yii\Bulma\Asset\Tests\Provider;

use Yii\Bulma\Asset\Cdn\BulmaAsset;

final class CdnAssetProvider
{
    /**
     * @return array array of asset bundles.
     */
    public function assetBundles(): array
    {
        return [
            [
                'Css',
                BulmaAsset::class,
            ],
        ];
    }
}
