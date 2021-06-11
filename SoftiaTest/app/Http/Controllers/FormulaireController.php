<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Convention;
use App\Models\Attestation;
use Illuminate\Support\Facades\DB;

class FormulaireController extends Controller
{
    public function showForm()
    {
        $etudiant = new Etudiant();
        $convention = new Convention();
        $convention = new Convention();

        $etudiants = $etudiant->all();
        // $conventionEtudiant = $convention->where("etudiant", $etudiants);

        return view("form", ['etudiants' =>  $etudiants]);
    }

    public function getData(Request $request)
    {
        $convention = new Convention();
        $etudiant = new Etudiant();

        // $getEtudiant = $etudiant->get()->where('idEtudiant', $request->id)->first();
        // $etudiantConventionId = $getEtudiant->convention;
        // $getConvention = $convention->get()->where('idConvention', $etudiantConventionId)->first();
        $data = $etudiant = DB::table('etudiants')
        ->join('conventions', 'etudiants.convention', '=', 'conventions.idConvention')
        ->select('etudiants.nom as nomEtudiant', 'etudiants.*', 'conventions.*')
        ->where('etudiants.idEtudiant', $request->id)
        ->get()
        ->first();
        
        return response()->json($data);
    }

    public function submitForm(Request $request)
    {
        $attestation = new Attestation();
        if ($request->message == null || $request->etudiant == null){
            return response()->json("Failed, message empty or can't find student", 500);
        }
        $attestation->etudiant = $request->etudiant;
        $attestation->convention = $request->idConvention;
        $attestation->message = $request->message;

        $attestation->save();

        return response()->json("Created successfully", 201);
    }

    public function attestations()
    {
        $attestation = new Attestation();
        $attestations = $attestation->all();

        return response()->json($attestations, 200);
    }

    public function attestationsEtudiant($id)
    {
        $attestation = new Attestation();
        $attestations = $attestation->all()->where('etudiant', $id);

        if(count($attestations) == 0){
            return response()->json("Aucunes attestations trouvés", 404);
        }

        return response()->json($attestations, 200);
    }

    public function etudiants()
    {
        $etudiant = new Etudiant();
        $etudiants = $etudiant->all();

        return response()->json($etudiants, 200);
    }

    public function etudiant($id)
    {
        $etudiant = new Etudiant();
        $getEtudiant = $etudiant->all()->where('idEtudiant', $id);

        if(count($getEtudiant) == 0){
            return response()->json("Etudiant introuvable", 404);
        }

        return response()->json($getEtudiant, 200);
    }

    public function conventions()
    {
        $convention = new Convention();
        $conventions = $convention->all();

        return response()->json($conventions, 200);
    }

    public function convention($id)
    {
        $convention = new Convention();
        $getConvention = $convention->all()->where('idConvention', $id);
        if(count($getConvention) == 0){
            return response()->json("Convention introuvable", 404);
        }

        return response()->json($getConvention, 200);
    }

    public function conventionEtudiants($id)
    {
        $etudiant = new Etudiant();
        $getEtudiant = $etudiant->all()->where('convention', $id);

        if(count($getEtudiant) == 0){
            return response()->json("Etudiants introuvable", 404);
        }

        return response()->json($getEtudiant, 200);
    }
}
