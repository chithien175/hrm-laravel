<?php

namespace Botble\Media\Http\Requests;

use Botble\Support\Http\Requests\Request;

class MediaFolderRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Sang Nguyen
     */
    public function rules()
    {
        return [
            'name' => 'required|regex:/^[\pL\s\ \_\-0-9]+$/u'
        ];
    }
}
