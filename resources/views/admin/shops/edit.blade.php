@section('name-page', 'Editar Loja')
@extends('components.body')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.shops.update', $shop->id) }}" method="POST">
                @method('put')
                @include('admin.shops.components.form')
            </form>
        </div>
    </div>
@endsection