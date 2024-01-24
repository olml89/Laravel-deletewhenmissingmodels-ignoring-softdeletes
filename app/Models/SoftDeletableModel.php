<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\SoftDeletableModel
 *
 * @method static \Database\Factories\SoftDeletableModelFactory factory($count = null, $state = [])
 */
class SoftDeletableModel extends Model
{
    use HasFactory, SoftDeletes;
}
