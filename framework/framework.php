<?php
/**
 * Silver Quantum ( framework.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2014-2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://luthemes.com )
 */

/**
 * Create a new framework instance
 *
 * This will create an instance of the framework allowing you to initialize the theme.
 */
$silver_quantum = Benlumia007\Backdrop\Framework::get_instance();

$silver_quantum->customize = new SilverQuantum\Component\Customize();
$silver_quantum->admin     = new SilverQuantum\Component\Admin();