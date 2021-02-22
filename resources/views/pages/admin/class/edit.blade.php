@extends('layouts.admin.dashboard')

@section('content')


<section class="section">
    <div class="">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Update Data Kelas</h2>
                <hr>
                <p class="card-text"> Update data siswa meliputi Email dan Nama Lengkap.
                    Kita tidak bisa mengubah password guru, Hanya guru yang dapat mengubah passwordnya
                    sendiri.
                </p>
                <a href="#detail" class="btn btn-primary">Saya paham dan
                    ingin melanjutkan ⭢</a>
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <div class="col-md-12 text-center">
            <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                Update Data Siswa</p>
            <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan
                dibawah </p>
            <hr>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('data-kelas.update', $item->id) }}">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="id_kelas">ID KELAS</label>
                        <input id="id_kelas" type="text" class="form-control" value="{{ $item->class_id }}"
                            name="class_id">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="kelas">KELAS</label>
                        <input id="kelas" type="text" value="{{ $item->class_name }}" class="form-control"
                            name="class_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="kompetensi_keahlian">KOMPETENSI KEAHLIAN</label>
                    <input type="text" value="{{ $item->skill_competence }}" class="form-control"
                        id="kompetensi_keahlian" name="skill_competence">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection