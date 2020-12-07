@extends('admin')

<div class="container-large row">
        <div class="col-2">
            @section('sidebar')
                @livewire('template.sidebar')
            @endsection

        </div>
        <div class="col-md-auto">
            @section('content')
            <div class="row p-0">
                <div class="container-fluid">
                <header class="page-header">
                        <h2>Products</h2>
                    </header>
                <div class="container-fluid">
                    @livewire('manage.product')
                </div>
            </div>
            @endsection
        </div>
</div>

