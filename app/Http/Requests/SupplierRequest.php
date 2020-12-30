<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
      if(isset($this->id)){
        return [
            'name'=>'required',
            'mobile'=> 'required|min:11|max:11|unique:suppliers,mobile,'.$this->id,
            'address'=>'required'
        ];
      }
    
    }

}
