<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\AsciiService;
use App\Http\Requests\AsciiRequest;
use App\Http\Controllers\Controller;

class AsciiController extends Controller
{
    public function ascii_converter(AsciiRequest $request)
    {
        if ($request->validated()) {
            $result = AsciiService::ascii_converter($request->ascii);

            return [
                'ascii' => $result
            ];
        }
    }
}
