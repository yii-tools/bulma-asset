<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class MessagePluginCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/message.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-xIxQKW6ezuEuLxsEGB+voTYg0ZWjIldWZoZltlJIUjA=',
        'crossorigin' => 'anonymous',
    ];
}
