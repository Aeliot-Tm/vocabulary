<?php
/**
 * Created by PhpStorm.
 * User: Aeliot
 * Date: 12.02.2017
 * Time: 21:52
 */

namespace App\Http\Controllers;

use App\Services\ThemeService;
use Illuminate\Http\Request;

/**
 * Class ThemeController
 * @package App\Http\Controllers
 */
class ThemeController extends Controller
{
    /**
     * @var ThemeService
     */
    private $themeService;

    /**
     * @param ThemeService $themeService
     */
    public function __construct(ThemeService $themeService)
    {
        $this->themeService = $themeService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = $this->getUser($request);
        $data = ['themes' => $this->themeService->getByUser($user)];

        return $this->buildView('themes.index', $data);
    }

    /**
     * @param Request $request
     * @param int $themeId
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function addEdit(Request $request, $themeId = null)
    {
        $this->validate($request, ['title' => 'required']);
        $data = $request->only(['title']);
        $user = $this->getUser($request);

        if (empty($themeId)) {
            $theme = $this->themeService->add($user, $data);
        } else {
            $theme = $this->themeService->update($user, $themeId, $data);
        }

        if ($request->ajax()) {
            // "wordsUrl" uses by js-template
            $theme->wordsUrl = $this->buildUrlByName('theme-words', ['themeId' => $theme->id]);

            return $this->buildJsonResponse(['theme' => $theme]);
        }

        //TODO use constant
        return $this->buildRedirectResponse($this->buildUrlByName('themes'));
    }
}
