<div class="form-group row">
    <label for="{{ $name }}" class="col-md-2 col-form-label">{{ __(ucfirst($name)) }}</label>
    <div class="col-md-10">
        <select class="col-md-12" id="{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
            <option value="">@lang('Please Choose ...')</option>
            @foreach($list as $item)
                <option value="{{ $item->id }}"
                    @if($data && $item->id === $data->$name) selected @endif>
                    {{-- work's only if __toString() function is defined in Model class  --}}
                    {{ $item }}
                </option>
            @endforeach
        </select>
        @error($name)
        <span class="d-block invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
        @enderror
    </div>
</div>
