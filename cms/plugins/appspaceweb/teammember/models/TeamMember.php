<?php namespace AppSpaceWeb\TeamMember\Models;

use System\Models\File;
use October\Rain\Database\Model;
use October\Rain\Support\Facades\Flash;

/**
 * Team Model
 */
class TeamMember extends Model
{
    use \October\Rain\Database\Traits\Sortable;

    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'appspaceweb_team_members';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'sort_order'   => 'nullable|unique',
        'name'         => 'required',
        'stack_string' => 'required',
        'avatar'       => 'required'
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'sort_order' => 'integer'
    ];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    public $attachOne = [
        'avatar' => File::class
    ];

    public function getStackAttribute()
    {
        return $this->stack_string ? explode(',', $this->stack_string) : $this->stack_string;
    }

    public function scopeIsPublished($query)
    {
        return $query->where('is_published', true);
    }

    public function index_onUpdatePosition()
    {
        if (($reorderIds = post('checked')) && is_array($reorderIds) && count($reorderIds)) {
            $model = new TeamMember();
            $model->setSortableOrder($reorderIds, array_keys($reorderIds));

            Flash::success('Successfully re-ordered records.');
        }

        return $this->listRefresh();
    }
}
