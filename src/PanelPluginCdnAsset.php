<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class PanelPluginCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/panel.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-NSnEBEPnog3obqVUCnTAn4d9+333/jvQpQsNlYDoYUk=',
        'crossorigin' => 'anonymous',
    ];
}
