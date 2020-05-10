@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-dark ls-1 mb-1">Veículos</h6>
                            <h2 class="text-dark mb-0">Top 5 mais caros</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! $chart->container() !!}
                    {!! $chart->script() !!}
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