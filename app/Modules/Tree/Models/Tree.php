<?php
namespace App\Modules\Tree\Models;

use App\Models\Lang;
use App\Models\Tree as ParentTree;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Modules\Tree\Models\Tree
 *
 * @property-read \App\Modules\Tree\Models\Tree $parent
 * @property-read \Baum\Extensions\Eloquent\Collection|\App\Modules\Tree\Models\Tree[] $children
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tree admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tree filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tree published()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tree order()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutNode($node)
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutSelf()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node withoutRoot()
 * @method static \Illuminate\Database\Query\Builder|\Baum\Node limitDepth($limit)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 * @property int $id
 * @property int $parent_id
 * @property int $lft
 * @property int $rgt
 * @property int $depth
 * @property string $lang
 * @property string $slug
 * @property string $title
 * @property string $content
 * @property string $module
 * @property string $template
 * @property bool $published
 * @property bool $in_menu
 * @property string $meta_title
 * @property string $meta_h1
 * @property string $meta_keywords
 * @property string $meta_description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereLft($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereRgt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereDepth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereLang($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereModule($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereTemplate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereInMenu($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereMetaTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereMetaH1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereMetaKeywords($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereMetaDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Tree\Models\Tree whereUpdatedAt($value)
 */
class Tree extends ParentTree{

    use Sortable;

    protected $table = 'tree';





}