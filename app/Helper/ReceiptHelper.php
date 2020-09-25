<?php

namespace App\Helper;

use App\Models\CashReceipt;

abstract class ReceiptHelper
{
    /**
     * Generate cash receipt on bank code
     *
     * @param string $receiptFor
     * @param string $orderRef
     * @return void
     */
    public static function generateCashReceiptCode(string $type, string $receiptFor, string $orderRef)
    {
        $startDate = date("Y-m-d 00:00:00");
        $endDate = date("Y-m-d 23:59:59");

        $type = strtoupper($type);

        $cashReceipt = CashReceipt::where('type', $type)
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        $current = sprintf("%02d", count($cashReceipt) + 1);

        if ($type == 'ON_HAND') {
            $type = 'CASH';
        } else {
            $type = 'BANK';
        }

        $cashReceiptOnBankCode = sprintf("REC-%s-%s-%s%s",
                                         $receiptFor,
                                         $type, 
                                         $current, 
                                         explode('-', $orderRef)[1]);

        return $cashReceiptOnBankCode;
    }
}