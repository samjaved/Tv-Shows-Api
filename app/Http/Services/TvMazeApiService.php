<?php
declare(strict_types = 1);

namespace App\Http\Services;

use App\Exceptions\ExceptionBadRequest;
use GuzzleHttp\Client;

class TvMazeApiService
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $apiUrl;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiUrl = env('TV_MAZE_API_URL');
    }

    /**
     * Return request headers
     */
    private function getHeaders(): array
    {
        return [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
        ];
    }

    /**
     * @param string $title
     *
     * @throws ExceptionBadRequest
     * @return array
     */
    public function getShowByTitle(string $title): array
    {
        $apiResponse = $this->requestShowsByTitleFromTvMazeApi($title);

        return $this->filterTvMazeApiResponse($apiResponse, $title);
    }

    /**
     * @param string $title
     *
     * @throws ExceptionBadRequest
     * @return mixed
     */
    private function requestShowsByTitleFromTvMazeApi(string $title): array
    {
        $singleSearchResponse = null;
        try {
            $singleSearchResponse = $this->client->get($this->apiUrl.'/singlesearch/shows?q='.$title,
                    ['headers' => $this->getHeaders()]
            );
        } catch (\Exception $exception) {
            throw new ExceptionBadRequest($exception->getMessage());
        }

        return json_decode($singleSearchResponse->getBody()->getContents(), true);
    }

    /**
     * @param array $apiResponse
     * @param string $title
     *
     * @return array
     */
    private function filterTvMazeApiResponse(array $apiResponse, string $title): array
    {
        $response = [];
        if (strcasecmp($title, $apiResponse['name']) === 0) {
            $response = $apiResponse;
        }

        return $response;
    }
}