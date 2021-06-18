<?php

/**
 * Project 'Healthy Feet' by Podolab Hoeksche Waard.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see       https://plhw.nl/
 *
 * @copyright Copyright (c) 2016-2021 prooph software GmbH <contact@prooph.de>
 * @copyright Copyright (c) 2016-2021 Sascha-Oliver Prolic <saschaprolic@googlemail.com>.
 * @copyright Copyright (c) 2010-2021 bushbaby multimedia. (https://bushbaby.nl)
 * @author    Bas Kamer <bas@bushbaby.nl>
 * @license   MIT
 *
 * @package   plhw/hf-cs-fixer-config
 */

declare(strict_types=1);

$config = new HF\CS\Config();
$config->getFinder()->in(__DIR__)->append([__FILE__]);

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php-cs-fixer.cache');

return $config;
