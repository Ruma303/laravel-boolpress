<?php

namespace App\Http\Controllers\API;

use App\Mail\NewLeadToLead;
use App\Mail\NewLeadToAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // Validazione dati
        $validations = [
            'name'          => 'string|required|max:100',
            'email'         => 'email|required|max:100',
            'newsletter'    => 'boolean',
            'message'       => 'text|required',
        ];

        $formData = $request->all();
        $validator = Validator::make($formData, $validations);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->errors(),
            ]);
        }

        // Salvare dati nel database
        $lead = new Lead;
        $lead->name         = $formData['name'];
        $lead->email        = $formData['email'];
        $lead->newsletter   = $formData['newsletter'];
        $lead->message      = $formData['message'];
        $lead->save();

        // Inviare mail all'amministratore
        Mail::to('admin@boolpress.com')->send(new NewLeadToAdmin($formData));

        // Inviare mail all'utente
        Mail::to($formData['email'])->send(new NewLeadToLead($formData));

        // Rispondere alla richiesta con un json
        return response()->json([
            'success' => true,
        ]);
    }
}

