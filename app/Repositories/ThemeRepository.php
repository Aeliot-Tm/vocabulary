<?php
/**
 * Created by PhpStorm.
 * User: Aeliot
 * Date: 12.02.2017
 * Time: 22:26
 */

namespace App\Repositories;

use App\Models\Theme;
use App\Models\User;

/**
 * Class ThemeRepository
 *
 * @method Theme create(array $data)
 * @method Theme findOneByIdOrFail($id)
 *
 * @package App\Repositories
 */
class ThemeRepository extends AbstractRepository
{
    /**
     * ThemeRepository constructor.
     */
    public function __construct()
    {
        $this->modelName = Theme::class;
    }

    /**
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection|Theme[]
     */
    public function findAllByUser(User $user)
    {
        return Theme::where(Theme::FIELD_OWNER_ID, static::OPERATOR_EQUAL, $user->id)->get();
    }
}