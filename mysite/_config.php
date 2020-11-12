<?php

global $project;
$project = 'stripeTesting';

global $database;
$database = 'stripeTesting';

require_once 'conf/ConfigureFromEnv.php';

// Set the site locale
i18n::set_locale('en_US');
