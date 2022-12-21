<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBeneficiaireRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nom'       => 'required|string|min:2|max:20',
            'prenoms'   => 'required|string|min:2|max:50',
            'telephone' => 'required|string|unique:users',
            //'email'     => 'required|email|unique:users,email',
            'antecedent'    =>'required|string|min:2|max:20',
            'sexe'          =>'required|string|min:1|max:1',
            //'poids'         =>'required|numeric|min:2|max:200',
            //'taille'        =>'required|numeric|min:2|max:210',
            'groupe'        =>'required|string|min:2|max:20',
            'vaccination'   =>'required|string|min:2|max:50',
            'allergie'      =>'required|string|min:2|max:20',
            'maladie'       =>'required|string|min:2|max:50',
            'pays'          =>'required|string|min:2|max:20',
            'region'        =>'required|string|min:2|max:20',
            'ville'         =>'required|string|min:2|max:20',
            'village'       =>'required|string|min:2|max:20',
        ];
    }

    public function messages()
    {
        return [
            'nom.required'          => 'Veuillez saisir le nom ',
            'nom.max'                => 'nom trop long',
            'prenoms.required'      => 'Veuillez saisir le prenom ',
            'telephone.required'    => 'Veuillez saisir le telephone ',

            'antecedent.required'   => 'Veuillez saisir l\'antecedent ',
            'antecedent.max'        => 'Antecedent trop long',
            'sexe.required'         => 'Veuillez choisir le genre ',
            'sexe.min'              => 'Genre trop court',
            'sexe.max'              => 'Genre trop long',
            'poids.required'        => 'Veuillez saisir le poids ',
            'poids.min'             => 'Poids trop petit',
            'poids.max'             => 'Genre trop grand',
            'taille.required'       => 'Veuillez saisir la taille ',
            'taille.min'            => 'Taille trop petit',
            'taille.max'            => 'Taille trop grand',
            'groupe.required'       => 'Veuillez saisir le groupe sanguin ',
            'groupe.max'            => 'Groupe sanguin trop long',
            'vaccination.required'  => 'Veuillez saisir la vaccination ',
            'vaccination.max'       => 'Vaccination trop long',
            'allergie.required'     => 'Veuillez saisir l\'allergie ',
            'maladie.required'      => 'Veuillez saisir la maladie ',
            'pays.required'         => 'Veuillez saisir le Pays ',
            'pays.max'              => 'Nom du Pays trop long',
            'region.required'       => 'Veuillez saisir la Region ',
            'region.max'            => 'Region du Pays trop long',
            'ville.required'        => 'Veuillez saisir la ville ',
            'ville.max'             => 'Ville du Pays trop long',
            'village.required'      => 'Veuillez saisir le village ',
            'village.max'           => 'Village du Pays trop long',
        ];
    }
}
