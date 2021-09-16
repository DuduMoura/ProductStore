@section('name-page', 'Editar Usuário')
@extends('components.body')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @method('put')
                @include('admin.users.components.form')
            </form>
        </div>
    </div>
@endsection