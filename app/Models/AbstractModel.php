<?php

namespace App\Models;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractModel
 *
 * @method static AbstractModel|Collection find($id, $columns = ['*'])
 * @method static AbstractModel findOrFail($id, $columns = ['*'])
 * @method static AbstractModel select($columns = ['*'])
 *
 * @package App\Models
 */
abstract class AbstractModel extends Model implements Arrayable, Jsonable
{
    const FIELD_ID = 'id';
    const FIELD_CREATED_AT = 'created_at';
    const FIELD_UPDATED_AT = 'updated_at';

    /**
     * @inheritdoc
     */
    protected $hidden = [self::FIELD_CREATED_AT, self::FIELD_UPDATED_AT];
}
