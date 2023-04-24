<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function newForm(Request $request){
        $request = $request['formData'];
        $Name = $request['name'];
        $Email = $request['email'];
        $StreetNumber = $request['street'];
        $Postcode = $request['postcode'];
        $City = $request['city'];
        $Message = $request['message'];
        $form = new Form();
        $form->Name = $Name;
        $form->Email = $Email;
        $form->StreetNumber = $StreetNumber;
        $form->Postcode = $Postcode;
        $form->City = $City;
        $form->Message = $Message;
        $saved = $form->save();
        if(!$saved){
            App::abort(500, 'Error');
        }
    }

    public function getFormData(){
        $data = Form::all();
        return response()->json($data);
    }
}
