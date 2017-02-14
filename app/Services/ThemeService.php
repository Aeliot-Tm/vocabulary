<?php
/**
 * Created by PhpStorm.
 * User: Aeliot
 * Date: 13.02.2017
 * Time: 0:40
 */

namespace App\Services;

use App\Models\Theme;
use App\Models\User;
use App\Repositories\ThemeRepository;

/**
 * Class ThemeService
 * @package App\Services
 */
class ThemeService
{
    /**
     * @var ThemeRepository
     */
    private $themeRepository;

    /**
     * @param ThemeRepository $themeRepository
     */
    public function __construct(ThemeRepository $themeRepository)
    {
        $this->themeRepository = $themeRepository;
    }

    /**
     * @param User $user
     * @param array $data
     * @return Theme
     */
    public function add(User $user, array $data)
    {
        $data[Theme::FIELD_OWNER_ID] = $user->id;

        return $this->themeRepository->create($data);
    }

    /**
     * @param User $user
     * @param int $themeId
     * @param array $data
     * @return Theme
     */
    public function update(User $user, $themeId, array $data)
    {
        $theme = $this->getTheme($themeId);
        $this->checkUserAccess($user, $theme);
        $theme->fill($data)->save();

        return $theme;
    }

    /**
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection|Theme[]
     */
    public function getByUser(User $user)
    {
        return $this->themeRepository->findAllByUser($user);
    }

    /**
     * @param User $user
     * @param Theme $theme
     * @throws \Exception
     */
    private function checkUserAccess(User $user, Theme $theme)
    {
        if ($theme->owner_id != $user->id) {
            throw new \Exception('Only author has access.', 403);
        }
    }

    /**
     * @param int $id
     * @return Theme|\App\Models\AbstractModel
     * @throws \InvalidArgumentException
     */
    private function getTheme($id)
    {
        $theme = $this->themeRepository->findOneById($id);
        if (empty($theme)) {
            throw new \InvalidArgumentException('There is no such theme.');
        }

        return $theme;
    }
}