<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Return a new JSON response from the application.
     *
     * @param  string|array $data
     * @param  int $status
     * @param  array $headers
     * @param  int $options
     * @return \Illuminate\Http\JsonResponse
     */
    protected function buildJsonResponse($data, $status = 200, array $headers = [], $options = 0)
    {
        return response()->json($data, $status, $headers, $options);
    }

    /**
     * Get an instance of the redirector.
     *
     * @param  string $to
     * @param  int $status
     * @param  array $headers
     * @param  bool $secure
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function buildRedirectResponse($to, $status = 302, $headers = [], $secure = null)
    {
        return redirect($to, $status, $headers, $secure);
    }

    /**
     * Generate a URL to a named route.
     *
     * @param  string $name
     * @param  array $parameters
     * @param  bool $absolute
     * @param  \Illuminate\Routing\Route $route
     * @return string
     */
    protected function buildUrlByName($name, $parameters = [], $absolute = false, $route = null)
    {
        return route($name, $parameters, $absolute, $route);
    }

    /**
     * @param null $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\View\View
     */
    protected function buildView($view, $data = [], $mergeData = [])
    {
        return view($view, $data, $mergeData);
    }

    /**
     * @param Request $request
     * @return \App\Models\User|null
     */
    protected function getUser(Request $request)
    {
        $user = $request->user();

        return $user ? $user : null;
    }

    /**
     * @param int $statusCode
     * @param string $message
     * @throws HttpException
     */
    protected function throwHttpException($statusCode, $message = null)
    {
        throw new HttpException($statusCode, $message);
    }
}
