<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class ImageRepository
{
    public function getImagesPaginate(string $category, string $param): LengthAwarePaginator
    {
        $user = Auth::user();

        $query = Image::with('user')->latest();

        if (!$user || !$user->adult) {
            $query->whereAdult(false);
        }

        if ($param != '') {
            $query->whereUserId($param);
        }

        if ($category != 'all') {
            $query->whereHas('category', function ($query) use ($category) {
                $query->whereSlug($category);
            });
        }

        return $query->paginate($user->pagination ?? config('app.pagination'));
    }
}
