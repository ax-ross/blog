@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарий {{ $comment->id }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('personal.comments.index') }}">Комментарии пользователя</a></li>
                            <li class="breadcrumb-item active">Коменнтарий {{ $comment->id }}</li>
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
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Комментарий</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                               placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Пост</th>
                                        <th>Дата обновления</th>
                                        <th>Дата добавления</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->post->title }}</td>
                                        <td>{{ $comment->updated_at }}</td>
                                        <td>{{ $comment->created_at }}</td>
                                        <td>
                                            <a class="mx-2" href="{{ route('personal.comments.edit', $comment) }}"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('personal.comments.destroy', $comment) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="text-danger border-0 bg-transparent">
                                                    <i class="far fa-trash-alt" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="bg-white p-5">
                            <p>Текст комментария:</p>
                            {{ $comment->message }}
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
