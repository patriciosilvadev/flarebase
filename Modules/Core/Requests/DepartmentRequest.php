<?php

namespace Modules\Core\Requests;

use App\Http\Requests\Request;

/**
 * DepartmentRequest.
 *
 * @author  Ladybird <info@ladybirdweb.com>
 */
class DepartmentRequest extends Request
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
            'name' => 'required|unique:department',
                // 'outgoing_email' => 'required',
                // 'auto_response_email' => 'required',
                // 'group_id' => 'required',
        ];
    }
}
