<!-- basic model for showing name and whatnot -->
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_basicModel extends CI_Model
{

    public function username($username)
    {
        return $this->db->get_where('masyarakat', ['username' => $username]);
    }

    public function Susername($username)
    {
        return $this->db->get_where('petugas', ['username' => $username]);
    }

    public function add_category($add)
    {
        $this->db->insert('kategori', $add);
    }

    public function edit_category($update)
    {
        $this->db->update('kategori', $update);
    }

    public function category()
    {
        return $this->db->get('kategori');
    }

    public function laporan($add)
    {
        $this->db->insert('pengaduan', $add);
    }

    public function pengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        return $this->db->get();
    }

    public function add_subcategory($add)
    {
        $this->db->insert('subkategori', $add);
    }

    public function edit_subcategory($update)
    {
        $this->db->update('subkategori', $update);
    }

    public function subcategory()
    {
        return $this->db->get('subkategori');
    }

    public function subcategory_join()
    {
        $this->db->select('*');
        $this->db->from('subkategori');
        $this->db->join('kategori', 'kategori.id=subkategori.id_kategori');
        return $this->db->get();
    }

    public function petugas_nama()
    {
        return $this->db->get('petugas');
    }

    public function masyarakat_nama()
    {
        return $this->db->get('masyarakat');
    }

    public function edit_admin($updateData)
    {
        $this->db->update('petugas', $updateData);
    }

    public function listpengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->join('kategori', 'kategori.id=pengaduan.kategori');
        $this->db->join('subkategori', 'subkategori.id_subkategori=pengaduan.sub_kategori');
        return $this->db->get();
    }

    public function riwayat_laporan()
    {
        $user = $this->M_basicModel->username($this->session->userdata('username'))->row_array();
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->join('kategori', 'kategori.id=pengaduan.kategori');
        $this->db->join('subkategori', 'subkategori.id_subkategori=pengaduan.sub_kategori');
        $this->db->where('masyarakat.nik', $user['nik']);
        return  $this->db->get();
    }

    public function suspend($suspend)
    {
        $this->db->update('masyarakat', $suspend);
    }

    public function unsuspend($unsuspend)
    {
        $this->db->update('masyarakat', $unsuspend);
    }
    public function add_tanggapan($add)
    {
        $this->db->insert('tanggapan', $add);
    }

    public function tanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('petugas','petugas.id_petugas=tanggapan.id_petugas');
        $this->db->where('id_pengaduan',$id);
        return $this->db->get();
    }

    public function listpengaduan2($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->join('kategori', 'kategori.id=pengaduan.kategori');
        $this->db->join('subkategori', 'subkategori.id_subkategori=pengaduan.sub_kategori');
        $this->db->where('pengaduan.id_pengaduan',$id);
        return $this->db->get();
    }

    public function status_pengaduan()
    {
        $user = $this->db->get_where('masyarakat',['username'=>$this->session->userdata('username')])->row_array();

        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori','kategori.id=pengaduan.kategori');
        $this->db->join('subkategori','subkategori.id_subkategori=pengaduan.sub_kategori');
        $this->db->where('pengaduan.nik',$user['nik']);

        return $this->db->get();
    }
}
