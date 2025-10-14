<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use CodeIgniter\CLI\CLI;

CLI::error('ERROR: ' . $code);
CLI::write($message);
CLI::newLine();
