@csrf
<div class="col-md-12">
    <div class="form-group">
        <label><span class="text-danger">*</span> Nome</label>
        <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text" value="{{ $product->name ?? old('name') }}" name="name" required id="name"/>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label><span class="text-danger">*</span> Código</label>
        <input class="form-control @if ($errors->has('code')) is-invalid @endif" type="text" value="{{ $product->code ?? old('code') }}" name="code" required id="code"/>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label><span class="text-danger">*</span> Preço</label>
        <input onkeyup="priceFormatter()" class="form-control @if ($errors->has('price')) is-invalid @endif" type="text" value="{{ $product->price ?? old('price') }}" name="price" required id="price"/>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Loja</label>
        <select class="form-control" name="shops_id" id="shops_id">
            <option value="">Escolha uma loja</option>
            @foreach ($shops as $shop)
                <option value={{ $shop->id }} @if (isset($product) && $shop->id == $product->shops_id) selected @endif>{{ $shop->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-12 mb-2">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>

<script>
    function priceFormatter() {
        var element = document.getElementById('price');
        var price = element.value.replace(/\D/g,'');

        price = (price/100).toFixed(2) + '';
        price = price.replace(".", ".");
        price = price.replace(/(\d)(\d{3})(\d{3}),/g, "$1$2$3.");
        price = price.replace(/(\d)(\d{3}),/g, "$1$2.");

        element.value = price;
        if(price == 'NaN' || price == '0.00') element.value = ''
    }
</script>