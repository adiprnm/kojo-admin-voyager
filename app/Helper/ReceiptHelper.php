<?php

namespace App\Helper;

use App\Model\CashReceipt;

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

        switch ($type) {
            case 'BANK':
                $cashReceipt = CashReceipt::where('type', CashReceipt::TYPE_ON_BANK)
                    ->whereBetween('date', [$startDate, $endDate])
                    ->get();
                break;
            case 'CASH':
                $cashReceipt = CashReceipt::where('type', CashReceipt::TYPE_ON_HAND)
                    ->whereBetween('date', [$startDate, $endDate])
                    ->get();
                break;
        }

        $current = sprintf("%02d", count($cashReceipt) + 1);

        $cashReceiptOnBankCode = sprintf("REC-%s-%s-%s%s",
                                         $receiptFor,
                                         $type, 
                                         $current, 
                                         explode('-', $orderRef)[1]);

        return $cashReceiptOnBankCode;
    }
}