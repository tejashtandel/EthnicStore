<!-- userProfile.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout blade template -->

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <div>
                            <label for="firstname" class="col-form-label">{{ __('First Name') }}</label>
                            <p>{{ $user->firstname }}</p>
                        </div>
                        <div>
                            <label for="lastname" class="col-form-label">{{ __('Last Name') }}</label>
                            <p>{{ $user->lastname }}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-around">
                        <div>
                            <label for="mobno" class="col-form-label">{{ __('Mobile Number') }}</label>
                            <p>{{ $user->mobile_no }}</p>
                        </div>
                        <div>
                            <label for="gender" class="col-form-label">{{ __('Gender') }}</label>
                            <p>{{ $user->gender }}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-around">
                        <div>
                            <label for="house" class="col-form-label">{{ __('House') }}</label>
                            <p>{{ $user->house }}</p>
                        </div>
                        <div>
                            <label for="street" class="col-form-label">{{ __('Street') }}</label>
                            <p>{{ $user->street }}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-around">
                        <div>
                            <label for="landmark" class="col-form-label">{{ __('Landmark') }}</label>
                            <p>{{ $user->landmark }}</p>
                        </div>
                        <div>
                            <label for="state" class="col-form-label">{{ __('State') }}</label>
                            <p>{{ $user->state }}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-around">
                        <div>
                            <label for="city" class="col-form-label">{{ __('City') }}</label>
                            <p>{{ $user->city }}</p>
                        </div>
                        <div>
                            <label for="postcode" class="col-form-label">{{ __('Postcode') }}</label>
                            <p>{{ $user->postcode }}</p>
                        </div>
                    </div>

                    <!-- Example with Bootstrap Buttons for Edit and Delete -->
                    <div class="form-group row mb-0">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('userdetails.edit', $user->id) }}" class="btn btn-primary mx-2">
                                {{ __('Edit') }}
                            </a>
                            <form action="{{ route('userdetails.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-2"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
