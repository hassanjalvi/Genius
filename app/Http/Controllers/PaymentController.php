<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function managePayments()
    {
        $payment = Payment::with('user', 'course')
            ->get()
            ->map(function ($payment) {
                // Format the created_at date
                $payment->date = Carbon::parse($payment->created_at)->format('Y-m-d'); // Example format: '2025-04-01'
                return $payment;
            });
        return view('Admin.managepayments', compact('payment'));
    }

    public function deletePayment($id)
    {

        $course = Payment::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Payment deleted successfully!');

    }
    public function updatePayment(Request $request, $id)
    {
        $paymnet = Payment::where('id', $id)->first();

        $paymnet->update([
            'status' => $request->status ?? $paymnet->name,

        ]);




        return redirect()->back()->with('success', 'Payment updated successfully!');

    }
  

}
