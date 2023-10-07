@if ($errors->any())

        <div class = 'alert alert-danger' role="alert">
        <div class="text-danger">{{ __('Whoops! Something went wrong.') }}</div>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
