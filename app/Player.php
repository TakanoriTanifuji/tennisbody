<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

   use Searchable;

   public function searchableAs()
    {
        return 'players';
    }


    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
