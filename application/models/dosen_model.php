<?

class dosen_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_dosen() {
        $this->db->select('*');
        $this->db->from('dosen');
        $result = $this->db->get();
        return $result;
    }

    function tambah_dosen($dosen) {
        $this->db->insert('dosen', $dosen);
    }

    function edit_nama_dosen($nama_dosen) {
        $this->db->where('dosen.nama_dosen', $nama_dosen);
        $this->db->update('nama_dosen', $nama_dosen);
    }

    function edit_email_dosen($email_dosen) {
        $this->db->where('dosen.email_dosen', $email_dosen);
        $this->db->update('email_dosen', $email_dosen);
    }

    function edit_bidang_ilmu_dosen($bidang_ilmu) {
        $this->db->where('dosen.bidang_ilmu', $bidang_ilmu);
        $this->db->update('bidang_ilmu', $bidang_ilmu);
    }

    function edit_foto($foto) {
        $this->db->where('dosen.foto', $foto);
        $this->db->update('foto', $foto);
    }

    function hapus_dosen($hapus_dosen) {
        $this->db->where('dosen.nama_dosen');
        $this->db->delete('dosen');
    }

}