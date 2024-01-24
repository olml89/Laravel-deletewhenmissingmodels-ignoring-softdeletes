<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Jobs\Job;
use App\Models\NoSoftDeletableModel;
use App\Models\SoftDeletableModel;
use App\Services\Service;
use Illuminate\Database\Eloquent\Model;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

final class JobTest extends TestCase
{
    private function setUpService(Job $job): void
    {
        $this->app->instance(
            Service::class,
            Mockery::mock(
                Service::class,
                function (MockInterface $mock) use ($job): void {
                    $mock
                        ->shouldReceive('execute')
                        ->withArgs(
                            fn (Model $model): bool => $model->getKey() === $job->model->getKey()
                        )
                        ->never();
                }
            )
        );
    }

    public function testItShouldDiscardJobWithDeleteWhenMissingModelsWhenModelIsDeleted(): void
    {
        $noSoftDeletableModel = NoSoftDeletableModel::factory()->create();
        $job = new Job($noSoftDeletableModel);

        $this->setUpService($job);

        $noSoftDeletableModel->delete();
        dispatch($job);
    }

    public function testItShouldDiscardJobWithDeleteWhenMissingModelsWhenModelIsSoftDeleted(): void
    {
        $softDeletableModel = SoftDeletableModel::factory()->create();
        $job = new Job($softDeletableModel);

        $this->setUpService($job);

        $softDeletableModel->delete();
        dispatch($job);
    }
}
