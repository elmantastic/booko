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
            <div class="container">
                <header class="page-header">
						<h2>Products</h2>
					</header>
                @livewire('manage.product')
            </div>
            @endsection
        </div>
    </div>
</div>