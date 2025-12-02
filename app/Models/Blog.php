<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use App\Models\Comment;
use App\Models\Like;
use App\Models\Category;


=======
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81

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
<<<<<<< HEAD

    public function likes()
{
    return $this->hasMany(Like::class);
}

public function comments()
{
    return $this->hasMany(Comment::class)->latest();
}

public function isLikedByUser($userId): bool
{
    return $this->likes->contains('user_id', $userId);
}


=======
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81
}
