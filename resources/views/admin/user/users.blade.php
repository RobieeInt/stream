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
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Transaction</th>
                                    <th class="text-center">Transaction Amount</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )

                                <tr>
                                    <td class="text-center">{{$user->id}}</td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">
                                        {{-- get transaction relation with status success count --}}
                                        {{$user->transaction->where('status', 'success')->count()}}
                                        {{-- {{ $user->transaction->count() }} --}}
                                    </td>
                                    <td class="text-center">
                                        {{-- get transaction relation sum with status successfully--}}
                                        {{ number_format($user->transaction->where('status', 'success')->sum('amount')) }}
                                        {{-- {{ number_format($user->transaction->sum('amount')) }} --}}
                                    <td class="text-center">{{$user->phone}}</td>
                                    <td class="text-center">{{$user->role}}</td>
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
