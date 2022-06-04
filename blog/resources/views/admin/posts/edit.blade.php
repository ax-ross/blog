@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $post->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="card card-primary col-4 p-0">
                        <div class="card-header">
                            <h3 class="card-title">Редактировать пост</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название поста</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="Введите название поста" required value="{{ $post->title }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Контент поста</label>
                                    <textarea name="content" id="summernote"
                                              class="form-control">{{ $post->content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="" class="w-50">
                                    </div>
                                    <label for="preview_image">Изображение для превью</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input btn" id="preview_image"
                                                   name="preview_image">
                                            <label class="custom-file-label" for="preview_image">Выберите
                                                изображение</label>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div>
                                        <img src="{{ asset('storage/' . $post->main_image) }}" alt="" class="w-50">
                                    </div>
                                    <label for="main_image">Добавить основное изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control btn"
                                                   id="main_image" name="main_image">
                                            <label class="custom-file-label" for="main_image">Выберите
                                                изображение</label>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Категория</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if($post->cateory_id == $category->id) selected @endif>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Теги</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Выберите теги"
                                            style="width: 100%;" name="tag_ids[]">
                                        @foreach($tags as $tag)
                                            <option  value="{{ $tag->id }}" @if($post->tags->contains($tag)) selected @endif>{{ $tag->title }}</option>
                                        @endforeach
{{--{{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}}--}}
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Изменить">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
