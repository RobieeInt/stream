@extends('admin.layouts.base');

@section('title', 'Packages');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Package</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.package.create')}}" class="btn btn-info mb-2"><i
                                class="fas fa-plus-square"></i> Create Package</a>
                    </div>
                </div>

                {{-- @if(session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div>
                @endif --}}

                <div class="row">
                    <div class="col-md-12">
                        <table id="packages" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Package</th>
                                    <th>Price</th>
                                    <th>Max Days</th>
                                    <th>Max Users</th>
                                    <th>is Download?</th>
                                    <th>is 4K?</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package )
                                <tr>
                                    <td>
                                        {{-- loop number --}}
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{$package->name}}</td>
                                    <td>{{$package->price}}</td>
                                    <td>{{$package->max_days}}</td>
                                    <td>{{$package->max_users}}</td>
                                    <td>{{$package->is_downloaded === 1 ? "yes" : "No" }}</td>
                                    <td>{{$package->is_4k === 1 ? "yes" : "No" }}</td>
                                    <td>
                                        <a href="{{ route('admin.package.edit', $package->id) }}"
                                            class="btn btn-secondary"><i class="fas fa-edit"></i>Edit</a>
                                        <form action="{{ route('admin.package.destroy', $package->id) }}" method="POST"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            {{-- //giving modal before delete --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal-{{ $package->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <div class="modal fade" id="deleteModal-{{ $package->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                packages</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete <strong><span
                                                                    class="text-teal text-uppercase">{{
                                                                    $package->name }}</span></strong>
                                                            package?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
</div>
@endsection

@section('js')
<script>
    $('#packages').DataTable();
</script>

@if(session()->has('success'))
{{-- toasts --}}
<script>
    $(document).Toasts('create', {
    icon: 'fas fa-thumbs-up',
    class: 'bg-success m-1 text-teal align-items-center text-justify width:20px ',
    autohide: true,
    delay: 15000,
    title: 'Informasi',
    //body session get succes
    body: '{{ session()->get('success') }} ',
    position: 'bottomLeft',
    // fixed: true,
    subtitle: 'Success',

    });
</script>
@endif
@endsection
