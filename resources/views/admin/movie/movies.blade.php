@extends('admin.layouts.base');

@section('title', 'Movies');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Movies</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.movie.create')}}" class="btn btn-info mb-2"><i
                                class="fas fa-plus-square"></i> Create Movie</a>
                    </div>
                </div>

                @if(session()->has('success'))
                {{-- <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div> --}}
                {{-- call script sweet alert --}}

                {{-- toasts --}}


                @endif

                <div class="row">
                    <div class="col-md-12">
                        <table id="movie" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Thumbnail S</th>
                                    <th class="text-center">Thumbnail L</th>
                                    <th class="text-center">Categories</th>
                                    <th class="text-center">Casts</th>
                                    <th class="text-center">Duration</th>
                                    <th class="text-center">Rating</th>
                                    <th class="text-center">Featured</th>
                                    <th class="text-center">About</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movies as $movie )
                                <tr>
                                    <td class="text-center">{{$movie->id}}</td>
                                    <td class="text-center">{{$movie->title}}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/thumbnail/'.$movie->small_thumbnail) }}" alt=""
                                            width="50px">
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/thumbnail/'.$movie->large_thumbnail) }}" alt=""
                                            width="50px">
                                    </td>
                                    <td class="text-center">{{$movie->categories}}</td>
                                    <td class="text-center">{{$movie->casts}}</td>
                                    <td class="text-center">{{$movie->duration}}</td>
                                    <td class="text-center">{{$movie->rating}}</td>
                                    <td class="text-center">{{$movie->is_featured === 1 ? "yes" : "No" }}</td>
                                    <td class="text-center">
                                        <div class="about">
                                            {!! $movie->long_description !!}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.movie.edit', $movie->id) }}"
                                            class="btn btn-secondary"><i class="fas fa-edit"></i>Edit</a>
                                        <form action="{{ route('admin.movie.destroy', $movie->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            {{-- //giving modal before delete --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal-{{ $movie->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <div class="modal fade" id="deleteModal-{{ $movie->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                Movie
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete <strong><span
                                                                    class="text-teal text-uppercase">{{
                                                                    $movie->title }}</span></strong>
                                                            movie?
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
    $('#movie').DataTable();
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

{{-- CKEDIT about --}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('about');
</script>

@endsection
