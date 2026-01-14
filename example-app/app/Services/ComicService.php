<?php

namespace App\Services;

use App\Repositories\ComicRepository;

class ComicService
{
    protected $comicRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(ComicRepository $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    public function index()
    {
        $response = [
            'success' => false,
            'data' => [],
            'message' => 'Comic failed'
        ];

        try {
            $data = [
                'comics' => $this->comicRepository->all(),
                'popular_comics' => $this->comicRepository->popular(),
                'new_comics' => $this->comicRepository->comicNew(),
            ];

            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Comic success'
            ];

            return $response;
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());
            return $response;
        }
    }

    public function show($slug)
    {
        $response = [
            'success' => false,
            'data' => [],
            'message' => 'Comic failed'
        ];

        try {
            $data = $this->comicRepository->findBySlug($slug);

            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Comic success'
            ];

            return $response;
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());
            return $response;
        }
    }
}
