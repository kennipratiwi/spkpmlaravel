@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Standard Value</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('standard_values.update', $standardValue->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="type" class="form-label">Tipe Konversi</label>
            <select class="form-control" name="type" id="type" required>
                <option value="gap" {{ $standardValue->type == 'gap' ? 'selected' : '' }}>GAP</option>
                <option value="elearning" {{ $standardValue->type == 'elearning' ? 'selected' : '' }}>E-Learning</option>
                <option value="spqa" {{ $standardValue->type == 'spqa' ? 'selected' : '' }}>SP & QA</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="min_value" class="form-label">Nilai Minimum</label>
            <input type="number" class="form-control" name="min_value" id="min_value" value="{{ $standardValue->min_value }}" required>
        </div>

        <div class="mb-3">
            <label for="max_value" class="form-label">Nilai Maksimum</label>
            <input type="number" class="form-control" name="max_value" id="max_value" value="{{ $standardValue->max_value }}" required>
        </div>

        <div class="mb-3">
            <label for="conversion" class="form-label">Konversi</label>
            <input type="number" class="form-control" name="conversion" id="conversion" value="{{ $standardValue->conversion }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('standard_values.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
