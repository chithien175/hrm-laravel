@extends('layouts.master')

@section('style')
    {!! RvMedia::renderHeader() !!}
@endsection

@section('content')
    {!! RvMedia::renderContent() !!}
@endsection

@section('script')
    {!! RvMedia::renderFooter() !!}
@endsection