<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
    
    public function goods()
    {
     return $this->belongsToMany(Goal::class, 'good_user', 'user_id', 'goal_id')->withTimestamps();
    }
 
 
 
    public function good($goalId)
    {
    $exist = $this->is_good($goalId);
    
    if($exist){
     
     return false;
    }else{
        $this->goods()->attach($goalId);
        return true;
    }
      
 }
 
 
 
 
 public function ungood($goalId)
 {
    $exist = $this->is_good($goalId);
    
    if($exist){
     $this->goods()->detach($goalId);
     return true;
    }else{
        return false;
    }
 }
 
 
  public function is_good($goalId) {
    return $this->goods()->where('goal_id', $goalId)->exists();
}
 
 
 
 
}
