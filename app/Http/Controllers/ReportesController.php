<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function reporte_extintores()
    {
        return view('reportes.extintores');
    }
}
