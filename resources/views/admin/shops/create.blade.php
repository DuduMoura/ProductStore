@section('name-page', 'Criar Loja')
@extends('components.body')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.shops.store') }}" method="POST">
                @csrf
                @include('admin.shops.components.form')
            </form>
        </div>
    </div>
@endsection