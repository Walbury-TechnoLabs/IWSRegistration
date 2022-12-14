<?php

namespace App\Http\Requests;

use App\Portfolio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePortfolioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('portfolio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'unique:portfolios,name,' . request()->route('portfolio')->id,
            ],
        ];
    }
}
