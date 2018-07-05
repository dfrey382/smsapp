@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                Message Template

                <a href="{{ url('message-template/create') }}" class="pull-right btn btn-success btn-sm"> create</a>
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
                            <th>Template Name</th>
                            <th>Message Body</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach($templates as $template)
                                <tr>
                                    <td>{{ $count ++ }}</td>
                                    <td>{{ $template->name }}</td>
                                    <td>{{ $template->message }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('message-template.destroy',['id'=>$template->id])}}"> 
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                        </form>
                                    </td>
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
