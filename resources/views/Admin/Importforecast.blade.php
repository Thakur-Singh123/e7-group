@extends('Admin.layout.master')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Import Data</div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.import.forecast') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Select Excel File</label>
                                <input type="file" name="excel_file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Import Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
