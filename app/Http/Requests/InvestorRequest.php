<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvestorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'phone'=>'required|numeric',
            'email'=>['required','email',Rule::unique(User::class,'email')],
            'password'=>'required|min:6|confirmed',
            'address'=>'required|string',
            'city'=>'required|string',
            'district'=>'required|string',
            'zipCode'=>'required|numeric',
            'image'=>['required', 'image','mimes:jpg,png,jpeg,gif,svg', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000','max:2048'] ,
        ];
    }
}
