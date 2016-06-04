<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tag'=>'required|unique:tags,tag',//必须，验证字段必须唯一，tags表的tag字段唯一
            'title'=>'required',
            'subtitle'=>'required',
            'layout'=>'required'
        ];
    }
}
