@extends('admin.master.master')

@section('content')
    <div class="row">

        <div class="form-group col-md-12">
            <h3>Guntzell</h3>
            <p>Desenvolvimento de sistemas</p>

            <div class="chart col-md-8">
                <canvas class="chartBar"
                        data-chart-background-color="<?= $chart->getColorRandom($usersByState, false); ?>"
                        data-chart-border-color="<?= $chart->getColorRandom($usersByState, false); ?>"
                        data-chart-labels="<?= $chart->getLabel($usersByState); ?>"
                        data-chart-values="<?= $chart->getValue($usersByState); ?>"
                >
                </canvas>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ url(asset('backend/assets/js/dashboard.chart.js')) }}"></script>
@endsection
