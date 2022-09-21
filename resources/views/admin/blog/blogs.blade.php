@extends('admin.layouts.base');

@section('title', 'Blog');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Blogs</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.blog.create')}}" class="btn btn-info mb-2"><i
                                class="fas fa-plus-square"></i> Create Blog
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="blogs" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>title</th>
                                    <th>content</th>
                                    <th>author</th>
                                    <th>status</th>
                                    <th>image</th>
                                    <th>action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog )

                                <tr>
                                    <td>{{$blog->id}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>
                                        <div class="content">
                                            {!! $blog->content !!}
                                        </div>
                                    </td>
                                    <td>{{$blog->author}}</td>
                                    <td class="{{$blog->status == 'publish' ?  " text-teal" : "text-orange" }}">
                                        {{-- //uppercase --}}
                                        {{ strtoupper($blog->status) }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/blog/'.$blog->image)}}" alt="" width="100px">
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                            class="btn btn-secondary mb-2"><i class="fas fa-edit"></i>Edit</a>
                                        <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            {{-- //giving modal before delete --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal-{{ $blog->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <div class="modal fade" id="deleteModal-{{ $blog->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                blog
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete <strong><span
                                                                    class="text-teal text-uppercase">{{
                                                                    $blog->title }}</span></strong>
                                                            blog?
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
    $('#blogs').DataTable();
</script>

{{-- CKEDIT Content --}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
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
