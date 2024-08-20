<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ['title', 'intro', 'body'];

    // added relation from start Blog
    protected $with = ['category', 'author'];

    public function category()
    {
        // hasOne hasMany belongsTo belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
