<?php
declare(strict_types = 1);

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractRequest extends FormRequest
{
    protected $queryParametersToValidate = [];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    public function all($keys = null)
    {
        $data = parent::all();

        foreach ($this->queryParametersToValidate as $validationDataKey => $queryParameter) {
            $data[$validationDataKey] = $this->query($queryParameter);
        }

        return $data;
    }

}