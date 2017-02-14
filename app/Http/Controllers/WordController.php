<?php
/**
 * Created by PhpStorm.
 * User: Aeliot
 * Date: 12.02.2017
 * Time: 21:52
 */

namespace App\Http\Controllers;

use App\Services\WordService;
use Illuminate\Http\Request;

/**
 * Class ThemeController
 * @package App\Http\Controllers
 */
class WordController extends Controller
{
    /**
     * @var WordService
     */
    private $wordService;

    /**
     * @param WordService $wordService
     */
    public function __construct(WordService $wordService)
    {
        $this->wordService = $wordService;
    }

    /**
     * @param Request $request
     * @param int $themeId
     * @param int|null $page
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request, $themeId, $page = null)
    {
        $page = intval($page);
        if ($page < 1) {
            $url = $this->buildUrlByName('theme-words', ['themeId' => $themeId, 'page' => 1]);

            return $this->buildRedirectResponse($url);
        }
        $user = $this->getUser($request);

        try {
            $wordsPaginator = $this->wordService->getList($user, $themeId, $page);
            if (!$wordsPaginator->count() && ($page > 1)) {
                $url = $this->buildUrlByName('theme-words', ['themeId' => $themeId, 'page' => --$page]);

                return $this->buildRedirectResponse($url);
            }
            $data = [
                'words' => $wordsPaginator,
                'themeId' => $themeId,
            ];
        } catch (\Exception $exception) {
            $this->throwHttpException($exception->getCode(), $exception->getMessage());
        }

        return $this->buildView('words.index', $data);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function addEdit(Request $request, $id = null)
    {
        $this->validateEditRequest($request);

        $data = $request->all();
        $user = $this->getUser($request);

        if (empty($id)) {
            $theme = $this->wordService->add($user, $data);
        } else {
            $theme = $this->wordService->update($user, $id, $data);
        }

        if ($request->ajax()) {
            return $this->buildJsonResponse(['word' => $theme]);
        }

        $themeId = $request->get('themeId');
        $url = $this->buildUrlByName('theme-words', ['themeId' => $themeId]);

        return $this->buildRedirectResponse($url);
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Http\Exception\HttpResponseException
     */
    private function validateEditRequest(Request $request)
    {
        $this->validate(
            $request,
            [
                'theme_id' => 'required',
                'en' => 'required',
                'ru' => 'required',
            ]
        );
    }
}
