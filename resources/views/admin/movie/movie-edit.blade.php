@extends('admin.layouts.base');

@section('title', 'Movies');

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
                <h3 class="card-title">Edit Movie</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="{{route('admin.movie.update', $movie->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="e.g Guardian of The Galaxy" value="{{$movie->title}}">
                    </div>
                    <div class="form-group">
                        <label for="trailer">Trailer</label>
                        <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Video url"
                            value="{{$movie->trailer}}">
                    </div>
                    <div class="form-group">
                        <label for="movie">Movie</label>
                        <input type="text" class="form-control" id="movie" name="movie" placeholder="Video url"
                            value="{{$movie->movie}}">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" min="1" max="10" class="form-control" id="rating" name="rating"
                            placeholder="Rating" value="{{$movie->rating}}">
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="1h 39m"
                            value="{{$movie->duration}}">
                    </div>
                    <div class="form-group">
                        <label>Date:</label>
                        <div class="input-group date" id="release-date" data-target-input="nearest">
                            <input type="text" name="release_date" class="form-control datetimepicker-input"
                                value="{{$movie->release_date}}" data-target="#release-date" />
                            <div class="input-group-append" data-target="#release-date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="short-about">Casts</label>
                        <input type="text" class="form-control" id="short-about" name="casts" placeholder="Jackie Chan"
                            value="{{$movie->casts}}">
                    </div>
                    <div class="form-group">
                        <label for="short-about">Categories</label>
                        <input type="text" class="form-control" id="short-about" name="categories"
                            placeholder="Action, Fantasy" value="{{$movie->categories}}">
                    </div>
                    <div class="form-group">
                        <label for="small-thumbnail">Small Thumbnail</label>
                        {{-- show image --}}
                        <img src="{{asset('storage/thumbnail/'.$movie->small_thumbnail)}}" alt="" width="50px">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="small-thumbnail"
                                    name="small_thumbnail">
                                <label class="custom-file-label" for="small-thumbnail">Change Small Thumbnail</label>
                            </div>
                            {{-- <input type="file" class="form-control" name="small_thumbnail"> --}}
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="large-thumbnail">Large Thumbnail</label>
                            {{-- //show image --}}
                            <img src="{{asset('storage/thumbnail/'.$movie->large_thumbnail)}}" alt="" width="50px">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="large-thumbnail"
                                        name="large_thumbnail">
                                    <label class="custom-file-label" for="large-thumbnail">Change Large
                                        Thumbnail</label>
                                </div>
                                {{-- <input type="file" class="form-control" name="large_thumbnail"> --}}
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="description">Short About</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Awesome Movie" value="{{$movie->description}}">
                            </div>
                            <div class="form-group">
                                <label for="long_description">About</label>
                                <textarea name="long_description" id="long_description" cols="30"
                                    rows="10">{{ $movie->long_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Featured</label>
                                <select class="custom-select" name="is_featured" value="{{$movie->is_featured}}">
                                    <option value="0" {{ $movie->is_featured == '0' ? "selected" : "" }}>No</option>
                                    <option value="1" {{ $movie->is_featured == '1' ? "selected" : "" }}>Yes</option>
                                </select>
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
<script>
    //Date picker
    $('#release-date').datetimepicker({
      format: 'YYYY-MM-DD'
    });
</script>

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'long_description' );
</script>
@endsection
