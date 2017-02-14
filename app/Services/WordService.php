<?php
/**
 * Created by PhpStorm.
 * User: Aeliot
 * Date: 13.02.2017
 * Time: 0:40
 */

namespace App\Services;

use App\Http\Pagitation\InlinePaginator;
use App\Models\User;
use App\Repositories\ThemeRepository;
use App\Repositories\WordRepository;

/**
 * Class WordService
 * @package App\Services
 */
class WordService
{
    /**
     * @var ThemeRepository
     */
    private $themeRepository;

    /**
     * @var WordRepository
     */
    private $wordRepository;

    /**
     * WordService constructor.
     * @param ThemeRepository $themeRepository
     * @param WordRepository $wordRepository
     */
    public function __construct(ThemeRepository $themeRepository, WordRepository $wordRepository)
    {
        $this->themeRepository = $themeRepository;
        $this->wordRepository = $wordRepository;
    }

    /**
     * @param User $user
     * @param array $data
     * @return \App\Models\Word
     */
    public function add(User $user, array $data)
    {
        //TODO implement
        throw new \Exception('Not implemented word adding');
    }

    /**
     * @param User $user
     * @param int $themeId
     * @param array $data
     * @return \App\Models\Word
     */
    public function update(User $user, $themeId, array $data)
    {
        //TODO implement
        throw new \Exception('Not implemented word updating');
    }

    /**
     * @param User $user
     * @param int $themeId
     * @param int $page
     * @param int $perPage
     * @return InlinePaginator|\App\Models\Word[]
     */
    public function getList(User $user, $themeId, $page, $perPage = 20)
    {
        $theme = $this->getTheme($user, $themeId);
        $words = $this->wordRepository->findByThemeForPage($theme, $page, $perPage);
        $total = $this->wordRepository->getCountByTheme($theme, $page, $perPage);

        return new InlinePaginator($words, $total, $perPage, $page);
    }

    /**
     * @param User $user
     * @param int $themeId
     * @return \App\Models\Theme
     * @throws \Exception
     */
    private function getTheme(User $user, $themeId)
    {
        $theme = $this->themeRepository->findOneByIdOrFail($themeId);
        $credentials = [
            $user->id == $theme->owner_id,
            //TODO check if this is a teacher
        ];
        if (empty(array_filter($credentials))) {
            throw new \Exception('You has no access to the theme');
        }

        return $theme;
    }
}
