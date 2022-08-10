@extends('layouts.app')
@section('page-name', 'Devices')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class=" mb-4 border-success border-top-0 border-right-0 border-bottom-0">
                <div class="card-body">
                    <h1 class="card-title">Device Table</h1>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Device</th>
                                <th scope="col">Device Type</th>
                                <th scope="col">Activity Count</th>
                                <th scope="col">Created at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($devices as $device)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('devices.show', $device->id) }}">Device {{ $device->id }}</a></td>
                                    <td></td>
                                    <td>{{ $device->activities->count() }}</td>
                                    <td>{{ $device->created_at }}</td>
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

            {{ $devices->links() }}

        </div>


    </div>

@endsection
