<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Message extends Model
{

    use Sluggable;
    use SluggableScopeHelpers;
   protected $guarded = [];

   public function user()
   {
       return $this->belongsTo(User::class);
   }

    public function status()
    {
        if ($this->read > 0){
            return "<span class='badge badge-success'>Read</span>";
        }else {
            return "<span class='badge badge-warning'>Unread</span>";
        }
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
