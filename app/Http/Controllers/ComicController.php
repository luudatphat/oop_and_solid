<?php

namespace App\Http\Controllers;

use App\Services\ComicService;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    protected $comicService;

    public function __construct(ComicService $comicService)
    {
        $this->comicService = $comicService;
    }

    public function index()
    {
        $response = $this->comicService->index();
        return response()->json($response);
    }

    public function show($slug)
    {
        $response = $this->comicService->show($slug);
        return response()->json($response);
    }
}
