<?php

namespace App\Modules\Users\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Modules\Blog\Models\Blog;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Modules\Users\Models\User
 *
 * @property-write mixed $password
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Blog\Models\Blog[] $blogs
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User list()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User order()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Users\Models\User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use Notifiable, Sortable;

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


    public function setPasswordAttribute($password)
    {
        if ($password){
            $this->attributes['password'] = bcrypt($password);
        }

    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function scopeAdmin($query)
    {
        return $query->filtered()->order();
    }

    public function scopeFiltered($query)
    {
        return $query;
    }

    public function scopeList($query)
    {
        return $query->filtered()->order();
    }

    public function scopeOrder($query)
    {
        return $query;
    }

}
