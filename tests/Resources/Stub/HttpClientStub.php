<?php declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Resources\Stub;

use RichCongress\WebTestBundle\OverrideService\AbstractOverrideService;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\ResponseStreamInterface;

final class HttpClientStub extends AbstractOverrideService implements HttpClientInterface
{
    /** @var string|array<string> */
    public static $overridenServices = HttpClientInterface::class;

    private $requests = [
        'GET https://www.googleapis.com/webfonts/v1/webfonts?key=' => 'googleApiInvalidKey',
    ];

    public function setRequest(string $key, string $function): void
    {
        $this->requests[$key] = $function;
    }

    public function withOptions(array $options): self
    {
        return clone $this;
    }

    public function request(string $method, string $url, array $options = []): ResponseInterface
    {
        $routeKey = $method . ' ' . $url;
        $routeFunction = $this->requests[$routeKey] ?? null;

        if ($routeFunction !== null) {
            $callback = [$this, $routeFunction];
            return $callback($method, $url, $options);
        }

        return MockResponse::fromRequest($method, $url, $options, new MockResponse());
    }

    public function stream($responses, float $timeout = null): ResponseStreamInterface
    {
        return $this->innerService->stream($responses, $timeout);
    }

    protected function googleApiInvalidKey(string $method, string $url, array $options): ResponseInterface
    {
        return MockResponse::fromRequest(
            $method,
            $url,
            $options,
            new MockResponse('test', ['http_code' => Response::HTTP_FORBIDDEN])
        );
    }

    protected function googleApiInvalidResponse(string $method, string $url, array $options): ResponseInterface
    {
        return MockResponse::fromRequest(
            $method,
            $url,
            $options,
            new MockResponse('test', ['http_code' => Response::HTTP_BAD_REQUEST])
        );
    }

    protected function googleApi(string $method, string $url, array $options): ResponseInterface
    {
        $body = [
            'items' => [
                [
                    'family' => 'My font 1',
                ],
                [
                    'family' => 'My font 2',
                ],
                [
                    'family' => 'My font 3',
                ],
            ]
        ];

        return MockResponse::fromRequest(
            $method,
            $url,
            $options,
            new MockResponse(\json_encode($body))
        );
    }
}
