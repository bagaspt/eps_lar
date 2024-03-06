<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Member;

class ShopController extends Controller
{
    public function shop()
    {
        $datashop = Shop::where('status', '!=', 'delete')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('admin.shop.index', ['datashop' => $datashop]);
    }

    public function detail($id)
    {
        $shop = Shop::findOrFail($id);
        $member = Member::where('id', $shop->id_user)->firstOrFail();

        return response()->json([ 'shop' => $shop, 'member' => $member]);
    }

    public function updateStatus($id)
    {
        try {
            $shop = Shop::findOrFail($id);
            // Ubah status anggota berdasarkan status awal
            $newStatus = $shop->status === 'active' ? 'inactive' : 'active';
            
            $shop->update(['status' => $newStatus]);
            
            return response()->json(['message' => 'Status anggota berhasil diubah']);
        } catch (\Exception $e) {
            return response()->json(['error' => $newStatus ], 500);
        }
    }
    
    public function updateTypeUp($id)
{
    try {
        $shop = Shop::findOrFail($id);
        
        // Mengatur perubahan tipe toko berdasarkan arah yang diberikan
        $newType = '';
        switch ($shop->type) {
            case 'silver':
                $newType = 'gold';
                break;
            case 'gold':
                $newType = 'platinum';
                break;
            case 'platinum':
                $newType = 'trusted_seller';
                break;
            case 'trusted_seller':
                // Jika sudah trusted_seller, tidak bisa naik lagi
                return response()->json(['message' => 'Teratas']);
                break;
            default:
                // Tindakan default jika tipe tidak cocok dengan salah satu kondisi di atas
                break;
        }
        
        // Jika $newType tidak kosong, update tipe toko
        if ($newType !== '') {
            $shop->update(['type' => $newType]);
            return response()->json(['message' => $newType]);
        } else {
            // Tindakan jika tidak ada perubahan tipe yang dilakukan
            return response()->json(['message' => 'Tidak ada perubahan tipe yang dilakukan.']);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function updateTypeDown($id)
{
    try {
        $shop = Shop::findOrFail($id);
        
        // Mengatur perubahan tipe toko berdasarkan arah yang diberikan
        $newType = '';
        switch ($shop->type) {
            case 'silver':
                // Jika sudah silver, tidak bisa turun lagi
                return response()->json(['message' => 'Terbawah']);
                break;
            case 'gold':
                $newType = 'silver';
                break;
            case 'platinum':
                $newType = 'gold';
                break;
            case 'trusted_seller':
                $newType = 'platinum';
                break;
            default:
                // Tindakan default jika tipe tidak cocok dengan salah satu kondisi di atas
                break;
        }
        
        // Jika $newType tidak kosong, update tipe toko
        if ($newType !== '') {
            $shop->update(['type' => $newType]);
            return response()->json(['message' => $newType]);
        } else {
            // Tindakan jika tidak ada perubahan tipe yang dilakukan
            return response()->json(['message' => 'Tidak ada perubahan tipe yang dilakukan.']);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    public function delete($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->update(['status' => 'delete']);
        $member = Member::where('id', $shop->id_user)->firstOrFail();
        $member->update(['member_status' => 'delete', 'registered_member' => 0]);
        return redirect()->back()->with('success', 'Anggota berhasil dihapus.');
    }
}
