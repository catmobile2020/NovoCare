@extends('layouts.app')
@section('page-name', 'Activity')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class=" mb-4 border-success border-top-0 border-right-0 border-bottom-0">
                <div class="card-body">
                    <h1 class="card-title">Activity Table</h1>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">{{ __('Screen') }}</th>
                                <th scope="col">{{ __('Count') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @forelse ($activities as $activity)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><a href="{{ route('activities.show', $activity->screen) }}">{{ $activity->screen }}</a></td>
                                    <td>{{ $activity->count }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="6" scope="row">No Data to Show</th>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{ $activities->links() }}

        </div>


    </div>

@endsection
