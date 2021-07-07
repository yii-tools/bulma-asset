<?php

declare(strict_types=1);

namespace Yii\Extension\Asset\Bulma;

use Yiisoft\Assets\AssetBundle;

final class FilePluginCdnAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $js = [
        'https://cdn.jsdelivr.net/npm/@vizuaalog/bulmajs@0.12.1/dist/file.js',
    ];
    public array $jsOptions = [
        'integrity' => 'sha256-auA7tFsecFictV+ZLehk+avAsr6QHjDvxXXGEyq2bbw=',
        'crossorigin' => 'anonymous',
    ];
}
