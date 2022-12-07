<?php
// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();
$plugin->version = 2023050900;
$plugin->requires = 2020110300;
$plugin->component = 'theme_aspire';
$plugin->dependencies = [
    'theme_classic' => 2020110900
];
$plugin->maturity = MATURITY_STABLE;

$plugin->release = 1.0;