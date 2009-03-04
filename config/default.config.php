<?php
// $Id$

/**
 * @file
 * Default configuration for setting API keys and enabling modules.
 * Copy default.config.php to config.php and run chmod 644 config.php
 */

// choose the template to use located in the templates directory
$TEMPLATE = 'default';

// Set API keys fpr accessing Web Services
$API_KEY_AMAZON = '';
$API_KEY_CJ = '';
$API_KEY_YOUTUBE = '';

// Modules
$MODULE_AMAZON = TRUE;
$MODULE_CJ = FALSE;
$MODULE_YOUTUBE = FALSE;