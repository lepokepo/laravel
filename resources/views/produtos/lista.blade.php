@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col-xl mb-5 mb-xl-0 fter">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Lista de carros</h3>
                        </div>
                    </div>
                </div>
                <div style="min-height: 25rem" class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <!-- colunas -->
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- cada tr é uma linha -->
                            <tr>
                                @foreach($produtos as $produto)
                                <!-- cada th é um dado do elemento -->
                                <th scope="row">
                                    <!-- id -->
                                    {{$produto->id}}
                                </th>
                                <th scope="row">
                                    <!-- nome -->
                                    {{$produto->nome}}
                                </th>
                                <th scope="row">
                                    <!-- valor -->
                                    {{$produto->valor}}
                                </th>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="{{ route('produto.deleta', $produto) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="dropdown-item" href="{{ route('produto.edita', $produto) }}">{{ ('Edit') }}</a>
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ ("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush