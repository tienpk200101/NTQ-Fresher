<?php

namespace App\Models;

use Cloudinary\Api\Provisioning\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['name', 'slug'];

    public function getUserRole() {
        return $this->hasMany(RoleUser::class, 'role_id');
    }
}
