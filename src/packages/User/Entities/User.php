<?php

namespace Modules\User\Entities;

use Illuminate\Auth\Authenticatable;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends EloquentUser implements AuthenticatableContract
{
    use Authenticatable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_login'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','first_name','last_name','fullName','status','type','blance'
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
    
    /**
     * Scope a query to only include without users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithoutAdmin($query){
         return $query->where('type', '!=', 'admin')
                ->whereNotNull('type');
    }

    public static function getUsers($paginate = true, $withAdmin = false){
        $eluquent = static::orderBy('created_at','desc'); 
        if(! $withAdmin){
            $eluquent = $eluquent->withoutAdmin();
        }

        if($paginate){
            $eluquent = $eluquent->paginate();
        }else{
            $eluquent = $eluquent->get();         
        }

        return $eluquent;
    }

    public static function getById($id){
        return static::where('id',$id)->first();
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getStatusAttribute($status)
    {
        if($status){
            return "<p style='background-color:green;
                        padding:5px;color:#ffffff;
                        text-align:center;font-weight:bold'>Active</p>";
        }
        return "<p style='background-color:red;
                        padding:5px;color:#ffffff;
                        text-align:center;font-weight:bold;'>InActive</p>";
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];
}
