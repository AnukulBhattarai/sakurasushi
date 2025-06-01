<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_no',
        'student_id',
        'program_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    protected static function booted()
    {
        static::creating(function ($invoice) {
            if (!$invoice->invoice_no) {
                $invoice->invoice_no = self::generateInvoiceNo();
            }
        });
    }

    public static function generateInvoiceNo()
    {
        $lastInvoice = self::latest('id')->first();

        $nextNumber = $lastInvoice
            ? ((int) str_replace('INV-', '', $lastInvoice->invoice_no)) + 1
            : 1;

        return 'INV-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
    }
}
