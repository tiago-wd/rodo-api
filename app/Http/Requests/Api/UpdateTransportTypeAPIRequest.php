<?php

namespace App\Http\Requests\Api;

use App\Models\TransportType;
use InfyOm\Generator\Request\APIRequest;

class UpdateTransportTypeAPIRequest extends APIRequest
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
        $rules = TransportType::$rules;
        
        return $rules;
    }
}
