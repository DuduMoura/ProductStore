@section('name-page', 'Produtos')
@extends('components.body')

@section('content')
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ route('admin.products.create') }}" class="btn btn-info">Criar Produtos</a>
    </div>
    <div class="row m-2 ">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @if ($products)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->code}}</td>
                                <td>{{number_format($product->price, 2, ',', '.')}}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-info">Editar</a>
                                    <form action="{{ route('admin.products.destroy', $product->id)}}" method="POST">
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
        {{ $products->links() }}
    </div>
@endsection