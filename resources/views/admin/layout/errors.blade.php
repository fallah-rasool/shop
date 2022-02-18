@if ($errors->any())
    <div class="error-input">
        <ul style="list-style: none">
            @foreach ($errors->all() as $error)
                <li  class="error-input">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
