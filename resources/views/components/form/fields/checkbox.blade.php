
<div class="form-group row">
    <label for="{{ $name }}" class="col-md-2 col-form-label">{{ __(ucfirst($name)) }}</label>
    <div class="col-md-10">
        <input type="checkbox" class="" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
           @if($data && $data->$name == 1) value="1" checked @endif>
        @error($name)
        <span class="d-block invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
        @enderror
    </div>
</div>
