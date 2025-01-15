<?php
// Anda bisa menambahkan logika PHP di sini jika diperlukan.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="backg bg-body-secondary">
    <div class="container pt-4">
        <h2 class="text-center">Data Inventaris</h2>
        <h2 class="text-center">Bean & Brew Cafe</h2>
        <p></p>

        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-header bg-info text-light text-center">
                        <h3>Form Input Data Barang</h3>
                    </div>
                    <div class="card-body">
                        <form id="barang-form">
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Barang</label>
                                <input type="text" id="kode" name="kode" class="form-control" placeholder="Masukkan Kode Barang" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Barang" required>
                            </div>

                            <div class="mb-3">
                                <label for="asal" class="form-label">Asal Barang</label>
                                <select id="asal" name="asal" class="form-select" required>
                                    <option>- Pilih -</option>
                                    <option value="Supplier A">Supplier A</option>
                                    <option value="Supplier B">Supplier B</option>
                                    <option value="Supplier C">Supplier C</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah Barang</label>
                                        <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah Barang" required>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="satuan" class="form-label">Satuan</label>
                                        <select id="satuan" name="satuan" class="form-select" required>
                                          <option>- Pilih -</option>
                                          <option value="KG">Kg</option>
                                          <option value="Kotak">Kotak</option>
                                          <option value="Botol">Botol</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
                                        <input type="date" id="tanggal_diterima" name="tanggal_diterima" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary" onclick="submitBarang()">Simpan</button>
                                <button type="button" class="btn btn-danger" onclick="document.getElementById('barang-form').reset()">Kosongkan</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
<!-- DAFTAR BARANG AWAL -->
<div class="card mx-auto mt-5">
  <div class="card-header text-center pt-3 bg-info text-light">
    <h2>Daftar Barang</h2>
  </div>
  
          <div class="mt-4 text-center">
              <input type="text" id="search-input" class="form-control" placeholder="Cari barang..." onkeyup="searchBarang()">
          </div>
          <table class="table table-bordered table-hover table-striped mt-3 text-center">
              <thead class="table-info">
                  <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Asal</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>
                      <th>Tanggal Diterima</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody id="table-body"></tbody>
          </table>
</div>  
<!-- Daftar Barang Akhir -->

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-form">
                        <input type="hidden" id="edit-id">
                        <div class="mb-3">
                            <label for="edit-kode" class="form-label">Kode Barang</label>
                            <input type="text" id="edit-kode" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-nama" class="form-label">Nama Barang</label>
                            <input type="text" id="edit-nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-asal" class="form-label">Asal Barang</label>
                            <select id="edit-asal" class="form-select" required>
                              <option value="Supplier A">Supplier A</option>
                              <option value="Supplier B">Supplier B</option>
                              <option value="Supplier C">Supplier C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit-jumlah" class="form-label">Jumlah Barang</label>
                            <input type="number" id="edit-jumlah" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-satuan" class="form-label">Satuan</label>
                            <select id="edit-satuan" class="form-select" required>
                              <option value="KG">Kg</option>
                              <option value="Kotak">Kotak</option>
                              <option value="Botol">Botol</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit-tanggal" class="form-label">Tanggal Diterima</label>
                            <input type="date" id="edit-tanggal" class="form-control" required>
                        </div>
                        <button type="button" class="btn btn-success" onclick="updateBarang()">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const API_URL = 'http://localhost/Inventaris_api/api.php';
        let barangData = [];

        async function fetchBarang() {
            const response = await fetch(API_URL);
            barangData = await response.json();
            renderTable(barangData);
        }

        function renderTable(data) {
            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = data.map(item => `
                <tr>
                    <td>${item.kode}</td>
                    <td>${item.nama}</td>
                    <td>${item.asal}</td>
                    <td>${item.jumlah}</td>
                    <td>${item.satuan}</td>
                    <td>${item.tanggal_diterima}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editBarang(${item.id_barang})">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteBarang(${item.id_barang})">Hapus</button>
                    </td>
                </tr>
            `).join('');
        }

        function searchBarang() {
            const searchInput = document.getElementById('search-input').value.toLowerCase();
            const filteredData = barangData.filter(item =>
                item.kode.toLowerCase().includes(searchInput) ||
                item.nama.toLowerCase().includes(searchInput) ||
                item.asal.toLowerCase().includes(searchInput)
            );
            renderTable(filteredData);
        }

        async function submitBarang() {
            const data = {
                kode: document.getElementById('kode').value,
                nama: document.getElementById('nama').value,
                asal: document.getElementById('asal').value,
                jumlah: document.getElementById('jumlah').value,
                satuan: document.getElementById('satuan').value,
                tanggal_diterima: document.getElementById('tanggal_diterima').value,
            };
            await fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            document.getElementById('barang-form').reset();
            fetchBarang();
        }

        async function editBarang(id) {
            const response = await fetch(`${API_URL}?id=${id}`);
            const item = await response.json();

            document.getElementById('edit-id').value = item.id_barang;
            document.getElementById('edit-kode').value = item.kode;
            document.getElementById('edit-nama').value = item.nama;
            document.getElementById('edit-asal').value = item.asal;
            document.getElementById('edit-jumlah').value = item.jumlah;
            document.getElementById('edit-satuan').value = item.satuan;
            document.getElementById('edit-tanggal').value = item.tanggal_diterima;

            const editModal = new bootstrap.Modal(document.getElementById('editModal'));
            editModal.show();
        }

        async function updateBarang() {
            const id = document.getElementById('edit-id').value;
            const data = {
                id_barang: id,
                kode: document.getElementById('edit-kode').value,
                nama: document.getElementById('edit-nama').value,
                asal: document.getElementById('edit-asal').value,
                jumlah: document.getElementById('edit-jumlah').value,
                satuan: document.getElementById('edit-satuan').value,
                tanggal_diterima: document.getElementById('edit-tanggal').value,
            };
            await fetch(API_URL, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            const editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
            editModal.hide();
            fetchBarang();
        }

        async function deleteBarang(id) {
            if (confirm('Yakin ingin menghapus barang ini?')) {
                await fetch(API_URL, {
                    method: 'DELETE',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id })
                });
                fetchBarang();
            }
        }

        document.addEventListener('DOMContentLoaded', fetchBarang);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
