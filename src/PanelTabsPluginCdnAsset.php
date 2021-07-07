<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class PanelTabsPluginCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/panelTabs.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-YYhbFo+xIExSfq9YIa/gDkKunSv852A+Lay4qbP6/+w=',
        'crossorigin' => 'anonymous',
    ];
}
