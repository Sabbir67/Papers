<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    public function __invoke(Request $request):JsonResponse
    {
        return new JsonResponse(
            data:Journal::search(
                query:trim($request->get('search')) ?? '',
            )->get(),
            status:Response::HTTP_OK,
        );
    }
}
