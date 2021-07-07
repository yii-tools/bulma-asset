<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class VizuaalogJsAsset extends AssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
    public ?string $sourcePath = '@npm/@vizuaalog/bulmajs';
    public array $js = [
        'dist/bulma.js',
    ];
    public array $publishOptions = [
        'only' => [
            'dist/bulma.js',
        ],
    ];
}
