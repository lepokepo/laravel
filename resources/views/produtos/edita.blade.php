@extends('layouts.app', ['title' => __('User Management')])

@section('content')
@include('users.partials.header', ['title' => __('Edita Carro')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Editar Veículo') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method='post' action="{{ route('produto.update', $prod) }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <h6 class="heading-small text-muted mb-4">{{ __('Informações do Veículo') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nome">{{ __('Nome') }}</label>
                                <input type="text" name="nome" id="input-nome" class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" required autofocus value="{{ $prod->nome }}">

                                @if ($errors->has('nome'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('valor') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-valor">{{ __('Valor') }}</label>
                                <input type="number" name="valor" id="input-valor" class="form-control form-control-alternative{{ $errors->has('valor') ? ' is-invalid' : '' }}" placeholder="{{ __('Valor') }}" required value="{{ $prod->valor }}">
                                @if ($errors->has('valor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('valor') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection