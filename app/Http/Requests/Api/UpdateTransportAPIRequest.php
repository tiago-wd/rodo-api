<?php

namespace App\Http\Requests\Api;

use App\Models\Transport;
use InfyOm\Generator\Request\APIRequest;

class UpdateTransportAPIRequest extends APIRequest
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
        $rules = Transport::$rules;
        
        return $rules;
    }
}
