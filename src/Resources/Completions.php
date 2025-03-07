<?php

namespace Ollama\Resources;

use Ollama\Contracts\CompletionsContract;
use Ollama\OllamaClient;
use Ollama\Responses\Completions\CompletionResponse;
use Ollama\Responses\StreamResponse;

final class Completions implements CompletionsContract
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
     * @return CompletionResponse
     */
    public function create(array $parameters): CompletionResponse
    {
        $response = $this->ollamaClient->post('generate', $parameters, false);
        return CompletionResponse::from($response);
    }

    /**
     * @param array $parameters
     * @return StreamResponse
     */
    public function createStreamed(array $parameters): StreamResponse
    {
        $response = $this->ollamaClient->post('generate', $parameters, true);
        return new StreamResponse(CompletionResponse::class, $response);
    }
}
