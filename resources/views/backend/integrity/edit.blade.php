@extends('layouts.backend.app')

@section('title', 'Edit Pembobotan Nilai')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph3 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Edit Pembobotan Nilai</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('integrity.index') }}" class="btn-shadow btn btn-danger">
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
            <form role="form" id="integrityForm" action="{{ route('integrity.update', $integrity->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Pembobotan Nilai</h5>
                        <div class="form-group">
                            <label class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="description" value="{{ $integrity->description ?? '' }}" placeholder="Deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Bobot Nilai</label>
                            <input type="number" step="0.1" class="form-control" name="integrity" value="{{ $integrity->integrity ?? '' }}" placeholder="Bobot nilai" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nilai GAP</label>
                            <input type="number" step="0.1" class="form-control" name="difference_value" value="{{ $integrity->difference_value ?? '' }}" placeholder="Nilai GAP" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" onclick="resetForm('integrityForm')">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-info ml-3">
                            <i class="fas fa-plus-circle"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
