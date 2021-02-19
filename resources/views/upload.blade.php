@extends('layouts.app')

@section('content')

<!---<meta http-equiv="refresh" content="10" />--->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <div style="background-color: lightgreen; padding-bottom: 5%">
                        <span><b>CPFs cadastrados: </b></span><?= count($logSuccess) ?><br>                                           
                    </div>

                    <div style="background-color: lightpink">
                        <span><b>CPFs não cadastrados: </b></span><?= count($logCpfsErrors) ?><br>
                        @foreach ($logCpfsErrors as $cpfsErrors)
                            <span>{{ $cpfsErrors }}</span>
                        @endforeach                   
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
