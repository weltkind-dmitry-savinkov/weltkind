<?php
namespace App\Modules\Blog\Models;

use App\Models\Model;
use App\Modules\Admin\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use App\Modules\Users\Models\User;


/**
 * App\Model\Blog
 *
 * @property integer $id
 * @property string $title
 * @property string $lang
 * @property integer $published
 * @property \Carbon\Carbon $date
 * @property integer $user_id
 * @property string $preview
 * @property string $content
 * @property integer $comments
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Blog\Models\Blog $blog
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog withContact($contactId)
 * @mixin \Eloquent
 * @property-read \App\Modules\Users\Models\User $user
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog order()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model published()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog sortable($defaultSortParameters = null)
 * @property string $meta_h1
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereLang($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog wherePreview($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereComments($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereMetaTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereMetaH1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereMetaKeywords($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Blog\Models\Blog whereMetaDescription($value)
 */
class Blog extends Model
{

    use Notifiable, Sortable;

    protected $table = 'blog';

    protected $guarded = array('id', 'created_at', 'updated_at');


    public function scopeOrder($query){


        return $query->orderBy('date', 'desc');
    }

    protected function beforeCreate($model)
    {
        parent::beforeCreate($model);
        $model->user_id = Auth::user()->id;
    }

    public function user()
    {
         return $this->belongsTo(\App\Modules\Admin\Models\Admin::class, 'user_id');
    }


}
