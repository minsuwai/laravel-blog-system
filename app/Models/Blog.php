<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ['title', 'intro', 'body'];

    public function category()
    {
        // hasOne hasMany belongsTo belongsToMany
        return $this->belongsTo(Category::class);
    }
}
