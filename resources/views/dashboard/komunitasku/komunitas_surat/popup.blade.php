<!-- tambah data jenis surat-->
<div class="modal fade" id="tambahsuratModal" tabindex="-1" role="dialog" aria-labelledby="tambahsuratModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg ml-auto modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h4 class="modal-title text-success" id="exampleModalLongTitle">Tambah Jenis Surat</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('surat.store', ['komunitas_id' => request('komunitas_id')]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_surat" class="col-form-label" style="font-size: 14px;">Nama Surat</label>
                        <input class="form-control" name="jenis_surat" type="text" id="jenis_surat"
                            placeholder="Masukan nama surat">
                    </div>
                    <h5>Data yang dibutuhkan</h5>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox1" name="data[0]lengkap"
                                    value="Nama Lengkap">
                                <label class="custom-control-label" for="checkbox1">Nama Lengkap</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox3"
                                    data-parsley-multiple="groups" data-parsley-mincheck="3"
                                    value="Tempat, Tanggal Lahir" name="data[2]tmpt_tgl">
                                <label class="custom-control-label" for="checkbox3">Tempat/Tanggal
                                    lahir</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox4"
                                    data-parsley-multiple="groups" data-parsley-mincheck="4" value="Pekerjaan"
                                    name="data[3]pekerjaan">
                                <label class="custom-control-label" for="checkbox4">Pekerjaan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox5"
                                    data-parsley-multiple="groups" data-parsley-mincheck="5" value="Agama"
                                    name="data[4]agama">
                                <label class="custom-control-label" for="checkbox5">Agama</label>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox6"
                                    data-parsley-multiple="groups" data-parsley-mincheck="6" value="Status Perkawinan"
                                    name="data[5]status_perkawinan">
                                <label class="custom-control-label" for="checkbox6">Status
                                    Perkawinan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox7"
                                    data-parsley-multiple="groups" data-parsley-mincheck="7" value="Kewarganegaraan"
                                    name="data[6]kewarganegaraan">
                                <label class="custom-control-label" for="checkbox7">Kewarganegaraan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox8"
                                    data-parsley-multiple="groups" data-parsley-mincheck="8" value="Nomor NIK/Paspor"
                                    name="data[7]nik">
                                <label class="custom-control-label" for="checkbox8">Nomor
                                    NIK/Passpor</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox9"
                                    data-parsley-multiple="groups" data-parsley-mincheck="9"
                                    value="Nomor Kartu Keluarga" name="data[8]nokk">
                                <label class="custom-control-label" for="checkbox9">Nomor
                                    Kartu Keluarga</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox10"
                                    data-parsley-multiple="groups" data-parsley-mincheck="10"
                                    value="Alamat Sesuai KTP" name="data[9]alamat">
                                <label class="custom-control-label" for="checkbox10">Alamat
                                    Sesuai
                                    KTP</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox11"
                                    data-parsley-multiple="groups" data-parsley-mincheck="11" value="Alamat Domisili"
                                    name="data[10]domisili">
                                <label class="custom-control-label" for="checkbox11">Alamat
                                    Domisili</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success px-4 float-right">SIMPAN</button>
                    <button type="Update" class="btn btn-danger px-4 float-right mr-3 waves-effect"
                        data-dismiss="modal">BATAL</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Tambah data jenis surat-->
