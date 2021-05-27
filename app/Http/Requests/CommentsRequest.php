<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
{

    public function validationData()
    {
        $input = parent::all();
        $input['text_comment'] = strip_tags($input['text_comment']);
        return $input;
    }

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
            'text_comment'  => 'min:3|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'text_comment.min'  => 'Минимальное сообщение в комментарии - 3 символа',
            'text_comment.max'  => 'Максимальная длина комментария - 1000 символов',
        ];
    }
}
