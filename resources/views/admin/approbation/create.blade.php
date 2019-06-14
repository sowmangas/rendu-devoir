@extends('admin.home.index')

@section('homeContent')
    <h1>Formulaire d'approbation</h1>
    <approbation-modif-note-component url="{{ route('admin.approb.create') }}">
    </approbation-modif-note-component>

@stop

@section('js')
@stop
