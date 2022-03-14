@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="Content">{{ $post->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{ $post->image }}">
            </div>
            <div class="form-group">
                <label for="category">Select category</label>
                <select class="form-select" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ $category->id === $post->category_id ? ' selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" multiple class="form-control">
                        @foreach($tags as $tag)
                            <option
                                @foreach($post->tags as $postTag)
                                {{ $tag->id === $postTag->id ? ' selected' : '' }}
                                @endforeach
                                value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
