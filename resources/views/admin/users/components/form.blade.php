@csrf
<div class="col-md-12">
    <div class="form-group">
        <label><span class="text-danger">*</span> Nome</label>
        <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text" value="{{ $user->name ?? old('name') }}" name="name" required id="name"/>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label><span class="text-danger">*</span> E-mail</label>
        <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="text" value="{{ $user->email ?? old('email') }}" name="email" required id="email"/>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Loja</label>
        <select class="form-control" name="shops_id" id="shops_id">
            <option value="">Escolha uma loja</option>
            @foreach ($shops as $shop)
                <option value={{ $shop->id }} @if (isset($user) && $shop->id == $user->shops_id) selected @endif>{{ $shop->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>@if (!isset($user->id)) <span class="text-danger">*</span> @endif {{ isset($user->id) ? 'Nova Senha' : 'Senha' }}</label>
        <input class="form-control @if ($errors->has('password')) is-invalid @endif" type="password" name="password" @if (!isset($user->id)) required @endif id="password"/>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label>@if (!isset($user->id)) <span class="text-danger">*</span> @endif Confirme sua senha </label>
        <input class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif" type="password" name="password_confirmation" @if (!isset($user->id)) required @endif id="password_confirmation"/>
    </div>
</div>

<div class="col-md-12 mb-2">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>