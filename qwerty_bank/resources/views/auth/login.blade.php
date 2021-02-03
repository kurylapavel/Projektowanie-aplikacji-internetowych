@extends('layouts.app')

@section('content')

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
        
			<div class="card-header">
				<h3>Login</h3>
				
			</div>
			<div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="input-group form-group">
						
							
						
                        {{-- <input type="text" class="form-control" placeholder="username"> --}}
                        
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						
					</div>
					<div class="input-group form-group">
						
                        {{-- <input type="password" class="form-control" placeholder="password"> --}}
                        
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

					</div>
					<div class="row align-items-center remember">
                        
                        {{-- <input type="checkbox">Remember Me --}}
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


@endsection
