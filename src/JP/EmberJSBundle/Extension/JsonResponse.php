<?php

namespace JP\EmberJSBundle\Extension;

use Symfony\Component\HttpFoundation\Response;

/**
 * JsonResponse
 *
 */
class JsonResponse extends Response
{
    /**
     * Builds a well formatted json response
     *
     * @param array $data
     */
    public function __construct($data = null, $code = 200, $message = null, $callback = null)
    {
        parent::__construct('{"code": "' . $code . '", "message": "' . $message . '", "data": ' . ($data === null ? 'null' : $data) . '}');
    }
}
