<?php

class AlkonModel extends CI_Model
{
	public function get_all()
	{
		$query = $this->db->select('a.*, b.*, c.*')
						  ->from('tbl_stock_alkon a')
						  ->join('tbl_data_alkon b', 'a.id_data_alkon = b.id_alkon', 'inner')
						  ->join('tbl_mst_jns_alkon c', 'b.id_jns_alkon = c.id_jns_alkon', 'left')
						  ->where('a.is_first', 1)
						  ->get();
		return $query->result();
	}	

	public function get_alkon_masuk()
	{
		$query = $this->db->select('a.*, b.*, c.*,  d.*')
						  ->from('tbl_stock_alkon a')
						  ->join('tbl_data_alkon b', 'a.id_data_alkon = b.id_alkon', 'left')
						  ->join('tbl_mst_supplier d', 'a.id_supplier = d.id_supplier', 'left')
						  ->join('tbl_mst_jns_alkon c', 'b.id_jns_alkon = c.id_jns_alkon', 'left')
						  ->where('a.is_first', 0)
						  ->order_by('a.entry_date', 'desc')
						  ->get();
		return $query->result();
	}	

	public function alkonReady()
	{
		$query = $this->db->select('a.*, b.*, c.*')
				->from('tbl_stock_alkon a')
				->join('tbl_data_alkon b', 'a.id_data_alkon = b.id_alkon', 'inner')
				->join('tbl_mst_jns_alkon c', 'b.id_jns_alkon = c.id_jns_alkon', 'left')
				->where('a.status' , 1)
				->order_by('a.entry_date', 'desc')
				->get();
		return $query->result();	
	}

	public function get_alkon_keluar()
	{
		$query = $this->db->select('a.*, b.*, c.*,  d.*')
						  ->from('tbl_out_alkon a')
						  ->join('tbl_stock_alkon b', 'a.id_stock_alkon = b.id_stock_alkon', 'inner')
						  ->join('tbl_data_alkon c', 'b.id_data_alkon = c.id_alkon', 'inner')
						  ->join('tbl_mst_faskes d', 'a.id_faskes = d.id_faskes', 'left')
						  ->order_by('a.out_date', 'desc')
						  ->get();
		return $query->result();
	}

	public function get_alkon_kadaluarsa()
	{
		$query = $this->db->select('a.*, b.*, c.*,  d.*')
						  ->from('tbl_stock_alkon a')
						  ->join('tbl_data_alkon b', 'a.id_data_alkon = b.id_alkon', 'left')
						  ->join('tbl_mst_supplier d', 'a.id_supplier = d.id_supplier', 'left')
						  ->join('tbl_mst_jns_alkon c', 'b.id_jns_alkon = c.id_jns_alkon', 'left')
						  ->where('status', 0)
						  ->order_by('a.expired_date', 'desc')
						  ->get();
		return $query->result();
	}

	public function insert($data)
	{
		$this->db->insert('tbl_data_alkon', $data);

		$getId = $this->db->insert_id();

		if ($this->db->affected_rows() > 0) {
			$stok = array(
				'status' => true,
				'id' => $getId
			);
			return $stok;
		} else {
			$stok = array(
				'status' => false,
				'id' => null
			);
			return $stok;
		}
	}

	public function delete($id)
	{
		$this->db->where('id_alkon', $id);
		$this->db->delete('tbl_data_alkon');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function insert_alkon_masuk($data)
	{
		$this->db->insert('tbl_stock_alkon', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete_alkon_masuk($id)
	{
		$this->db->where('id_stock_alkon', $id);
		$this->db->delete('tbl_stock_alkon');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function insert_alkon_keluar($data)
	{
		$this->db->insert('tbl_out_alkon', $data);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete_alkon_keluar($id)
	{
		$this->db->where('id_out_alkon', $id);
		$this->db->delete('tbl_out_alkon');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
