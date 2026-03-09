<?php

namespace App\Repositories;

use App\Models\Comic;

class ComicRepository
{
    protected $model;
    /**
     * Create a new class instance.
     */
    public function __construct(Comic $model)
    {
        $this->model = $model;
    }

    public function all($limit = 10)
    {
        return $this->model->orderBy('updated_at', 'desc')->paginate($limit);
    }

    public function popular($limit = 10)
    {
        return $this->model->where('is_popular', true)->orderBy('total_views', 'desc')->paginate($limit);
    }

    public function comicNew($limit = 10)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($limit);
    }

    public function findBySlug($slug)
    {
        return $this->model->with(['tags', 'chapters'])->where('slug', $slug)->first();
    }
}
