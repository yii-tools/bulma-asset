<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class NotificationPluginCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/notification.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-DLFq8emqUPpFOt948fP+iWl1/SdJdYRiFA1yLEeowpw=',
        'crossorigin' => 'anonymous',
    ];
}
