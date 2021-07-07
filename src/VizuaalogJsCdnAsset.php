<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class VizuaalogJsCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/bulma.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-vbERfMn7TdJ3ZyBfxd+sGJf/fWG/GnWmvMn88FdhfAE=',
        'crossorigin' => 'anonymous',
    ];
}
