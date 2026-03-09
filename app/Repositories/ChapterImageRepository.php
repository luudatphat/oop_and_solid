<?php

namespace App\Repositories;

use App\Models\ChapterImage;

class ChapterImageRepository
{
    protected $model;

    public function __construct(ChapterImage $model)
    {
        $this->model = $model;
    }

    public function index($chapterId)
    {
        return $this->model->where('chapter_id', $chapterId)->orderBy('order', 'asc')->get();
    }
}
