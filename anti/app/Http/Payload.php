<?php

namespace App\Http;

/**
 * Class Payload
 *
 * @package App\Http
 */
class Payload
{
    public const SUCCESS = 'SUCCESS';
    public const FAILED = 'FAILED';
    public const UNAUTHORIZED = 'UNAUTHORIZED';
    public const UNAUTHENTICATED = 'UNAUTHENTICATED';
    public const INITIALIZED = 'INITIALIZED';
    public const CREATED = 'CREATED';
    public const FOUND = 'FOUND';
    public const UPDATED = 'UPDATED';
    public const DELETED = 'DELETED';

    private string $status;

    /**
     * @var mixed
     */
    private $output;

    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param mixed $output
     */
    public function setOutput($output): self
    {
        $this->output = $output;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }
}
