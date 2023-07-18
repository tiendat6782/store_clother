<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class ProductRequest extends FormRequest
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
        $currentAction = $this->route()->getActionMethod(); //lay ra phuong thuc dang hoat dong
        // dd($currentAction);
        switch($this->method()):
            case 'POST':
                switch($currentAction):
                    case 'addProduct': //neu lay dc phuong thuc addProduct dang hoat dong
                        $rule = [
                            "name"=>"required",
                            "desc"=>"required",
                            "size"=>"required",
                            "color"=>"required",

                        ];
                        break;
                    endswitch;
                endswitch;
            return $rule;
    }
    public function messages(){
        return[
            "name.required"=>'Nhập tên đi',
            "desc.required"=>'Mô tả chưa viết kìa',
            "size.required"=>'Không có size mua kiểu gì',
            "color.required"=>'Màu k có khách chọn sao',
        ];
    }
}
