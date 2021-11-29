<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'document',
        'address',
        'phone',
        'birthdate',
        'height',
        'weight',
        'notes',
        'properties',
        'category_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'birthdate' => 'date',
        'properties' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function setPropertiesAttribute($value)
    {
        $parsedValue = [];
        $properties = $this->category->properties ?? [];

        foreach ($properties as $property) {
            if (isset($value[$property])) {
                $parsedValue[$property] = $value[$property];
            }
        }

        $this->attributes['properties'] = json_encode($parsedValue);
    }
}
