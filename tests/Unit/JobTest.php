<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Jobs\Job;
use App\Models\ExampleModel;
use App\Services\Service;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

final class JobTest extends TestCase
{
    public function testItShouldDiscardTheJobWhenModelIsDeleted(): void
    {
        $exampleModel = ExampleModel::factory()->create();
        $job = new Job($exampleModel);

        $this->app->instance(
            Service::class,
            Mockery::mock(
                Service::class,
                function (MockInterface $mock) use ($job): void {
                    $mock
                        ->shouldReceive('execute')
                        ->withArgs(
                            fn (ExampleModel $exampleModel): bool => $exampleModel->getKey() === $job->exampleModel->getKey()
                        )
                        ->never();
                }
            )
        );

        $exampleModel->delete();
        dispatch($job);
    }
}
