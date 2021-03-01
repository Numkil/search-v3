<?php

declare(strict_types=1);

namespace CultuurNet\SearchV3;

use CultuurNet\SearchV3\Serializer\SerializerInterface;
use CultuurNet\SearchV3\ValueObjects\PagedCollection;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

final class SearchClientTest extends TestCase
{
    /**
     * @var ClientInterface | MockObject
     */
    protected $client;

    /**
     * @var SerializerInterface | MockObject
     */
    protected $serializer;

    protected $searchClient;

    public function setUp(): void
    {
        $this->client = $this->getMockBuilder(ClientInterface::class)
            ->getMock();
        $this->serializer = $this->getMockBuilder(SerializerInterface::class)
            ->getMock();
        $this->searchClient = new SearchClient($this->client, $this->serializer);
    }

    public function provideSearchQueryMock(): SearchQueryInterface
    {
        $searchQueryMock = $this->getMockBuilder(SearchQueryInterface::class)
            ->getMock();
        $searchQueryMock->expects($this->once())
            ->method('toArray')
            ->willReturn(['foo' => 'bar']);

        return $searchQueryMock;
    }

    public function provideResponseMockup(): ResponseInterface
    {
        $response = $this->getMockBuilder(ResponseInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $response->expects($this->once())
            ->method('getBody')
            ->willReturn('test response');

        return $response;
    }

    /**
     * Test the setter and getter of the search client.
     */
    public function testSetClient(): void
    {
        $client = new Client(['headers' => ['lorem' => 'ipsum']]);
        $this->searchClient->setClient($client);
        $this->assertEquals($client, $this->searchClient->getClient());
    }

    public function testSearchEventsMethod(): void
    {
        $options = array('query' => ['foo' => 'bar']);

        $searchQueryMock = $this->provideSearchQueryMock();
        $pagedCollection = new PagedCollection();
        $response = $this->provideResponseMockup();

        $this->serializer->expects($this->once())
            ->method('deserialize')
            ->with('test response')
            ->willReturn($pagedCollection);

        $this->client->expects($this->once())
            ->method('request')
            ->with('GET', 'events', $options)
            ->willReturn($response);

        $queryResult = $this->searchClient->searchEvents($searchQueryMock);
        $this->assertEquals($pagedCollection, $queryResult);
    }

    public function testSearchPlacesMethod(): void
    {
        $options = array('query' => ['foo' => 'bar']);

        $searchQueryMock = $this->provideSearchQueryMock();
        $pagedCollection = new PagedCollection();
        $response = $this->provideResponseMockup();

        $this->serializer->expects($this->once())
            ->method('deserialize')
            ->with('test response')
            ->willReturn($pagedCollection);

        $this->client->expects($this->once())
            ->method('request')
            ->with('GET', 'places', $options)
            ->willReturn($response);

        $queryResult = $this->searchClient->searchPlaces($searchQueryMock);
        $this->assertEquals($pagedCollection, $queryResult);
    }

    public function testSearchOfferMethod(): void
    {
        $options = array('query' => ['foo' => 'bar']);
        $pagedCollection = new PagedCollection();
        $searchQueryMock = $this->provideSearchQueryMock();

        $response = $this->provideResponseMockup();

        $this->serializer->expects($this->once())
            ->method('deserialize')
            ->with('test response')
            ->willReturn($pagedCollection);

        $this->client->expects($this->once())
            ->method('request')
            ->with('GET', 'offers', $options)
            ->willReturn($response);

        $queryResult = $this->searchClient->searchOffers($searchQueryMock);
        $this->assertEquals($pagedCollection, $queryResult);
    }
}
