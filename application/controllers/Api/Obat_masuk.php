<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Obat_Masuk extends RestController {

   public function index_get()
   {
        try {
            $data = $this->db->get('tb_obat_masuk')->result_array();
            if ($data !== null) {
                $this->response([
                    'status' => true,
                    'message' => 'Data berhasil di dapatkan',
                    'data' => $data
                ], self::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Data Not Found'
                ], self::HTTP_NOT_FOUND);
            }
        } catch (Exception $e) {
            $this->response([
                'status' => false,
                'message' => 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage()
            ], self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}