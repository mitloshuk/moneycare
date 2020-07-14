<?php

namespace MoneyCare\Exceptions;

use MoneyCare\Models\Model;
use Throwable;
use ReflectionClass;
use ReflectionException;

/**
 * Exception required model field
 *
 * Class ModelRequiredFieldException
 *
 * @package MoneyCare\Exceptions
 */
class ModelRequiredFieldException extends MoneyCareException
{
    /**
     * ModelRequiredFieldException constructor.
     *
     * @param string         $field
     * @param Model          $model
     * @param int            $code
     * @param Throwable|null $previous
     *
     * @throws ReflectionException
     */
    public function __construct(string $field, Model $model, $code = 0, Throwable $previous = null)
    {
        $modelName = (new ReflectionClass($model))->getShortName();

        parent::__construct("`$modelName` field `$field` is required", $code, $previous);
    }
}