<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('templates/header');
$this->load->view('templates/navbar');
$this->load->view('templates/sidebar');
?>


<main>
    <div class="container-fluid">
        <h1 class="mt-4">Calendar Events</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Calendar Events</li>
        </ol>
        <div id='calendar'></div>
    </div>
</main>


<?php $this->load->view('templates/footer'); ?>