<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'post_id', 'name', 'path', 'thumbnail_path'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function baseDir()
    {
        return 'images/photos';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $this->path = $this->baseDir().'/'.$name;
        $this->thumbnail_path = $this->baseDir().'/tn-'.$name;
    }

    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path,
        ]);

        Parent::delete();
    }
}
