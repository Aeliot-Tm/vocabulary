<?php
/**
 * Created by PhpStorm.
 * User: Aeliot
 * Date: 13.02.2017
 * Time: 23:09
 */

namespace App\Http\Pagitation;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class InlinePaginator
 * @package App\Http\Pagitation
 */
class InlinePaginator extends LengthAwarePaginator
{
    /**
     * @var string
     */
    private $pageNamePattern = '~/\{page\?\}~';

    /**
     * @param string $pattern
     */
    public function setPageNamePattern($pattern)
    {
        $this->pageNamePattern = $pattern;
    }

    /**
     * @return string
     */
    public function getPageNamePattern()
    {
        return $this->pageNamePattern;
    }

    /**
     * Get a URL for a given page number.
     *
     * @param  int $page
     * @return string
     */
    public function url($page)
    {
        if ($page <= 0) {
            $page = '';
        }
        // If we have any extra query string key / value pairs that need to be added
        // onto the URL, we will put them in query string form and then attach it
        // to the URL. This allows for extra information like sortings storage.
        //$parameters = [$this->pageName => $page];
        $parameters = [];
        if (count($this->query) > 0) {
            $parameters = array_merge($this->query, $parameters);
        }
        $tail = http_build_query($parameters, null, '&') . $this->buildFragment();

        return preg_replace($this->pageNamePattern, '/' . $page, $this->path)
            . ($tail ? '?' . $tail : $tail);
    }
}
