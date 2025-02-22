@extends('layouts.backend.app')

@section('title', 'Create Standard Value')

@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Tambah  Konversi Nilai</div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{ route('standard_values.index') }}" class="btn-shadow btn btn-danger">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fas fa-arrow-circle-left fa-w-20"></i>
                    </span>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <form role="form" id="standadvalueForm" action="{{ route('standard_values.store') }}" method="POST">
            @csrf
            <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Standad Value</h5>
                        <div class="form-group">
            <label class="form-label">Type:</label>
            <select class="form-control" name="type" required>
                <option value="gap">GAP</option>
                <option value="e-learning">E-Learning</option>
                <option value="spqa">SP&QA</option>
            </select>
                    </div>
                     <div class="form-group">
            <label class="form-label">Range:</label>
            <input class="form-control" type="text" name="range" required>
                     </div>
                     <div class="form-group">
            <label class="form-label">Konversi:</label>
            <input class="form-control" type="number" name="conversion" min="1" max="5" required>
                     </div>
                    </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
    </div>
</div>

@endsection
