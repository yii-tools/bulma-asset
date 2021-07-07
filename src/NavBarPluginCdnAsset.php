<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class NavBarPluginCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/navbar.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-kZ1bvDA2eaAtPwCmyZJyQDlhmhXVXGmJot30R6iEXDY=',
        'crossorigin' => 'anonymous',
    ];
}
