
<div class="form-group row">
    <label for="{{ $name }}" class="col-md-2 col-form-label">{{ __(ucfirst($name)) }}</label>
    <div class="col-md-10">
        <input class="col-md-12 px-1" id="{{ $name }}" type="email" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
               value="@if($data){{ $data->$name }}@endif">
        @error($name)
        <span class="d-block invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
        @enderror
    </div>
</div>
