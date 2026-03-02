<?php

namespace Omnify\Core\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationUserStoreRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255'],
            'name' => ['required_without:existing_user', 'nullable', 'string', 'max:255'],
            'role_id' => ['required', 'string', 'exists:roles,id'],
            'console_branch_id' => ['nullable', 'string'],
        ];
    }
}
