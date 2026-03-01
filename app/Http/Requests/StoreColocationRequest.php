<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColocationRequest extends FormRequest
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
            //
            'name'=> 'string|max:200' ,
            'place' => 'string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', 
            'status' => 'required|in:active,non active'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom de la colocation est requis',
            'place.required' => 'La localisation est requise',
            'image.image' => 'Le fichier doit être une image',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg ou gif',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo',
            'status.required' => 'Le statut est requis',
            'status.in' => 'Le statut doit être actif ou inactif',
            'invite_email.*.email' => 'Chaque invitation doit être un email valide',
        ];
    }
}
