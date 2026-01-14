<?php

namespace App\Http\Controllers;

use App\Services\ChapterService;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    protected $chapterService;

    public function __construct(ChapterService $chapterService)
    {
        $this->chapterService = $chapterService;
    }
    public function index($slug, $chapterId)
    {
        $response = $this->chapterService->index($slug, $chapterId);
        return response()->json($response);
    }
}
