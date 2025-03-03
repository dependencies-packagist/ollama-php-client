<?php

namespace Ollama\Contracts;

use Ollama\Responses\Completions\CompletionResponse;
use Ollama\Responses\StreamResponse;

interface CompletionsContract
{
    /**
     * Create a new completion.
     *
     * @param array $parameters
     * @return CompletionResponse
     */
    public function create(array $parameters): CompletionResponse;

    /**
     * Create a new completion and stream the response.
     *
     * @param array $parameters
     *
     * @return StreamResponse
     */
    public function createStreamed(array $parameters): StreamResponse;
}
