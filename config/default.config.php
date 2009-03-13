<?php
/**
 * @file
 * Default configuration for setting API keys and enabling modules.
 * Copy default.config.php to config.php and run chmod 644 config.php
 */

###### Settings for display ######
$CONFIG['TEMPLATE'] = 'default'; # the template to use

###### Default settings for the site ######
$CONFIG['SITE']['title'] = 'Default title of the site';
$CONFIG['SITE']['mission'] = 'Default mission of the site';

###### Settings for modules ######
$CONFIG['MODULES']['product'] = TRUE;

###### Map paths to moules ######
#Todo modules need to implement a function for the path 
$CONFIG['PATH']['product'] = 'product';
$CONFIG['PATH']['manufacturer'] = 'product';
$CONFIG['PATH']['video'] = 'video';

# Amazon module required
$CONFIG['AMAZON']['AWSAccessKeyId'] = '';
$CONFIG['AMAZON']['SearchIndex'] = '';

# Amazon module optional
$CONFIG['AMAZON']['AssociateTag'] = '';