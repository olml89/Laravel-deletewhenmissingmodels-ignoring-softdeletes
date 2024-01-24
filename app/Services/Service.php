<?php declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

interface Service
{
    public function execute(Model $model): void;
}
