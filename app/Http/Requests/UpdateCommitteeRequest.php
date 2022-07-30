<?php

namespace App\Http\Requests;

use App\Committee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCommitteeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('committee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'           => [
                'required',
                'unique:committees,name,' . request()->route('committee')->id,
            ],
            'portfolio_id' => [
                'required',
                'integer',
            ],
            'disciplines.*'  => [
                'integer',
            ],
            'disciplines'    => [
                'array',
            ],
        ];
    }
}
