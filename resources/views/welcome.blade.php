@extends('layouts.app')

@section('headerTitle', 'Página Principal')

@section('content')
                                                
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>                                                
    
@endsection