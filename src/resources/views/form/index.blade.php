@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('form.fastBook') }}</div>

                <div class="card-body">
                    @if ($infoMessage)
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{$infoMessage}}
                        </div>
                    @endif
                    <form method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="date_from" class="col-sm-4 col-form-label text-md-right">
                                {{ __('form.from') }}
                            </label>

                            <div class="col-md-6">
                                <input id="date_from" type="date" class="form-control{{ $errors->has('date_from') ? ' is-invalid' : '' }}"
                                       name="date_from" value="{{ old('date_from') }}" required autofocus>

                                @if ($errors->has('date_from'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('date_from') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_to" class="col-md-4 col-form-label text-md-right">
                                {{ __('form.to') }}
                            </label>

                            <div class="col-md-6">
                                <input id="date_to" type="date"
                                       class="form-control{{ $errors->has('date_to') ? ' is-invalid' : '' }}"
                                       name="date_to"
                                       value="{{old('date_to')}}"
                                       required>

                                @if ($errors->has('date_to'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('date_to') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                {{ __('form.phone') }}
                            </label>

                            <div class="col-md-6">
                                <input id="phone" type="tel"
                                       class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                       name="phone"
                                       value="{{old('phone')}}"
                                       required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('form.doBook') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection