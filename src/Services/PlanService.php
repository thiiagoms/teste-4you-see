<?php

declare(strict_types=1);

namespace FourYouSee\Services;

use DateTime;
use FourYouSee\Repositories\PlanRepository;

class PlanService
{
    /**
     * @param PlanRepository $planRepository
     */
    public function __construct(private PlanRepository $planRepository)
    {
    }

    /**
     * @param DateTime $compareDate
     * @return bool
     */
    private function compareDate(DateTime $firstDate, string $compareDate): bool
    {
        $compareDate = DateTime::createFromFormat('Y-m-d H:i', $compareDate);
        return $firstDate > $compareDate;
    }

    /**
     * @param array $plans
     * @return array
     */
    private function validatePlansDate(array $plans): array
    {
        $validPlans = [];
        $date = new DateTime();

        array_map(function (array $plan) use ($date, &$validPlans): void {

            $nameWithLocation = "{$plan['name']}{$plan['localidade']['nome']}";
            $planDate = DateTime::createFromFormat('Y-m-d H:i', $plan['schedule']['startDate']);

            if ($planDate !== false && $planDate < $date) {
                if (
                    !isset($validPlans[$nameWithLocation]) ||
                    $this->compareDate($planDate, $validPlans[$nameWithLocation]['schedule']['startDate'])
                ) {
                    $validPlans[$nameWithLocation] = $plan;
                    return;
                }

                $existingPlanLocationPriority = $validPlans[$nameWithLocation]['localidade']['prioridade'];
                $currentPlanLocationPriority = $plan['localidade']['prioridade'];

                if ($currentPlanLocationPriority < $existingPlanLocationPriority) {
                    $validPlans[$nameWithLocation] = $plan;
                    return;
                }

                if ($currentPlanLocationPriority === $existingPlanLocationPriority) {
                    $existingPlanDate = $this->compareDate(
                        $planDate,
                        $validPlans[$nameWithLocation]['schedule']['startDate']
                    );

                    if ($existingPlanDate) {
                        $validPlans[$nameWithLocation] = $plan;
                    }
                }
            }
        }, $plans['aparelho']['plans']);

        return array_values($validPlans);
    }

    /**
     * @return array[]
     */
    public function getPlans(): array
    {
        $plans = $this->planRepository->getJson();

        $device = $plans['aparelho']['name'];
        $plans = $this->validatePlansDate($plans);

        return [
            'product' => $device,
            'plans' => $plans
        ];
    }
}
