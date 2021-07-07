<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class ModalPluginAsset extends AssetBundle
{
    public ?string $basePath = '@assets';
    public ?string $baseUrl = '@assetsUrl';
    public ?string $sourcePath = '@npm/@vizuaalog/bulmajs';
    public array $js = [
        'dist/modal.js',
    ];
    public array $publishOptions = [
        'only' => [
            'dist/modal.js',
        ],
    ];
}
