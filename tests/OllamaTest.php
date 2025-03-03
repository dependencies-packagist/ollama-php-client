<?php

use Ollama\Ollama;
use Ollama\Resources\Blobs;
use Ollama\Resources\Chat;
use Ollama\Resources\Completions;
use Ollama\Resources\Embed;
use Ollama\Resources\Models;

it('may create a client', function () {
    $client = Ollama::client();

    expect($client)->toBeInstanceOf(Ollama::class);
});

it('may create a client with custom host', function () {
    $client = Ollama::client('http://localhost:11435');

    expect($client)->toBeInstanceOf(Ollama::class);
});

it('has blobs', function () {
    $client = Ollama::client();

    expect($client->blobs())->toBeInstanceOf(Blobs::class);
});

it('has chat', function () {
    $client = Ollama::client();

    expect($client->chat())->toBeInstanceOf(Chat::class);
});

it('has completions', function () {
    $client = Ollama::client();

    expect($client->completions())->toBeInstanceOf(Completions::class);
});

it('has embed', function () {
    $client = Ollama::client();

    expect($client->embed())->toBeInstanceOf(Embed::class);
});

it('has models', function () {
    $client = Ollama::client();

    expect($client->models())->toBeInstanceOf(Models::class);
});

it('can tell when ollama is running', function () {
   $client = Ollama::client();

   expect($client->isRunning())->toBeTrue();
});

it('can tell when ollama is not running', function () {
   $client = Ollama::client('http://localhost:9999/not_ollama');

   expect($client->isRunning())->toBeFalse();
});
