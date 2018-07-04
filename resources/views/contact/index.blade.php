@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                Dashboard

                <a href="{{ url('contact/create') }}" class="pull-right btn btn-success btn-sm"> create</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-striped datatables">
                        <thead>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>contact</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $count ++ }}</td>
                                    <td> <label class="label label-success">{{ $contact->type?"GROUP":"INDIVIDUAL" }}</label></td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>

                                    <td> <a href="{{ url('delete')}}" class="btn btn-danger btn-sm"> delete</a></td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
