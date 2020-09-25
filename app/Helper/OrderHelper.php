<?php

namespace App\Helper;

use App\Models\Order;

abstract class OrderHelper
{
    /**
     * Generate order ref
     *
     * @return string
     */
    public static function generateOrderRef(): string
    {
        $startDate = date("Y-m-01");
        $endDate = date("Y-m-t");

        $orders = Order::whereBetween('order_time', [$startDate, $endDate])->get();
        $totalOrder = count($orders);
        $currentOrder = sprintf("%02d", $totalOrder + 1);

        $orderRef = sprintf("%s-%s%s%s", $currentOrder, date("d"), date("m"), date('y'));

        return $orderRef;
    }
}