@extends('layouts.app')
@section('page-name', 'Contact us')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class=" mb-4 border-success border-top-0 border-right-0 border-bottom-0">
                <div class="card-body">
                    <h1 class="card-title">Contact Us Table</h1>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Comment') }}</th>
                                <th scope="col">{{ __('Time') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td><a href="mailTo:{{ $contact->email }}">{{ $contact->email }}</a></td>
                                    <td>{{ $contact->comment }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>
                                        @if (!$contact->trashed())
                                            <a class="badge badge-light"
                                               href="{{ route('contacts.destroy', ['contact' => $contact->id])}}"
                                               onclick="event.preventDefault();document.getElementById('fn-delete-form_{{ $contact->id }}').submit()">{{ __('Delete') }}</a>
                                            <form style="display:none" id="fn-delete-form_{{ $contact->id }}"
                                                  method="POST"
                                                  action="{{ route('contacts.destroy', ['contact'=>$contact->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="delete"/>
                                            </form>
                                        @else
                                            <a class="badge badge-light"
                                               href="{{ route('contacts.destroy', ['contact' => $contact->id])}}"
                                               onclick="event.preventDefault();document.getElementById('fn-restore-form_{{ $contact->id }}').submit()">{{ __('Restore') }}</a>
                                            <form style="display:none" id="fn-restore-form_{{ $contact->id }}"
                                                  method="POST"
                                                  action="{{ route('contacts.restore', ['contact' => $contact->id])}}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="submit" value="delete"/>
                                            </form>
                                        @endif
                                    </td>
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

            {{ $contacts->links() }}

        </div>


    </div>

@endsection
