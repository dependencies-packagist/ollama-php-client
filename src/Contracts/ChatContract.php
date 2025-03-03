<?php

namespace Ollama\Contracts;

use Ollama\Responses\Chat\ChatResponse;
use Ollama\Responses\StreamResponse;

interface ChatContract
{

    /**
     * @param array $parameters
     * @return ChatResponse
     */
    public function create(array $parameters): ChatResponse;

    /**
     * @param array $parameters
     * @return StreamResponse
     */
    public function createStreamed(array $parameters): StreamResponse;
}
