<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 *
 * @property int $id
 * @property string|null $source
 * @property int|null $source_id
 * @property string|null $taxonomy
 * @property string|null $title
 * @property string|null $slug
 * @property int|null $count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static Builder<static>|Tag newModelQuery()
 * @method static Builder<static>|Tag newQuery()
 * @method static Builder<static>|Tag query()
 * @method static Builder<static>|Tag whereCount($value)
 * @method static Builder<static>|Tag whereCreatedAt($value)
 * @method static Builder<static>|Tag whereId($value)
 * @method static Builder<static>|Tag whereSlug($value)
 * @method static Builder<static>|Tag whereSource($value)
 * @method static Builder<static>|Tag whereSourceId($value)
 * @method static Builder<static>|Tag whereTaxonomy($value)
 * @method static Builder<static>|Tag whereTitle($value)
 * @method static Builder<static>|Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
	protected $table = 'tag';

	protected $casts = [
		'source_id' => 'int',
		'count' => 'int'
	];

	protected $fillable = [
		'source',
		'source_id',
		'taxonomy',
		'title',
		'slug',
		'count'
	];
}
