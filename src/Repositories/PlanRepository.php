<?php

declare(strict_types=1);

namespace FourYouSee\Repositories;

class PlanRepository
{
    /**
     * @var string
     */
    private const JSON_PATH = __DIR__ . '/../../infra/data.json';

    /**
     * @return array
     */
    public function getJson(): array
    {
        return json_decode(file_get_contents(self::JSON_PATH), true);
    }
}
