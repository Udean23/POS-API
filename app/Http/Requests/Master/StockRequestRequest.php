<?php

namespace App\Http\Requests\Master;

use App\Helpers\BaseResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class StockRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'warehouse_id' => 'required|exists:warehouses,id',
            'product_detail' => 'sometimes|array',
            "product_detail.*.product_detail_id" => "nullable",
            "product_detail.*.requested_stock" => "nullable",
        ];
    }

    public function messages(): array
    {
        return [
            'warehouse_id.required' => 'Warehouse tidak boleh kosong!',
            'warehouse_id.exists' => 'Warehouse tidak ada!',
            'product_detail.array' => 'Data produk tidak valid!',
            // 'product_detail.*.product_detail_id.unique' => 'Produk tidak ada!',
            // 'product_detail.*.requested_stock.required' => 'Stock tidak boleh kosong!',
        ];
    }

    public function prepareForValidation()
    {
        // if(!$this->user_id) $this->merge(["user_id" => []]);
    }

    public function failedValidation(Validator $validator): JsonResponse
    {
        throw new HttpResponseException(BaseResponse::Error("Kesalahan dalam validasi", $validator->errors()));
    }
}
