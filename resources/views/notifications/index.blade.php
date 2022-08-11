@extends('layouts.app')
@section('page-name', 'Notifications')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class=" mb-4 border-success border-top-0 border-right-0 border-bottom-0">
                <div class="card-body">
                    <h1 class="card-title float-start">Notifications Table</h1>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#exampleModalNotify">
                        Push New Notification
                    </button>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Title') }}</th>
                                <th scope="col">{{ __('Body') }}</th>
                                <th scope="col">{{ __('Scheduled at') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Topics') }}</th>
                                <th scope="col">{{ __('Created at') }}</th>
                                <th scope="col">{{ __('User') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @forelse ($notifications as $notify)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $notify->title }}</td>
                                    <td>{{ $notify->body }}</td>
                                    <td>{{ $notify->scheduled_at }}</td>
                                    <td>{{ $notify->status }}</td>
                                    <td>{{ $notify->topics }}</td>
                                    <td>{{ $notify->created_at }}</td>
                                    <td>{{ $notify->user->name }}</td>
                                </tr>
                                    <?php $i++; ?>
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

            {{ $notifications->links() }}

        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalNotify" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('notifications.store') }}">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Notification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       name="title">
                            </div>
                            <div class="mb-3">
                                <label for="exampleTextareaBody" class="form-label">Body</label>
                                <textarea name="body" id="exampleTextareaBody" class="form-control" cols="30"
                                          rows="10"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="exampleDatetimeBody" class="form-label">Scheduled At</label>
                                <input type="datetime-local" id="exampleDatetimeBody" name="scheduled_at" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Topics</label>
                                <select name="topics" class="form-control">
                                    @foreach($topics as $key => $topic)
                                        <option value="{{ $topic }}">{{ $topic }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection
