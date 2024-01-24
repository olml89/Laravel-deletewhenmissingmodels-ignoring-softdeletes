<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NoSoftDeletableModel
 *
 * @method static \Database\Factories\NoSoftDeletableModelFactory factory($count = null, $state = [])
 */
class NoSoftDeletableModel extends Model
{
    use HasFactory;
}
