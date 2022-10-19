@extends('admin.layouts.base');

@section('title', 'profile Team');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">profiles Team</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.profile.create')}}" class="btn btn-info mb-2"><i
                                class="fas fa-plus-square"></i> Create profile
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="profiles" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">image</th>
                                    <th class="text-center">action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $profile )

                                <tr>
                                    <td class="text-center">{{$profile->id}}</td>
                                    <td class="text-center">{{$profile->name}}</td>
                                    <td class="text-center">{{$profile->job}}</td>
                                    <td class="text-center">
                                        <div class="text-center content">
                                            {!! $profile->description !!}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/profile/'.$profile->image)}}" alt="" width="100px">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.profile.edit', $profile->id) }}"
                                            class="btn btn-secondary mb-2"><i class="fas fa-edit"></i>Edit</a> <br>
                                        <form action="{{ route('admin.profile.destroy', $profile->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            {{-- //giving modal before delete --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal-{{ $profile->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <div class="modal fade" id="deleteModal-{{ $profile->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                profile
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete <strong><span
                                                                    class="text-teal text-uppercase">{{
                                                                    $profile->title }}</span></strong>
                                                            profile?
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
    $('#profiles').DataTable();
</script>

{{-- CKEDIT Content --}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', 'tabSpaces', 4);
</script>

{{-- show sweet alert if delete success --}}
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
