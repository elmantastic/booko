@extends('admin')

<div class="container-large">
    <div class="row">
        <div class="col-2">
            @section('sidebar')
                @livewire('template.sidebar')
            @endsection

        </div>
        <div class="col-md-auto">
            @section('content')
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10">
                    <div class="container-fluid">
                    <header class="page-header">
                            <h2>Products</h2>
                        </header>
                    <div class="container-fluid">
                        @livewire('manage.product')
                    </div>
                    </div>
                </div>
            </div>
            @endsection
        </div>
    </div>
</div>