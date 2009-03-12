<?php
/**
 * @file
 * Default configuration for setting API keys and enabling modules.
 * Copy default.config.php to config.php and run chmod 644 config.php
 */

###### Settings for display ######
$CONFIG['TEMPLATE'] = 'default'; # the template to use

###### Default settings for the site ######
$CONFIG['SITE']['TITLE'] = 'Default title of the site';
$CONFIG['SITE']['MISSION'] = 'Default mission of the site';

###### Settings for modules ######

# Amazon module required
$CONFIG['AMAZON']['AWSAccessKeyId'] = '';
$CONFIG['AMAZON']['SearchIndex'] = '';

# Amazon module optional
$CONFIG['AMAZON']['AssociateTag'] = '';