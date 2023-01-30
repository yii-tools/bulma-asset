<?php

declare(strict_types=1);

namespace Yii\Bulma\Asset\Tests\Provider;

use Yii\Bulma\Asset\Npm;

final class NpmAssetProvider
{
    /**
     * @return array array of asset bundles.
     */
    public function assetBundles(): array
    {
        return [
            [
                'Css',
                Npm\Dev\BulmaAsset::class,
            ],
            [
                'Css',
                Npm\Min\BulmaAsset::class,
            ],
        ];
    }
}
