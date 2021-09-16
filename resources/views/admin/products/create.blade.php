@section('name-page', 'Criar Produto')
@extends('components.body')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.products.store') }}" method="POST">
                @include('admin.products.components.form')
            </form>
        </div>
    </div>
@endsection