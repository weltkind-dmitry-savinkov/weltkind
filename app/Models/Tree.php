<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;


/**
 * App\Models\Tree
 *
 * @property-read \App\Models\Tree $parent
 * @property-read \Baum\Extensions\Eloquent\Collection|\App\Models\Tree[] $children
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tree admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tree filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tree published()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tree order()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutNode($node)
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutSelf()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutRoot()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node limitDepth($limit)
 * @mixin \Eloquent
 */
class Tree extends \Baum\Node{

    protected $table = null;

    // 'parent_id' column name
    protected $parentColumn = 'parent_id';

    // 'lft' column name
    protected $leftColumn = 'lft';

    // 'rgt' column name
    protected $rightColumn = 'rgt';

    // 'depth' column name
    protected $depthColumn = 'depth';

    // guard attributes from mass-assignment
    protected $guarded = array('id', 'parent_id', 'lidx', 'ridx', 'depth');


    public static function getTableStatic()
    {
        return with(new static)->getTable();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            self::beforeCreate($model);
        });

        static::updating(function ($model) {
            self::beforeSave($model);
        });

        with(new static)->addGlobalScopes();


    }


    protected function addGlobalScopes()
    {

        if (Schema::hasColumn(self::getTableStatic(), 'lang')) {
            static::addGlobalScope('lang', function (Builder $builder) {
                $builder->where('lang', '=', lang());
            });
        }

    }

    protected static function beforeCreate($model)
    {

        $columns = Schema::getColumnListing($model->getTable());

        if (in_array('lang', $columns)) {
            $model->lang = lang();
        }

    }

    protected static function beforeSave($model)
    {

    }


    public function scopeAdmin($query)
    {
        return $query->filtered()->order();
    }

    public function scopeFiltered($query)
    {
        return $query;
    }

    public function scopePublished($query)
    {
        return $query->order()->where('published', 1);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy($this->leftColumn);
    }





}