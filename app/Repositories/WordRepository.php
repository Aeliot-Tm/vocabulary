<?php
/**
 * Created by PhpStorm.
 * User: Aeliot
 * Date: 12.02.2017
 * Time: 22:26
 */

namespace App\Repositories;

use App\Models\Word;
use App\Models\Theme;

/**
 * Class WordRepository
 *
 * @method Theme create(array $data)
 *
 * @package App\Repositories
 */
class WordRepository extends AbstractRepository
{
    /**
     * ThemeRepository constructor.
     */
    public function __construct()
    {
        $this->modelName = Word::class;
    }

    /**
     * @param Theme $theme
     * @return \Illuminate\Database\Eloquent\Collection|Word[]
     */
    public function findAllByTheme(Theme $theme)
    {
        return Word::where(Word::FIELD_THEME_ID, static::OPERATOR_EQUAL, $theme->id)->get();
    }

    /**
     * @param Theme $theme
     * @param int $page
     * @param int $perPage
     * @return \Illuminate\Database\Eloquent\Collection|Theme[]
     */
    public function findByThemeForPage(Theme $theme, $page, $perPage = 15)
    {
        return $this->getQueryByTheme($theme, $page, $perPage)->get();
    }

    /**
     * @param Theme $theme
     * @param int $page
     * @param int $perPage
     * @return int
     */
    public function getCountByTheme(Theme $theme, $page, $perPage = 15)
    {
        return $this->getQueryByTheme($theme, $page, $perPage)
            ->getQuery()
            ->getCountForPagination();
    }

    /**
     * @param Theme $theme
     * @param $page
     * @param int $perPage
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function getQueryByTheme(Theme $theme, $page, $perPage = 15)
    {
        /** @var \Illuminate\Database\Eloquent\Builder $builder */
        $builder = Word::where(Word::FIELD_THEME_ID, static::OPERATOR_EQUAL, $theme->id);
        if ($page) {
            $builder->forPage($page);
        }
        if ($perPage) {
            $builder->limit($perPage);
        }

        return $builder;
    }
}
