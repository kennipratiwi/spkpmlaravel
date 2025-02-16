@extends('layouts.backend.app')

@section('title', 'Standard Values')

@section('content')
    <h2>Daftar Konversi Nilai</h2>
    <a href="{{ route('standard_values.create') }}" class="btn btn-primary">Tambah Data</a>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Type</th>
                <th>Range</th>
                <th>Konversi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($values as $index => $value)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $value->type }}</td>
                    <td>{{ $value->range }}</td>
                    <td>{{ $value->conversion }}</td>
                    <td>
                        <a href="{{ route('standard_values.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('standard_values.destroy', $value->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
