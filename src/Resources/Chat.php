<?php

namespace Ollama\Resources;

use Ollama\Contracts\ChatContract;
use Ollama\OllamaClient;
use Ollama\Responses\Chat\ChatResponse;
use Ollama\Responses\StreamResponse;
use InvalidArgumentException;

final class Chat implements ChatContract
{
    /**
     * @var OllamaClient
     */
    private OllamaClient $ollamaClient;

    /**
     * @param OllamaClient $ollamaClient
     */
    public function __construct(OllamaClient $ollamaClient)
    {
        $this->ollamaClient = $ollamaClient;
    }

    /**
     * @param array $parameters
     * @return ChatResponse
     */
    public function create(array $parameters): ChatResponse
    {
        $response = $this->ollamaClient->post('chat', $parameters, false);
        return ChatResponse::from($response);
    }

    /**
     * @param array $parameters
     * @return StreamResponse
     */
    public function createStreamed(array $parameters): StreamResponse
    {
        if (isset($parameters['tools'])) {
            throw new InvalidArgumentException('You cannot use tools in streamed chat messages.');
        }

        $response = $this->ollamaClient->post('chat', $parameters, true);
        return new StreamResponse(ChatResponse::class, $response);
    }
}
