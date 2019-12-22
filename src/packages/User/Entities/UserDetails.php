<?php

namespace Modules\User\Entities;

use Modules\Core\Eloquent\Model;

class UserDetails extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'phone','address','gender','date_of_birth'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function($query){
            // $query->where('status', true);
        });
    }

    public static function getByUserId($id){
        return static::where('user_id',$id)->first();
    }

    // /**
    //  * Get the user's full name.
    //  *
    //  * @return string
    //  */
    // public function getFullNameAttribute()
    // {
    //     return "{$this->first_name} {$this->last_name}";
    // }

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'status' => 'boolean',
    // ];
}
