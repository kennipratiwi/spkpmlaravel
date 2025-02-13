@extends('layouts.backend.app')

@section('title', 'Edit Sub Kriteria')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Edit Sub Kriteria</div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('sub-criteria.index') }}" class="btn-shadow btn btn-danger">
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
            <!-- Form Start -->
            <form role="form" id="subcriteriaForm" action="{{ route('sub-criteria.update',$subcriteria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Sub Kriteria</h5>
                        <div class="form-group">
                            <label>Pilih Kriteria</label>
                            <select name="criteria_id" id="criteria_id" class="form-control">
                               <option>Pilih Kriteria</option>
                                @foreach($criteria as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $subcriteria->criteria_id ? 'selected' : '' }}>{{ $item->criteria_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Sub Kriteria</label>
                            <input type="text" class="form-control" name="subcriteria_code" placeholder="Kode sub kriteria" value="{{ $subcriteria->subcriteria_code }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Sub Kriteria</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama sub kriteria" value="{{ $subcriteria->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Bobot</label>
                            <input value="{{ $subcriteria->weight }}" type="number" class="form-control" name="weight" placeholder="Bobot">
                            <small class="text-danger">Nilai yang dapat dimasukkan ke kolom ini maks. {{ $totalWeight + $subcriteria->weight }}</small>
                        </div>
                        <div class="form-group">
                            <label for="">Nilai Standard</label>
                            <select name="standard_value" id="standard_value" class="form-control">
                                <option value="1" {{ $subcriteria->standard_value == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $subcriteria->standard_value == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $subcriteria->standard_value == 3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ $subcriteria->standard_value == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ $subcriteria->standard_value == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Factor</label>
                            <select name="factor" id="factor" class="form-control">
                                <option value="core" {{ $subcriteria->factor == 'core' ? 'selected' : '' }}>Core</option>
                                <option value="secondary" {{ $subcriteria->factor == 'secondary' ? 'selected' : '' }}>Secondary</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger" onclick="resetForm('subcriteriaForm')">
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
