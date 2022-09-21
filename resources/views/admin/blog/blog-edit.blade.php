@extends('admin.layouts.base');

@section('title', 'Packages');

@section('content')
<div class="row">
    <div class="col-md-12">

        {{-- Alert Here --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- <div class="alert alert-danger">
        </div> --}}

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Content</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="{{route('admin.blog.update', $blog->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Yujang Lesmana"
                            value="{{$blog->title}}">
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10">{{ $blog->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Yujang Lesmana"
                            value="{{$blog->author}}">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        {{-- image --}}
                        <img class="mb-2" src="{{asset('storage/blog/'.$blog->image)}}" alt="" width="100px">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Change Image</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status Content</label>
                        <select class="custom-select" name="status" value="{{$blog->status}}">
                            <option value="draft" {{ $blog->status ==='draft' ? "selected" : "" }}>DRAFT</option>
                            <option value="publish" {{ $blog->status ==='publish' ? "selected" : "" }}>PUBLISH</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="meta_title">meta_title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                            placeholder="Pengacara Hukum, Pengacara Tangerang, etc ..." value="{{$blog->meta_title}}">
                    </div>

                    <div class="form-group">
                        <label for="meta_Description">meta_Description</label>
                        <input type="text" class="form-control" id="meta_Description" name="meta_description"
                            placeholder="Pengacara adalah bla bla ..." value="{{$blog->meta_description}}">
                    </div>

                    <div class="form-group">
                        <label for="meta_keywords">meta_keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                            placeholder="Pengacara, Hukum, Pasal, etc ..." value="{{$blog->meta_keywords}}">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
{{-- //CKEDITOR --}}
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
