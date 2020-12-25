<?php

namespace App\Http\Controllers;

use App\Http\Resources\Fallback;
use Illuminate\Http\Request;

class FallbackController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return new Fallback([]);
    }
}
