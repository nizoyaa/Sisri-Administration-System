@extends('layouts.admin.dashboard')

@section('content')

<section class="section">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-dark font-weight-800">PENGELOLAAN DATA SISWA</h2>
            <hr>
            <p class="card-text"> After I ran into Helen at a restaurant, I realized she was just office
                pretty drop-dead date put in in a deck for our standup today. Who's responsible for the ask
                for this request? who's responsible for the ask for this request? but moving the goalposts
                gain traction. </p>
            <a href="#" class="btn btn-primary">Tambah
                Data Siswa ⭢ </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                <div class="table-responsive">
                    <table id="example" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">KELAS</th>
                                <th scope="col">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <th scope="row">
                                    {{ $item->id }}
                                </th>
                                <td>
                                    {{ $item->nisn }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->username }}
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    {{ $item->class }}
                                </td>
                                <td>
                                    <a href="{{ route('data-siswa.show', $item->id) }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('data-siswa.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('data-siswa.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection