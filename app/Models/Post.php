<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
       use HasFactory;
       protected $fillable = ['title', 'author_id', 'category_id', 'slug', 'body', 'image'];

       protected $with = ['category', 'author', 'role']; //eager loading, memperhemat query

       public function author(): BelongsTo
       {
              return $this->belongsTo(User::class);
       }

       public function category(): BelongsTo
       {
              return $this->belongsTo(Category::class);
       }
       public function role(): BelongsTo
       {
              return $this->belongsTo(Role::class);
       }

       public function scopeSearch(EloquentBuilder $query, array $filters)
       {
              $query->when($filters['search'] ?? false, function ($query, $search) {
                     $query =  $query->where('title', 'like', '%' . $search . '%');
              });

              $query->when($filters['category'] ?? false, function ($query, $category) {
                     $query = $query->whereHas('category', function ($query) use ($category) {
                            $query->whereIn('slug', (array) $category);
                     });
              });

              $query->when($filters['author'] ?? false, function ($query, $author) {
                     $query = $query->whereHas('author', function ($query) use ($author) {
                            $query->whereIn('username', (array) $author);
                     });
              });

              return $query;
       }
}
