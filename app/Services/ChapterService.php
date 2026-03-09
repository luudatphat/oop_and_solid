<?php

namespace App\Services;

use App\Repositories\ChapterImageRepository;
use App\Repositories\ComicRepository;

class ChapterService
{
    protected $comicRepository;
    protected $chapterImageRepository;

    public function __construct(
        ComicRepository $comicRepository,
        ChapterImageRepository $chapterImageRepository
    ) {
        $this->comicRepository = $comicRepository;
        $this->chapterImageRepository = $chapterImageRepository;
    }

    public function index($slug, $chapterId)
    {
        $response = [
            'success' => false,
            'data' => [],
            'message' => 'Comic failed'
        ];

        try {
            $comic = $this->comicRepository->findBySlug($slug);
            if (!$comic) {
                $response['message'] = 'Comic not found';
                return $response;
            }

            $data = $this->chapterImageRepository->index($chapterId);
            if (!$data) {
                $response['message'] = 'Chapter not found';
                return $response;
            }

            return [
                'success' => true,
                'data' => $data,
                'message' => 'Chapter success'
            ];
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());
            return $response;
        }
    }
}
