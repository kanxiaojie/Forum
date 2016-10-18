<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'name', 'maleNumber', 'femaleNumber'
    ];

    /**
     * @return bool
     * 添加数据库中没有的字段
     */
    public function getIsAdminAttribute()
    {
        return $this->attributes['admin'] == 'yes';
    }
    protected $appends = ['is_admin'];

    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
