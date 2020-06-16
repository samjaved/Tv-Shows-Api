<?php


namespace Tests\Integration;

use Tests\TestCase;

class TvMazeApiControllerTest extends TestCase
{
    private $route = 'api';

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRequestValidation()
    {
        $response = $this->call('GET', $this->route);

        $response->assertStatus(400);
        $result = $response->getData(true);
        $this->assertSame('The title field is required.', $result['error']['message']);
    }

    /**
     * @test
     */
    public function itTestEmptyDataObjectIfShowWithGivenTitleContainsTypo()
    {
        $response = $this->call('GET', $this->route.'/?title=dead');

        $result = $response->getData(true);
        $response->assertStatus(200);
        $this->assertEmpty($result['data']);

    }

    /**
     * @test
     * @dataProvider TitlesDataProvider
     *
     * @param string $title
     *
     */
    public function itTestSuccessFullyReturnedResponseByNonCaseSensitiveTitle(string $title)
    {
        $response = $this->call('GET', $this->route.'/?title='.$title);

        $response->assertStatus(200);;
        $result = $response->getData(true);
        $this->assertSame('Deadwood', $result['data']['name']);
    }

    /**
     * @return array
     */
    public function TitlesDataProvider(): array
    {
        return [
                'lowerCastTitle' => [
                        'deadwood',
                ],
                'uperCaseTitle' => [
                        'DEADWOOD',
                ],
        ];
    }
}