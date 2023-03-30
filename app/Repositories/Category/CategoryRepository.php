<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Models\Category;

/**
 * Class Category.
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    public function getModel()
    {
        return Category::class;
    }

    // Hàm viết lại
    // Example chỉ lấy các items có id = 1, 2 , 3
    // public function getAll() {
    //     return $this->model->whereIn('id', [1,2,3])->get();
    // }

    public function getFirstFiveCatgory() {
        return $this->model->whereIn('id', [1,2,3,4,5])->get();
    }
}


