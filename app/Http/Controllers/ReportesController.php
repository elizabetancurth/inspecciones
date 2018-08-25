<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidationRequests;

use Session;
use App\Formato;
use App\Extintor;

class ReportesController extends Controller
{
    public function reporte_extintores()
    {
        $formato = Formato::findOrFail(1);
        $extintores = Extintor::where('estado', 'Activo')->get();
        return view('reportes.extintores', ['formato' => $formato, 'extintores' => $extintores]);
    }
}
