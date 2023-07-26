<?php

use FourYouSee\Controllers\PlanController;
use FourYouSee\Helpers\Container;
use FourYouSee\Services\PlanService;
use FourYouSee\Repositories\PlanRepository;

require_once 'autoload.php';

$container = new Container();

$container->set('PlanRepository', fn (): PlanRepository => new PlanRepository());
$container->set('PlanService', fn (object $container): PlanService => new PlanService(
    $container->geT('PlanRepository')
));
$container->set('PlanController', fn (object $container): PlanController => new PlanController(
    $container->get('PlanService')
));

$app = $container->get('PlanController');
