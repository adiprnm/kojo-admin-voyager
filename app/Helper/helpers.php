<?php

if ( !function_exists('formatIdr') ) {
    function formatIdr(float $value = NULL, int $decimal = 0): string
    {
        return 'Rp ' . number_format($value ?? 0, $decimal, ',', '.');
    }
}

if ( !function_exists('generateInvoiceCode') ) {
    function generateInvoiceCode(): string
    {
        $md5 = strtoupper(md5(microtime(true)));

        return 'INV-' . date("Ymd") . substr($md5, 0, 3);
    }
}

if ( !function_exists('formatDate') ) {
    function formatDate(string $date = NULL): string
    {
        $date = $date ?? date('Y-m-d');

        $months = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        $day = date("d", strtotime($date));
        $month = date("m", strtotime($date));
        $year = date("Y", strtotime($date));

        return "$day {$months[$month]} $year";
    }
}