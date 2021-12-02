@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mb-4"><h2 class="text-center">Buy Cookies</h2></div>

                <div class="card-body">
                    <form method="POST" action="" id="buy-cookie">
                        @csrf

                        <div class="row mb-3">
                            <label for="cookie" class="col-md-4 col-form-label text-md-right">Number of Cookies</label>

                            <div class="col-md-6">
                                <input id="cookie" type="number" class="form-control @error('cookie') is-invalid @enderror" name="cookie" value="{{ old('cookie') }}" required autofocus>

                                @error('cookie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Buy Cookies
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    jQuery(document).on('submit', '#buy-cookie', function(event) {
        event.preventDefault();
        const cookies = jQuery('#cookie').val();

        if(cookies){
            var url = baseurl + '/buy/'+cookies; 
            
            jQuery.get(url, function(success){
                jQuery('#buy-cookie').trigger("reset");
                alert(success);
            });
        }

    });
</script>
@endsection
