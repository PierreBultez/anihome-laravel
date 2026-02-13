<?php

namespace App\Models;

use Database\Factories\ServiceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HigherOrderCollectionProxy;

class Service extends Model
{
    /** @use HasFactory<ServiceFactory> */
    use HasFactory;

    /**
     * @var HigherOrderCollectionProxy|mixed
     */
    public mixed $is_active;
    /**
     * @var HigherOrderCollectionProxy|mixed
     */
    public mixed $is_featured;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image_path',
        'icon',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];
}
