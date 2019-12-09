<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $clients->name) }}" required>
            @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="last_name">{{ __('Last Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" id="last_name" value="{{ old('last_name', $clients->last_name) }}" required>
            @includeWhen($errors->has('name'), 'partials.__invalid_feedback', ['feedback' => $errors->first('name')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" value="{{ old('email', $clients->email) }}" required>
            @includeWhen($errors->has('email'), 'partials.__invalid_feedback', ['feedback' => $errors->first('email')])
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="country">{{ __('Country') }}</label>
            <select class="form-control custom-select {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country" id="country" required>
                <option value="">{{ __('Please select a country') }}</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country', $collaborator->country_id) == $country->id ? 'selected' : ''}}>{{ $country->name }}</option>
                @endforeach
            </select>
            @includeWhen($errors->has('country'), 'partials.__invalid_feedback', ['feedback' => $errors->first('country')])
        </div>
    </div>

    </div>
</div>