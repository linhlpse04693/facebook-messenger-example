@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Facebook id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($conversations as $conversation)
                            <tr>
                                <td>{{ $conversation->sender }}</td>
                                <td>{{ $conversation->name }}</td>
                                <td>{{ $conversation->phone }}</td>
                                <td>{{ $conversation->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td rowspan="4" class="text-center">no records</td>
                            </tr>
                        @endforelse
                        </tbody>
                        {{ $conversations->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
