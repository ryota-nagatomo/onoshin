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
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
    // confirm if already following
    $exist = $this->is_following($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;

    if ($exist || $its_me) {
        // do nothing if already following
        return false;
    } else {
        // follow if not following
        $this->followings()->attach($userId);
        return true;
    }
    }

    public function unfollow($userId)
    {   
    // confirming if already following
    $exist = $this->is_following($userId);
    // confirming that it is not you
    $its_me = $this->id == $userId;


    if ($exist && !$its_me) {
        // stop following if following
        $this->followings()->detach($userId);
        return true;
    } else {
        // do nothing if not following
        return false;
    }
    }

    public function is_following($userId) {
    return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function get_week_date($ymd) {
        // 日曜日始まり
        $w = date("w",strtotime($ymd));
        $beginning_week_date =
            date('Y-m-d', strtotime("-{$w} day", strtotime($ymd)));
        return $beginning_week_date;
    }
    
    public function avg_this($category, $userId){
        $today = date("Y-m-d H:i:s"); //今日の日付
        $weekday = $this->get_week_date($today); //週初日を出す
        
        $exist = \DB::table('goals')->selectRaw('*')->where('category', $category)->where('user_id', $userId)->whereBetween('created_at', [$weekday, $today])->exists();
        //今週のデータがあるかどうか
            if($exist){
                $temp = \DB::table('goals')->selectRaw('AVG(rate) average, WEEK(created_at) week')->where('category', $category)->where('user_id', $userId)->orderBy('week', 'DESC')->groupBy('week')->first(); 
            //あったら
                $sub = $temp->average;
            }
            elseif(!$exist){
                $sub = 0;
            }
        return $sub;
    }
    
    public function avg_last($category, $userId){
        $today = date("Y-m-d H:i:s"); //今日の日付
        $weekday = $this->get_week_date($today); //週初日を出す
        $last_week_day = date('Y-m-d', strtotime("$weekday - 1 day"));
        //先週の末日
        $last_begining_weekday = $this->get_week_date($last_week_day); //先週の週初日を出す
        
        $exist_this = \DB::table('goals')->selectRaw('*')->where('category', $category)->where('user_id', $userId)->whereBetween('created_at', [$weekday, $today])->exists();
        $exist_last = \DB::table('goals')->selectRaw('*')->where('category', $category)->where('user_id', $userId)->whereBetween('created_at', [$last_begining_weekday, $last_week_day])->exists();
        
        //先週のデータがあるかどうか
            if($exist_last){
                //さらに今週のデータがあるかどうか
                if($exist_this){
                    //あったら
                    $temp = \DB::table('goals')->selectRaw('AVG(rate) average, WEEK(created_at) week')->where('category', $category)->where('user_id', $userId)->orderBy('week', 'DESC')->groupBy('week')->take(2)->get();
                    $sub = $temp[1]->average;    
                }
                
                else{
                    //今週のデータがなかったら
                    $temp = \DB::table('goals')->selectRaw('AVG(rate) average, WEEK(created_at) week')->where('category', $category)->where('user_id', $userId)->orderBy('week', 'DESC')->groupBy('week')->first();
                    $sub = $temp->average;
                }
            }
            
            else{
                //先週のデータなかったら
                $sub = 0;
            }
                
        return $sub;
    }       
    
            
    
}