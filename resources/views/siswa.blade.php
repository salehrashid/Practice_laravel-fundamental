<!doctype html>
<html lang="en">
{{-- untuk manage css --}}
@include("layout.siswa_css")
<body>
<div class="mt-4 mx-5 mb-5">
    <h1 style="text-align: center">Data alumni</h1>
    <div class="col-md-12">
        @if(session("berhasil"))
            <div class="alert alert-success">
                {{session("berhasil")}}
            </div>
        @endif
        @if(session("gagal"))
            <div class="alert alert-danger">
                {{session("gagal")}}
            </div>
        @endif
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
        Create
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Siswa</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route("siswa.store")}}">
                        {{-- csrf digunakan untuk mencegah user menjalankan aksi yang tidak diingikan --}}
                        @csrf
                        <div class="row mt-2">
                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="nama" class="form-control @error("nama") is-invalid @enderror"
                                           placeholder="Please insert your name..." required>
                                    @error("nama")
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- nik --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nik</label>
                                    <input type="number" name="nik" class="form-control @error("nik") is-invalid @enderror"
                                           placeholder="Please insert your nik..." required>
                                    @error("nik")
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row mt-2">
                            {{-- gender --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Genders</label>
                                    <select name="id_jenkel" class="form-select @error("id_jenkel") is-invalid @enderror" required>
                                        <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                        {{-- untuk memisahkan jenis kelamin laki dan perempuan --}}
                                        @foreach($genders as $gender)
                                            <option value="{{$gender -> id}}">{{$gender -> gentle}}</option>
                                        @endforeach
                                        @error("id_jenkel")
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            {{-- date --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" name="tgl_lahir" class="form-control @error("tgl_lahir") is-invalid @enderror" required>
                                    @error("tgl_lahir")
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- jurusan --}}
                        <div class="form-group mt-2">
                            <label class="form-label">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control @error("jurusan") is-invalid @enderror"
                                   placeholder="Please insert your department..." required>
                            @error("jurusan")
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        {{-- angkatan --}}
                        <div class="form-group mt-2">
                            <label class="form-label">Angkatan</label>
                            <input type="number" name="angkatan" class="form-control @error("angkatan") is-invalid @enderror"
                                   placeholder="Please insert your generation..." required>
                            @error("angkatan")
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        {{-- alamat --}}
                        <div class="form-group mt-2">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control @error("alamat") is-invalid @enderror" rows="5"
                                      placeholder="Please insert your address..." required></textarea>
                            @error("alamat")
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mx-5" style="text-align: center">
    {{-- membuat sebuah table --}}
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>No.</th>
                <th>Na</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Alamat</th>
                {{-- fungsi untuk menampung button delete dan edit serta detail --}}
                <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1
            ?>
            @if(count($siswas) > 0)
                @foreach($siswas as $siswa)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$siswa -> nama}}</td>
                        <td>{{$siswa -> nik}}</td>
                        <td>{{$siswa -> tgl_lahir}}</td>
                        <td>{{$siswa -> jurusan}}</td>
                        <td>{{$siswa -> angkatan}}</td>
                        <td>{{$siswa -> alamat}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" style="text-align: center">tidak ada data</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

{{-- untuk manage js --}}
@include("layout.siswa_js")
</body>
</html>
