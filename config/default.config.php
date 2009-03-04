<?php
/**
 * @file
 * Default configuration for setting API keys and enabling modules.
 * Copy default.config.php to config.php and run chmod 644 config.php
 */

###### Settings for display ######
$CONFIG['TEMPLATE'] = 'default';

###### Settings for modules ######

# Amazon module required
$CONFIG['AMAZON']['AWSAccessKeyId'] = '';
$CONFIG['AMAZON']['SearchIndex'] = '';

# Amazon module optional
$CONFIG['AMAZON']['AssociateTag'] = '';
$CONFIG['AMAZON']['Title'] = ''; # TODO not valid for all requests!!!