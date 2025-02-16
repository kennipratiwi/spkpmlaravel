@extends('layouts.backend.app')

@section('title', 'Create Standard Value')

@section('content')

    <h2>Tambah Konversi Nilai</h2>
    <form action="{{ route('standard_values.store') }}" method="POST">
        @csrf
        <label>Type:</label>
        <select name="type" required>
            <option value="gap">GAP</option>
            <option value="e-learning">E-Learning</option>
            <option value="spqa">SP&QA</option>
        </select>

        <label>Range:</label>
        <input type="text" name="range" required>

        <label>Konversi:</label>
        <input type="number" name="conversion" min="1" max="5" required>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>

@endsection
