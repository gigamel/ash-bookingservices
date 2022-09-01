<?php

namespace ASh\Http;

class ClientMessage
{
    public const
        METHOD_GET = 'GET',
        METHOD_POST = 'POST'
    ;

    /** @var array */
    private $headers;

    public function __construct()
    {
        $this->parseHttpHeaders();
    }

    /**
     * @return void
     */
    private function parseHttpHeaders(): void
    {
        if (!empty($this->headers)) {
            return;
        }

        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) <> 'HTTP_') {
                continue;
            }

            $this->headers[ucwords(substr($key, 0, 5), '-')] = $value;
        }
    }
}
