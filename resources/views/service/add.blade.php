@extends('main')

@section('title', 'Layanan')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Service</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Service</a></li>
                        <li class="active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <strong>Tambah Service</strong>
            </div>
            <div class="pull-right">
                <a href="{{ url('service') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('service') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Layanan</label>
                            <input type="text" name="name" class="form-control" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <textarea name="category" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <textarea type="decimal" name="price" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>

    
    </div>
@endsection