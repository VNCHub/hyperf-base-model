<?php

declare(strict_types=1);

namespace App\Model;

/**
 * @property $id
 * @property $name
 * @property $description
 * @property $created_at
 * @property $updated_at
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected ?string $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['id', 'name', 'description', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected array $casts = ['id' => 'integer'];

}