<?php

namespace App\Helper;

use App\Model\CashDisbursement;

abstract class DisbursementHelper
{
    /**
     * Generate cash disbursement code
     *
     * @param string $disbursementFor
     * @param string $endDate
     * @return void
     */
    public static function generateCashDisbursementCode(string $disbursementFor, string $endDate = NULL)
    {
        $time = strtotime($endDate ?? "now");

        $startDate = date("Y-m-d 00:00:00", $time);
        $endDate = date("Y-m-d 23:59:59", $time);

        $cashDisbursement = CashDisbursement::whereBetween('date', [$startDate, $endDate])->get();

        $total = count($cashDisbursement);
        $current = sprintf("%02d", $total + 1);

        $purchaseRequestCode = sprintf("D%s-%s-%s%s%s", $current, $disbursementFor, date("d", $time), date("m", $time), date('y', $time));

        return $purchaseRequestCode;
    }
}