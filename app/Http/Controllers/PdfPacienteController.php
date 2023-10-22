<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use PDF;

class PdfPacienteController extends Controller
{
    public function index(Request $request)
	{
	    $pacientes = Paciente::where('status' , true)->orderBy('primeiro_nome' , 'asc')->get();

	    $data = [
	            'title' => 'Lista de Contatos dos pacientes',
	            'date' => 'Atualizado em ' . date('d/m/Y'),
	            'pacientes' => $pacientes
	    ];
      // dd($data);


            $pdf = PDF::loadView('dashboard.pdf.index',$data);
	        return $pdf->download('chamadas_pacientes.pdf');





	}
    public function chamadas(Request $request)
	{
	    $pacientes = Paciente::where('status' , true)->orderBy('data_do_acolhimento' , 'asc')->get();

	    $data = [
	            'title' => 'Lista de Chamada dos pacientes',
	            'date' => 'Atualizado em ' . date('d/m/Y'),
	            'pacientes' => $pacientes
	    ];
      // dd($data);


            $pdf = PDF::loadView('dashboard.pdf.chamadas',$data);
	        return $pdf->download('chamadas_pacientes.pdf');





	}
}
