<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class DropdownPluginCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/dropdown.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-a4jYH26F8++608JkISGhK0djf4oBOfa+MeKGzi0yM3U=',
        'crossorigin' => 'anonymous',
    ];
}
