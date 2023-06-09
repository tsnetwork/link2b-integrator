@extends('adminlte::page')

@section('title_postfix', '| Clientes')

@section('content_header')
    <h1>Cadastrar Novo Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.store') }}" method="post">
                @csrf
                @include('Integrador.Tenant._partials.__form')
            </form>

        </div>
    </div>
@stop
