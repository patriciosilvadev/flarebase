<?php

namespace Modules\Core\Requests\helpdesk;

use App\Http\Requests\Request;

/**
 * Sys_userRequest.
 *
 * @author  Ladybird <info@ladybirdweb.com>
 */
class Sys_userRequest extends Request
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

            'email'     => 'required|unique:users,email',
            'full_name' => 'required',
                // 'phone' => 'size:10',
        ];
    }
}
