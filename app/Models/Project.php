<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'slug', 'thumb', 'category', 'status'];

    public function thumb(): Attribute
    {
<<<<<<< HEAD
        return Attribute::make(
            get: fn (string $value) => asset('storage/' . $value)
        );
=======
        return Attribute::make(get: fn (string $value) => asset('storage/' . $value));
>>>>>>> f1492f60daac9cce2c757af25cd2f46419c48ea7
    }
}
