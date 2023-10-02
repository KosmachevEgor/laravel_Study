<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;

class Post extends Model
{
    use HasFactory;
    use Filterable;
    protected $table = 'posts';
    protected $guarded = [];


    public function category()
    {
        //Связь один ко многим
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        //Связь многие ко многим
        return $this->belongsToMany(Tag::class);
    }
}
