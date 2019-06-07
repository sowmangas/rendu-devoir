@extends('admin.home.index')

@section('homeContent')
    <register-component url="{{ route('register') }}"></register-component>
@stop

@section('js')@stop
