@csrf
<div class="form-group">
    <label for="titulo">Titulo de la revision:</label>
    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo" aria-describedby="titulo de la revision" value="{{ old('titulo', $revision->titulo) }}">
    @error('titulo')
        <div class="invalid-feedback">{{ $message }}</div>
    @else
        <small id="titulo" class="form-text text-muted">Titulo de la revision</small>
    @enderror
</div>

<div class="form-group">
    <label for="meta_necesidad_informacion">Meta de necesidad de información:</label>
    <textarea class="form-control" name="meta_necesidad_informacion" id="meta_necesidad_informacion" rows="3">{{ old('meta_necesidad_informacion', $revision->meta_necesidad_informacion) }}</textarea>
    @error('meta_necesidad_informacion')
    <div class="invalid-feedback">{{ $message }}</div>
    @else
        <small id="meta_necesidad_informacion" class="form-text text-muted">Meta de necesidad de informacion</small>
    @enderror
</div>

<div >
    <h4>Investigadores participantes</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Participa?</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{ Auth::user()->name}}</td>
            <td>
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="{{Auth::user()->id}}" value="{{Auth::user()->id}}" name="investigadores[]" checked >
                <label class="custom-control-label" for="{{Auth::user()->id}}"></label>
              </div></td>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="{{$user->id}}" value="{{$user->id}}" name="investigadores[]">
                    <label class="custom-control-label" for="{{$user->id}}"></label>
                  </div></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
