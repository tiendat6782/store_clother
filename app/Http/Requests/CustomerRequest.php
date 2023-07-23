<?php

namespace App\Http\Requests;

use App\Rules\VietnamesePhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = [];
        $currentAction = $this->route()->getActionMethod();

        switch($this->method()):
            case 'POST':
                switch($currentAction):
                    case 'addCustomer':
                        $rule = [
                            "name"=>"required",
                            "email"=>"required|email|unique:customer",
                            "telephone"=>['required', new VietnamesePhoneNumber],
                        ];
                        break;
                endswitch;
        endswitch;

        return $rule;
    }
}
