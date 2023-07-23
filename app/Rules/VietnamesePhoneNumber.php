<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VietnamesePhoneNumber implements Rule
{
    public function passes($attribute, $value)
    {
        // Kiểm tra xem giá trị có phải là số điện thoại Việt Nam hợp lệ hay không
        // Đây chỉ là một ví dụ đơn giản, bạn có thể mở rộng logic kiểm tra hơn nữa nếu cần thiết.
        return preg_match('/^(0|\\+?84)(9|3[2|3|4|5|6|7|8|9]|7[0|6|7|8|9]|8[1|2|3|4|5|6|8|9]|5[6|8|9])+([0-9]{7})$/', $value);
    }

    public function message()
    {
        return 'Số điện thoại phải là số điện thoại Việt Nam hợp lệ.';
    }
}

?>