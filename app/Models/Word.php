<?php

namespace App\Models;

/**
 * Class Theme
 *
 * @property int $id
 * @property int $theme_id
 * @property int $author_id
 * @property string $en
 * @property string $en_description
 * @property string $ru
 * @property string $ru_description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property Theme $theme
 * @property User $author
 *
 * @package App\Models
 */
class Word extends AbstractModel
{
    const FIELD_THEME_ID = 'theme_id';
    const FIELD_AUTHOR_ID = 'author_id';
    const FIELD_EN = 'en';
    const FIELD_EN_DESCRIPTION = 'en_description';
    const FIELD_RU = 'ru';
    const FIELD_RU_DESCRIPTION = 'ru_description';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'word';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::FIELD_THEME_ID,
        self::FIELD_AUTHOR_ID,
        self::FIELD_EN,
        self::FIELD_EN_DESCRIPTION,
        self::FIELD_RU,
        self::FIELD_RU_DESCRIPTION,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
