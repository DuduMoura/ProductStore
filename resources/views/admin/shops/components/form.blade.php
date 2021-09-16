@csrf
<div class="col-md-12">
    <div class="form-group">
        <label><span class="text-danger">*</span> Nome</label>
        <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text" value="{{ $shop->name ?? old('name') }}" name="name" required id="name"/>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label><span class="text-danger">*</span> Endereço</label>
        <input class="form-control @if ($errors->has('address')) is-invalid @endif" type="text" value="{{ $shop->address ?? old('address') }}" name="address" required id="address"/>
    </div>
</div>
<div class="col-md-12 mb-2">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>