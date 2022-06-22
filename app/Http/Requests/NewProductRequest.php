<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON:
use Illuminate\Http\Exceptions\HttpResponseException; //
use Illuminate\Contracts\Validation\Validator;  //
use Symfony\Component\HttpFoundation\Response;  //

class NewProductRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|max:25',
            'subCatId' => 'required',
            'descShort' => 'required|max:100',
            'image' => 'file|mimes:jpeg,png,gif|max:1024',
            'price' => 'required|numeric|min:0',
            'discountPerc' => 'required|integer|min:0|max:100',
            'descLong' => 'required|max:2500'
        ];
    }


    /**
     * Override: response in formato JSON: dobbiamo dire al nostro validatore che non deve rispondere con la classica risposta http, ma deve utilizzare l'interazione ajax
     * metodo che qualunque sottoclasse di form request utilizza per la generazione della risposta la termine del processo di validazione se non va a buon fine
     * dobbiamo ora ottenere una risposta di tipo json
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY)); //la costante predefinita in Laravel HTTP_... co rrisponde al msg di errore 442. la sintassi permette di generare un messaggio di errore di tipo 442
        //produciamo in risposta add una richiesta ajax di validazione che non va a buon fine una risposta di errore che inietta gli errori del processo di validazione all'interno di una risposta che viene inviata dal server al client in un messsaggio di errore 442
        //questa risposta viene strutturata in un messaggio di tipo json

    }

}
