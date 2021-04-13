{{-- Session Succes --}}
<div class="container">
    <div class="row">
        <div class="mt-4 col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Session Error --}}
<div class="container">
    <div class="row">
        <div class="mt-4 col-md-6">
            @if (session()->has('error'))
                <div class="alert alert-error">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
