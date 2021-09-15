@section('name-page', 'Lojas')
@extends('components.body')

@section('content')
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ route('admin.shops.create') }}" class="btn btn-info">Criar Loja</a>
    </div>
    <div class="row m-2 ">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @if ($shops)
                        @foreach ($shops as $shop)
                            <tr>
                                <td>{{$shop->name}}</td>
                                <td>{{$shop->address}}</td>
                                <td>
                                    <a href="{{ route('admin.shops.edit', $shop->id) }}" class="text-info">Editar</a>
                                    <form action="{{ route('admin.shops.destroy', $shop->id)}}" method="POST">
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
        {{ $shops->links() }}
    </div>
@endsection