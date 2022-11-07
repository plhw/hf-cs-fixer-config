<?php

/**
 * Project 'Healthy Feet' by Podolab Hoeksche Waard.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see       https://plhw.nl/
 *
 * @copyright Copyright (c) 2016-2022 prooph software GmbH <contact@prooph.de>
 * @copyright Copyright (c) 2016-2022 Sascha-Oliver Prolic <saschaprolic@googlemail.com>.
 * @copyright Copyright (c) 2010-2022 bushbaby multimedia. (https://bushbaby.nl)
 * @author    Bas Kamer <bas@bushbaby.nl>
 * @license   MIT
 *
 * @package   plhw/hf-cs-fixer-config
 */

declare(strict_types=1);

$config = new HF\CS\Config();
$config->getFinder()->in(__DIR__)->append([__FILE__]);

return $config;
