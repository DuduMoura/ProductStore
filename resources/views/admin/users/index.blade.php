@section('name-page', 'Usuários')
@extends('components.body')

@section('content')
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ route('admin.users.create') }}" class="btn btn-info">Criar Usuário</a>
    </div>
    <div class="row m-2 ">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @if ($users)
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-info">Editar</a>
                                    <form action="{{ route('admin.users.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="text-danger">Remover</button>
                                    </form>
                                </td>
                            </tr>                    
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Não há informações para serem mostradas</td>
                        </tr>    
                    @endif
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div>
@endsection