<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
?>


<main>
    <div class="container-fluid">
        <h1 class="mt-4">Kelola Divisi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kelola Divisi</li>
        </ol>
        <div class="row mb-4">
            <div class="col-xl-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    <i class="fas fa-plus"></i> Tambah Kas Divisi
                </button>
                <a class="btn btn-success" href="index.html"><i class="fas fa-file-excel"></i> Export To Excel</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Data Divisi
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
                                        <th style="width: 200px;">Nama Divisi</th>
                                        <th>Singkatan</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr style="text-align: center;">
                                        <th>No</th>
                                        <th>Nama Divisi</th>
                                        <th>Singkatan</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row->result() as $div => $data) { ?>
                                        <tr style="text-align: center;">
                                            <td><?= $no++; ?>.</td>
                                            <td style="text-align: left;"><?= $data->divisi; ?></td>
                                            <td><?= $data->singkatan; ?></td>
                                            <td><?= $data->created_at; ?></td>
                                            <td><?= $data->updated_at; ?></td>
                                            <td>
                                                <a href="edit" data-id="<?= $data->id; ?>" data-divisi="<?= $data->divisi; ?>" data-singkatan="<?= $data->singkatan; ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                                                <a href="delete" data-id="<?= $data->id; ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal Insert -->
<form method="POST" action="<?= site_url('organisasi/insert') ?>">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="divisi" class="col-form-label">Nama Divisi:</label>
                        <input type="text" class="form-control" id="divisi" name="divisi" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="singkatan" class="col-form-label">Singkatan:</label>
                        <input type="text" class="form-control" id="singkatan" name="singkatan" required autocomplete="off">
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
<form method="POST" action="<?= site_url('organisasi/update') ?>">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="divisi" class="col-form-label">Divisi:</label>
                        <input type="hidden" class="form-control" id="id" name="id" required autocomplete="off">
                        <input type="text" class="form-control" id="divisi" name="divisi" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="singkatan" class="col-form-label">Singkatan:</label>
                        <input type="text" class="form-control" id="singkatan" name="singkatan" required autocomplete="off">
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
<form method="POST" action="<?= site_url('organisasi/delete') ?>">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Divisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin untuk menghapus divisi ini?</p>
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