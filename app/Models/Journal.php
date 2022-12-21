<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Journal extends Model
{
    use HasFactory,Searchable;

    public function journalsImage()
    {
        return $this->belongsTo(JournalsImage::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function searchableAs()
    {
        return 'journal_index';
    }
   
}
