<?php

namespace Ollama\Responses\Chat;

use Ollama\Contracts\ResponseContract;

class ChatMessageToolCallResponse implements ResponseContract
{
    /**
     * @param ChatMessageToolCallFunctionResponse $function
     */
    private function __construct(
        public readonly ChatMessageToolCallFunctionResponse $function,
    )
    {
    }

    /**
     * @param array $attributes
     * @return ChatMessageToolCallResponse
     */
    public static function from(array $attributes): ChatMessageToolCallResponse
    {
        return new self(
            function: ChatMessageToolCallFunctionResponse::from($attributes['function']),
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'function' => $this->function->toArray(),
        ];
    }
}
