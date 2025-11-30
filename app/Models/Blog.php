<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Fields we can fill from forms
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
    ];

    // Each blog belongs to one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
