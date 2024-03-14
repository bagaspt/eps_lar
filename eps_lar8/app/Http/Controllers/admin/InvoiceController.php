<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Member;
use App\Models\User;
use App\Models\Shop;
use App\Models\CompleteCartShop;

class InvoiceController extends Controller
{
    public function list_inv()
    {
        $datainv = Invoice::with('User')->get();
        return view('admin.invoice.index', ['datainv' => $datainv]);
    }

    public function inv_cancelled()
    {
        // Ambil data invoice yang dibatalkan dari database
        $cancelledInvoices = Invoice::where('status', 'cancel')->latest('id')->get();

        // Kirim data invoice yang dibatalkan ke tampilan
        return view('admin.invoice.invoice-cancelled', ['cancelledInvoices' => $cancelledInvoices]);
    }

    public function detail($id)
    {
        $invoice = Invoice::findOrFail($id);
        $member = Member::where('id', $invoice->id_user)->firstOrFail();
        $cartshop = CompleteCartShop::where('id_cart', $invoice->id)->firstOrFail();
        $shop = Shop::where('id', $cartshop->id_shop)->firstOrFail();

        // mengambil data yang diperlukan saja
        $invoiceData = $invoice->only('invoice');
        $memberData = $member->only('nama');
        $shopData = $shop->only('name');


        return response()->json(['invoice' => $invoiceData, 'member' => $memberData,'shop' => $shopData]);
    }

}