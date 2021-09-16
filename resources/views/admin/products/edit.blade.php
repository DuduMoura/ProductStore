@section('name-page', 'Editar Produto')
@extends('components.body')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                @method('put')
                @include('admin.products.components.form')
            </form>
        </div>
    </div>
@endsection