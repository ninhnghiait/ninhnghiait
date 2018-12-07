<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
	use Searchable;
	protected $fillable = [ 'name' ]; 
    public function searchableAs()
    {
        return 'articles_index';
    }
}
