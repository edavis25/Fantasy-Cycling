@extends('layouts.admin')

@section('content')
    <div class="row">
        <h4 class="ml10 d-inline-block">{{ $stage->race->name }} - {{ $stage->race->year }}: Stage {{ $stage->stage_number }}</h4>
    </div>
    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">
                    <div class="mt25">
                        @foreach ($scoring_categories as $category)
                            <h5>{{ $category->category }}</h5>
                            {!! Form::open(['url' => route('admin.stage-scoring.store')]) !!}
                                <input name="stage_id" type="hidden" value="{{ $stage->id }}">
                                <input name="race_rider_id" type="hidden" value="">
                                <input name="" type="hidden" value="">
                            {!! Form::close() !!}
                        @endforeach
                    </div>
                    <div class="card-action pl0 pr0">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
