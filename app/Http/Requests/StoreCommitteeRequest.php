<?php

namespace App\Http\Requests;

use App\Committee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCommitteeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('committee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'           => [
                'required',
                'unique:committees',
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
