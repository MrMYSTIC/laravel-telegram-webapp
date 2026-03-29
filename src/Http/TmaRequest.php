<?php

declare(strict_types=1);

namespace Micromagicman\TelegramWebApp\Http;

use Illuminate\Http\Request;

class TmaRequest extends Request
{
    public function webAppInitData(): array
    {
        $header = $this->header('Authorization', '');

        $position = strripos($header, 'tma ');

        $params = [];

        if ($position !== false) {
            $header = substr($header, $position + 4);

            $initData = str_contains($header, ',')
                ? strstr($header, ',', true)
                : $header
            ;

            parse_str($initData, $params);
        }

        return $params;
    }
}
