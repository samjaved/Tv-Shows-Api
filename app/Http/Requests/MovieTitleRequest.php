<?php
declare(strict_types = 1);

namespace App\Http\Requests;

use App\Exceptions\ExceptionBadRequest;
use Illuminate\Contracts\Validation\Validator;


class MovieTitleRequest extends AbstractRequest
{
    protected $queryParametersToValidate = ['title' => 'title'];

    /**
     * @return array
     */
    public function rules()
    {
      return [
          'title' => 'required|string'
      ];

    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     * @throws \Exception
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ExceptionBadRequest($validator->errors()->first());
    }
}