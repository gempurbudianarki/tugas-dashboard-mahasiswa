<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Link CSS dan style --}}
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
            <style>
                .card-header h2 { color: white !important; }
            </style>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="card">
                        <div class="card-header" style="background: linear-gradient(45deg, #0d6efd, #00c6ff); color: white; border-bottom: none; border-radius: 0.75rem 0.75rem 0 0 !important; padding: 1.25rem 1.5rem; display: flex; justify-content: space-between; align-items: center;">
                            <h2 class="h5 mb-0"><i class="bi bi-people-fill me-2"></i>Data Mahasiswa</h2>
                            {{-- PERBAIKAN: Tombol ini sekarang punya ID 'tombol-tambah' agar dikenali JS --}}
                            <button class="btn btn-light fw-bold btn-sm" id="tombol-tambah">
                                <i class="bi bi-plus-circle-fill me-1 text-success"></i> Tambah Mahasiswa
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="mahasiswaTable" class="table table-hover table-bordered" style="width:100%">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th class="text-center">Semester</th>
                                            <th>Mata Kuliah</th>
                                            <th class="text-center" style="width: 120px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Dibiarkan kosong, diisi oleh AJAX --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mahasiswaModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Form Mahasiswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="mahasiswaForm" name="mahasiswaForm">
                <input type="hidden" name="id" id="id">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nim"></div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                </div>
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="number" class="form-control" id="semester" name="semester" required>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-semester"></div>
                </div>
                <div class="mb-3">
                    <label for="matkul" class="form-label">Mata Kuliah</label>
                    <input type="text" class="form-control" id="matkul" name="matkul" required>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-matkul"></div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="simpanButton" form="mahasiswaForm">Simpan</button>
          </div>
        </div>
      </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});

        var table = $('#mahasiswaTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('mahasiswa.data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center'},
                {data: 'nim', name: 'nim'},
                {data: 'nama', name: 'nama'},
                {data: 'semester', name: 'semester', className: 'text-center'},
                {data: 'matkul', name: 'matkul'},
                {data: 'aksi', name: 'aksi', orderable: false, searchable: false, className: 'text-center'},
            ]
        });

        // PERBAIKAN: Event klik untuk tombol #tombol-tambah
        $('#tombol-tambah').click(function () {
            $('#id').val('');
            $('#mahasiswaForm').trigger("reset");
            $('#modalLabel').html("Tambah Mahasiswa Baru");
            $('.alert').addClass('d-none').html(''); // Sembunyikan alert error
            $('#mahasiswaModal').modal('show');
        });

        // CREATE & UPDATE
        $('#mahasiswaForm').on('submit', function(e) {
            e.preventDefault();
            $('.alert').addClass('d-none').html('');

            let id = $('#id').val();
            let url = (id) ? '/mahasiswa/' + id : '{{ route("mahasiswa.store") }}';
            let method = (id) ? 'PUT' : 'POST';

            $.ajax({
                url: url, type: method, data: $(this).serialize(),
                success: function(response) {
                    $('#mahasiswaModal').modal('hide');
                    table.ajax.reload(null, false);
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    if(errors) {
                        if(errors.nim) $('#alert-nim').html(errors.nim[0]).removeClass('d-none');
                        if(errors.nama) $('#alert-nama').html(errors.nama[0]).removeClass('d-none');
                        if(errors.semester) $('#alert-semester').html(errors.semester[0]).removeClass('d-none');
                        if(errors.matkul) $('#alert-matkul').html(errors.matkul[0]).removeClass('d-none');
                    }
                }
            });
        });

        // EDIT
        $('body').on('click', '.tombol-edit', function() {
            let id = $(this).data('id');
            $.get('/mahasiswa/' + id + '/edit', function (response) {
                $('#modalLabel').html("Edit Mahasiswa");
                $('.alert').addClass('d-none').html('');
                $('#id').val(response.data.id);
                $('#nim').val(response.data.nim);
                $('#nama').val(response.data.nama);
                $('#semester').val(response.data.semester);
                $('#matkul').val(response.data.matkul);
                $('#mahasiswaModal').modal('show');
            })
        });

        // DELETE
        $('body').on('click', '.tombol-hapus', function (){
            let id = $(this).data('id');
            if(confirm("Apakah Anda Yakin ingin menghapus data ini?")){
                $.ajax({
                    type: "DELETE", url: '/mahasiswa/' + id,
                    success: function (data) { table.ajax.reload(null, false); },
                    error: function (data) { console.log('Error:', data); }
                });
            }
        });

    });
    </script>
    @endpush

</x-app-layout>