<?php

namespace App\Models;

/**
 * Class Theme
 *
 * @property int $id
 * @property int $owner_id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property User $owner
 *
 * @package App\Models
 */
class Theme extends AbstractModel
{
    const FIELD_OWNER_ID = 'owner_id';
    const FIELD_TITLE = 'title';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'theme';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [self::FIELD_OWNER_ID, self::FIELD_TITLE];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
