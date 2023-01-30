<?php

declare(strict_types=1);

namespace Yii\Bulma\Asset\Cdn;

use Yiisoft\Assets\AssetBundle;

final class BulmaAsset extends AssetBundle
{
    public bool $cdn = true;
    public array $css = ['https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css'];
}
