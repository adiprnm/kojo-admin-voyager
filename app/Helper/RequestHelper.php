<?php

namespace App\Helper;

use App\Model\Request;

abstract class RequestHelper
{
    /**
     * Generate purchase request code
     *
     * @return string
     */
    public static function generatePurchaseRequestCode(string $endDate = NULL): string
    {
        $time = strtotime($endDate ?? "now");

        $startDate = date("Y-m-d 00:00:00", $time);
        $endDate = date("Y-m-d 23:59:59", $time);

        $requests = Request::where('category', Request::CATEGORY_PURCHASE)
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        $totalRequest = count($requests);
        $currentRequest = sprintf("%02d", $totalRequest + 1);

        $purchaseRequestCode = sprintf("PR-%s%s%s%s", $currentRequest, date("d", $time), date("m", $time), date('y', $time));

        return $purchaseRequestCode;
    }

    /**
     * Generate expenditure request code
     *
     * @return string
     */
    public static function generateExpenditureRequestCode(string $endDate = NULL): string
    {
        $time = strtotime($endDate ?? "now");

        $startDate = date("Y-m-d 00:00:00", $time);
        $endDate = date("Y-m-d 23:59:59", $time);

        $requests = Request::where('category', Request::CATEGORY_EXPENDITURE)
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        $totalRequest = count($requests);
        $currentRequest = sprintf("%02d", $totalRequest + 1);

        $expenditureRequestCode = sprintf("ER-%s%s%s%s", $currentRequest, date("d", $time), date("m", $time), date('y', $time));

        return $expenditureRequestCode;
    }
}