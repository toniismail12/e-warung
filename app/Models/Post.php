<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    //protected $fillable = ['title','slug','excert','body'];

    protected $guarded=['id'];
    protected $with=['author', 'category'];


    Public Function scopeFilter($query, array $filters)
    {

       $query->when($filters['search'] ?? false, function($query, $search)
       {
        return $query->where('title','like', '%'.$search. '%')
                    ->orWhere('body','like', '%'.$search. '%');
       });

       $query->when($filters['category'] ?? false, function($query, $category)
       {
           return $query->whereHas('category', function($query)use($category)
           {
               $query->where('slug', $category);
           });
       });

       $query->when($filters['author'] ?? false, fn($query, $author)
            =>$query->whereHas('author', fn($query)=>
            $query->where('username', $author) )
        );
    }

    Public function category()
    {
        return $this->belongsTo(Category::class);
    }

    Public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    Public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
