<?php

namespace FourYouSee\Controllers;

use FourYouSee\Services\PlanService;

class PlanController
{
    /**
     * @param PlanService $planService
     */
    public function __construct(private PlanService $planService)
    {
    }

    /**
     * @return array
     */
    public function index(): array
    {
        return $this->planService->getPlans();
    }
}
