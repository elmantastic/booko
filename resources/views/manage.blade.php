@extends('admin')

@section('sidebar')
    @livewire('template.sidebar')
@endsection

@section('content')
<div class="container fixed-right">
    @livewire('manage.product')
</div>
@endsection