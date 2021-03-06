<?php

namespace Sahakavatar\Framework\Http\Requests;

use Sahakavatar\Cms\Http\Requests\Request;

class ChangeVersionRequest extends Request
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
        if ($this->isMethod('POST')) {
            return [
                'id' => 'required|exists:versions'
            ];
        }
        return [];
    }
}