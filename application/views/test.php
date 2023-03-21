$this->session->set_userdata($data);

if ($user['level'] == 'admin') {

redirect('C_bagusDashboard'); //admin

} else if ($user['level'] == 'petugas') {

if ($user['active'] == 'suspended') {
$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Akun anda telah di suspended !
</div>');
redirect('C_bagusAuth');
} else {

redirect('C_bagusDashboard'); //petugas
}

} else {

redirect('C_bagusAuth');
}