<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
?>


<main>
    <div class="container-fluid">
        <h1 class="mt-4">Uang Kas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Uang Kas</li>
        </ol>
        <div class="row mb-4">
            <div class="col-xl-9 col-md-6 mb-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    <i class="fas fa-plus"></i> Tambah Kas Bulanan
                </button>
                <a href="<?= site_url('kas/download'); ?>" class="btn btn-success">
                    <i class="fas fa-file-excel"></i> Export To Excel
                </a>
            </div>
            <div class="col-xl-3 col-md-6 text-right">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Total Uang Kas
                        <h2>Rp. <?= number_format($sum_jumlah->jumlah); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Rekap Keuangan
            </div>
            <div class="card-body">
                <div class="col-12 p-0">
                    <?= $this->session->flashdata('flash'); ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 20px;">No</th>
                                <th style="width: 200px;">Nama</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Nominal (Rp.)</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($row->result() as $kas) { ?>
                                <tr style="text-align: center;">
                                    <td><?= $no++; ?>.</td>
                                    <td style="text-align: left;"><?= ucfirst($kas->user_id); ?></td>
                                    <td><?= $kas->bulan_name; ?></td>
                                    <td><?= $kas->tahun; ?></td>
                                    <td><?= number_format($kas->nominal); ?></td>
                                    <td><?= $kas->created_at; ?></td>
                                    <td><?= $kas->updated_at; ?></td>
                                    <td>
                                        <a href="edit" data-id="<?= $kas->id; ?>" data-user="<?= $kas->user_id; ?>" data-bulan="<?= $kas->bulan_name; ?>" data-tahun="<?= $kas->tahun; ?>" data-nominal="<?= $kas->nominal; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                                        <a href="delete" data-id="<?= $kas->id; ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr style="text-align: center;">
                                <th colspan="4">Jumlah</th>
                                <th><?= number_format($sum_jumlah->jumlah); ?></th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal Insert -->
<form method="POST" action="<?= site_url('kas/insert') ?>">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user" class="col-form-label">Nama:</label>
                        <input type="text" class="form-control" id="user" name="user" required autocomplete="off">
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="bulan" class="col-form-label">Bulan:</label>
                                <select name="bulan" id="bulan" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($bulan->result() as $row) { ?>
                                        <option value="<?= $row->id; ?>"><?= $row->bulan; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="tahun" class="col-form-label">Tahun:</label>
                                <input style="text-align: center;" type="text" class="form-control" id="tahun" name="tahun" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nominal" class="col-form-label">Nominal (Rp.):</label>
                        <input style="text-align: center;" type="text" class="form-control" id="nominal" name="nominal" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Edit -->
<form method="POST" action="<?= site_url('kas/update') ?>">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user" class="col-form-label">Nama:</label>
                        <input type="hidden" class="form-control" id="id" name="id" required autocomplete="off">
                        <input type="text" class="form-control" id="user" name="user" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="bulan" class="col-form-label">Bulan:</label>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <input style="text-align: center;" type="text" class="form-control" id="bulan" name="bulan" disabled required autocomplete="off">
                            </div>
                            <div class="col-12 col-md-6">
                                <select name="bulan" id="bulan" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($bulan->result() as $row => $data) { ?>
                                        <option value="<?= $data->id; ?>"><?= $data->bulan; ?></option>
                                    <?php } ?>
                                </select>
                                <span>*Pilih jika bulan akan dirubah</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="nominal" class="col-form-label">Nominal (Rp.):</label>
                                <input style="text-align: center;" type="text" class="form-control" id="nominal" name="nominal" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="tahun" class="col-form-label">Tahun:</label>
                                <input style="text-align: center;" type="text" class="form-control" id="tahun" name="tahun" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Delete -->
<form method="POST" action="<?= site_url('kas/delete') ?>">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Kas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin untuk menghapus data kas ini?</p>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>


<?php $this->load->view('templates/footer'); ?>