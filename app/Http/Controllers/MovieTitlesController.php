<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\MovieTitleRequest;

/**
 * Class MovieTitlesController
 */
class MovieTitlesController extends Controller
{
    /**
     * Get Details about Tv show for given title.
     *
     * @param MovieTitleRequest $movieTitleRequest
     */
    public function getTvShowByTitle(MovieTitleRequest $movieTitleRequest)
    {
        $movieTitleRequest->validated();
    }
}
