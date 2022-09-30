<?php

namespace App\Exceptions;

use LogicException;

/**
 * Class UndefinedStatusException
 *
 * @package App\Exceptions
 */
class UndefinedStatusException extends LogicException
{
    /**
     * @param string $status
     *
     * @return static
     */
    public static function fromStatus(string $status): self
    {
        return new self(sprintf('Undefined status called: "%s', $status));
    }
}
