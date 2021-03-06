<?php

/**
 * Stronger Password Generator for WHMCS Provisioning v1
 *
 * @package     WHMCS
 * @copyright   Katamaze
 * @link        https://katamaze.com
 * @author      Davide Mantenuto <info@katamaze.com>
 */

use WHMCS\Database\Capsule;

add_hook('PreModuleCreate', 1, function($vars)
{
    $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-=+?'), 0, $length = '10');
    Capsule::table('tblhosting')->where('id', $vars['params']['serviceid'])->update(['password' => Encrypt($password)]);
});
