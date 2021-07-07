<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class AlertPluginCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/alert.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-0Tq89d1U9WqE3xunn1SJLwD3qQvoiDU/ujdOQAxNGME=',
        'crossorigin' => 'anonymous',
    ];
}
