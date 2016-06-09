<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eureka\Component\Error;

/**
 * Class to handle error and transfort it into exceptions.
 *
 * @author Romain Cottard
 * @version 2.1.0
 */
class ErrorHandler
{
    /**
     * Define Error Handler
     *
     * @param    string $class     Class Name.
     * @param    string $method    Class method.
     * @param    string $namespace Class Namespace.
     * @return   callback  Previous exception handler.
     */
    public static function register($class = 'ErrorHandler', $method = 'handler', $namespace = 'Eureka\Component\Error')
    {
        $handler = $namespace . '\\' . $class . '::' . $method;

        set_error_handler($handler);
    }

    /**
     * Error handler. Throw new Eureka ErrorException
     *
     * @param    integer $severity Severity code Error.
     * @param    string  $message  Error message.
     * @param    string  $file     File name for Error.
     * @param    integer $line     File line for Error.
     * @return   void
     * @throws   ErrorException
     */
    public static function handler($severity, $message, $file, $line)
    {
        throw new ErrorException($message, 0, $severity, $file, $line);
    }

    /**
     * Restore previous Error handler.
     *
     * @return   boolean
     */
    public static function restore()
    {
        return restore_error_handler();
    }

}