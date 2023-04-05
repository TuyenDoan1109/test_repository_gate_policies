<?php

namespace App\Http\Requests\Api\Category;

use App\Http\Requests\Api\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('App\Models\Category')->where(function ($query) {
                    $query->where('deleted_at', null);
                })
            ],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Chưa nhập tên',
            'name.unique' => 'Tên ko dc trùng nhau',
        ];
    }
}
