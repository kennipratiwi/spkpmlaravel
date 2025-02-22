@extends('layouts.backend.app')

@section('title', 'Edit Konversi Nilai')

@section('content')

    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-news-paper icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Edit Value Nilai</div>
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
            <form action="{{ route('standard_values.update', $value->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Rubah Value Nilai</h5>
                        <div class="form-group">
                            <label for="type" class="form-label">Tipe Konversi</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value="gap" {{ $value->type == 'gap' ? 'selected' : '' }}>GAP</option>
                                <option value="elearning" {{ $value->type == 'elearning' ? 'selected' : '' }}>E-Learning
                                </option>
                                <option value="spqa" {{ $value->type == 'spqa' ? 'selected' : '' }}>SP & QA</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="range" class="form-label">Range</label>
                            <input type="text" class="form-control" name="range" id="range" value="{{ $value->range }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="conversion" class="form-label">Konversi</label>
                            <input type="number" class="form-control" name="conversion" id="conversion"
                                value="{{ $value->conversion }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('standard_values.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
    </div>
@endsection
