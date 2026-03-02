<?php

namespace Omnify\Core\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationUserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'role_id' => ['required', 'string', 'exists:roles,id'],
            'console_branch_id' => ['nullable', 'string'],
        ];
    }
}
