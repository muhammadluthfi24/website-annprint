<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatCustomerController extends Controller
{

    public function get_provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            $provinsi = $data;
            //$data = $response['rajaongkir']['results'];
            //dd($provinsi);
            return $provinsi;//view( 'customer.alamat.alamat_checkout' , compact(['id','name']));
        }
    }

    public function get_city()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $city = json_decode($response, true);

            //$city = $response['rajaongkir']['results'];
            return $city;
        }
    }
    public function create_checkout($id)
    {
        $provinsi = $this->get_provinsi();
        $city = $this->get_city();
        return view('customer.alamat.alamat_checkout', compact(['id', 'provinsi', 'city']));
        //return $city;
    }

    public function store_alamat_checkout(Request $request)
    {
        $id_keranjang = $request->id_keranjang;
        $alamat = Alamat::where('id_user', Auth::user()->id)->get();

        if ($alamat->count() < 3) {
            $request->validate([
                'nama' => 'required',
                'telp' => 'required',
                'pos' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'alamat' => 'required'
            ]);
            $provinsi = $request->provinsi;
            $provinsi_result = explode('|', $provinsi);
            $id_provinsi = $provinsi_result[0];
            $nama_provinsi = $provinsi_result[1];

            $kota = $request->kota;
            $kota_result = explode('|', $kota);
            $id_kota = $kota_result[0];
            $nama_kota = $kota_result[1];

            Alamat::create([
                'id_user' => Auth::user()->id,
                'no_telp' => $request->telp,
                'nama_penerima' => $request->nama,
                'id_provinsi' => $id_provinsi,
                'nama_prov' => $nama_provinsi,
                'id_kota' => $id_kota,
                'nama_kota' => $nama_kota,
                'kode_pos' => $request->pos,
                'alamat' => $request->alamat,

            ]);

            return to_route('keranjang.show', $id_keranjang)->with('success', 'Berhasil Menambahkan Alamat Pengiriman');
        }

        return to_route('keranjang.show', $id_keranjang)->with('error', 'Kapasitas Pengisian Alamat Maximal Hanya 3');
    }
}
