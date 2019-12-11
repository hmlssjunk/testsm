<?php

$loader = require_once __DIR__.'/vendor/autoload.php';

$loader->addPsr4('App\\',__DIR__.'/Classes/App');
$loader->addPsr4('Controllers\\',__DIR__.'/Classes/Controllers');
$loader->addPsr4('Database\\',__DIR__.'/Classes/Database');
$loader->addPsr4('Models\\',__DIR__.'/Classes/Models');
$loader->addPsr4('Views\\',__DIR__.'/Classes/Views');

use App\App;

$app = new App();
