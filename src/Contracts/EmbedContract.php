<?php

namespace Ollama\Contracts;

use Ollama\Responses\Embed\EmbedResponse;

interface EmbedContract
{
    /**
     * @param array $parameters
     * @return EmbedResponse
     */
    public function create(array $parameters): EmbedResponse;
}
