<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;
    protected $guard = "admin";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // One to One Relationship
//    public function info() {
//        return $this->hasOne('App\Models\AdminInfo');
//    }

    public function info() {
        return $this->hasOne('App\Models\AdminInfo', 'admin_id', 'id');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'admin_role', 'admin_id', 'role_id');
    }

    public function permissions() {
        return $this->belongsToMany('App\Models\Permission', 'admin_permission', 'admin_id', 'permission_id');
    }

    public function checkPermissionAccess($permisionName) {
//        return true;
//        return false;

        // B1: Lấy dc tất cả các quyền của admin dag login vào hệ thống
        // B2: So sánh giá trị đưa vào của route hiện tại xem có tồn tại trong list quyền mình lấy dc ko

        // Get Permission via Roles
        $roles = auth()->user()->roles;
//        dd($roles);
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if($permissions->contains('name', $permisionName)) {
                return true;
            }
        }

        // Get Direct Permissions
        $permissions = auth()->user()->permissions;
        if($permissions->contains('name', $permisionName)) {
            return true;
        }

        return false;
    }
}
