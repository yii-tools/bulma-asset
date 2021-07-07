<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class BulmaAsset extends AssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
    public ?string $sourcePath = '@npm/bulma';
    public array $css = [
        'css/bulma.css',
    ];
    public array $publishOptions = [
        'only' => [
            'css/bulma.css',
        ],
    ];
}
