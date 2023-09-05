<?php declare(strict_types=1);

namespace Addons\Plugins\Skeleton\Requests;

use App\Http\Requests\FormRequest;
use Lang;

class SettingsRequest extends FormRequest
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
     * @return mixed[]
     */
    public function rules()
    {
        return [
            'setting' => ['required', 'alpha_num'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string,string>
     */
    public function messages()
    {
        return [
            'setting.alpha_num' => Lang::get('Plugins#Skeleton::lang.setting_alpha_num'),
        ];
    }
}
