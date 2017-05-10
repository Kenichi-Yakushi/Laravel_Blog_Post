<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\PostRequest;

class PostRequest extends FormRequest
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
      // 'title' => 'bail|required|unique:posts|max:255',
      // 'body' => 'required',
      ];
    }

    // /**
    //  * {@inheritdoc}
    //  */
    // protected function formatErrors(Validator $validator)
    // {
    //     return $validator->errors()->all();
    // }

    // /**
    //  * 定義済みバリデーションルールのエラーメッセージ取得
    //  *
    //  * @return array
    //  */
    // public function messages()
    // {
    //     return [
    //         'title.required' => 'A title is required',
    //         'body.required'  => '本文を入力してください',
    //     ];
    // }

}
