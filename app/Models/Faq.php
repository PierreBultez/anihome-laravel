<?php

namespace App\Models;

use Database\Factories\FaqFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HigherOrderCollectionProxy;

class Faq extends Model
{
    /** @use HasFactory<FaqFactory> */
    use HasFactory;

    /**
     * @var HigherOrderCollectionProxy|mixed
     */
    public mixed $order;
    protected $fillable = [
        'question',
        'answer',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
