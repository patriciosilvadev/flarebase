<?php

namespace Modules\Core\Requests\helpdesk;

use App\Http\Requests\Request;

/**
 * DiagnoRequest.
 *
 * @author  Ladybird <info@ladybirdweb.com>
 */
class DiagnoRequest extends Request
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
            'from'    => 'required|email',
            'to'      => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }
}
