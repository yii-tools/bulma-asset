<?php

declare(strict_types=1);

namespace Yii\Bulma\Asset;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

final class BulmaDevAsset extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@npm/bulma';
    public array $css = ['css/bulma.css'];

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $this->publishOptions = ['filter' => $pathMatcher->only('**css/bulma.css', '**css/bulma.css.map')];
    }
}
