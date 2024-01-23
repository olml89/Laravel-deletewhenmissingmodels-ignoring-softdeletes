<?php declare(strict_types=1);

namespace App\Services;

use App\Models\ExampleModel;

interface Service
{
    public function execute(ExampleModel $exampleModel): void;
}
