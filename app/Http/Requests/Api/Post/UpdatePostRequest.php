<?php

namespace App\Http\Requests\Api\Post;

use App\Http\Requests\Api\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class UpdatePostRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name' => [
                'required',
                Rule::unique('App\Models\Post')->ignore($id, 'id')->where(function ($query) {
                    $query->where('deleted_at', NULL);
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
