<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ExampleModel
 *
 * @method static \Database\Factories\ExampleModelFactory factory($count = null, $state = [])
 */
class ExampleModel extends Model
{
    use HasFactory, SoftDeletes;
}
