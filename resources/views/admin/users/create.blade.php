@section('name-page', 'Criar Usuário')
@extends('components.body')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @include('admin.users.components.form')
            </form>
        </div>
    </div>
@endsection