<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class ModalPluginCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/modal.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-hBvcaTjLTgUEz5N2JhIeJz2jXagbOVG7KNxn406heMI=',
        'crossorigin' => 'anonymous',
    ];
}
