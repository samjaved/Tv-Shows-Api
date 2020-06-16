<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Exceptions\ExceptionBadRequest as ExceptionBadRequestAlias;
use App\Http\Requests\MovieTitleRequest;
use App\Http\Services\TvMazeApiService;
use Illuminate\Http\JsonResponse;

/**
 * Class TvMazeApiController
 */
class TvMazeApiController extends Controller
{
    /**
     * @var TvMazeApiService
     */
    private $tvMazeApiService;

    /**
     * @var string
     */
    private $objectWrapper = 'data';

    public function __construct(TvMazeApiService $tvMazeApiService)
    {
        $this->tvMazeApiService = $tvMazeApiService;
    }

    /**
     * Get Details about Tv show for given title.
     *
     * @param MovieTitleRequest $movieTitleRequest
     *
     * @throws ExceptionBadRequestAlias
     * @return JsonResponse
     */
    public function getTvShowByTitle(MovieTitleRequest $movieTitleRequest)
    {
        $movieTitleRequest->validated();
        $apiResonse = $this->tvMazeApiService->getShowsByTitle($movieTitleRequest->query('title'));

        return response()->json(
            [$this->objectWrapper => $apiResonse],
            200
        );
    }
}
