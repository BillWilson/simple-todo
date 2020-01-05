<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\TodoList
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $title
 * @property object|null $content
 * @property string|null $attachment
 * @property \Illuminate\Support\Carbon|null $done_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\TodoList onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereDoneAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TodoList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TodoList withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\TodoList withoutTrashed()
 */
class TodoList extends Model
{
    use SoftDeletes;

    protected $guarded = 'unguard';

    protected $table = 'todolist';

    protected $fillable = [
        'title',
        'content',
        'attachment',
        'done_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
    ];

    protected $casts = [
        'content' => 'object',
        'done_at' => 'datetime',
    ];
}
