@extends('admin.layouts.base');

@section('title', 'users');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="users" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Transaction</th>
                                    <th>Transaction Amount</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )

                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        {{-- get transaction relation with status success count --}}
                                        {{$user->transaction->where('status', 'success')->count()}}
                                        {{-- {{ $user->transaction->count() }} --}}
                                    </td>
                                    <td>
                                        {{-- get transaction relation sum with status successfully--}}
                                        {{ number_format($user->transaction->where('status', 'success')->sum('amount')) }}
                                        {{-- {{ number_format($user->transaction->sum('amount')) }} --}}
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->role}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#users').DataTable();
</script>
@endsection
