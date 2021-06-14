<?php

$config = new HF\CS\Config();
$config->getFinder()->in(__DIR__);

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php-cs-fixer.cache');

return $config;
