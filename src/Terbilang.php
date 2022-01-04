<?php

namespace Devajayantha\Support;

class Terbilang
{
    /**
     * Return the given value into readable number.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function jumlah($value): string
    {
        $result = value(function () use ($value) {
            $angka = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];

            $number = abs($value);

            switch (true) {
                case $number < 12:
                    return ' ' . $angka[$number];

                case $number < 20:
                    return terbilang($number - 10) . ' belas';

                case $number < 100:
                    return terbilang($number / 10) . ' puluh ' . terbilang($number % 10);

                case $number < 200:
                    return 'seratus ' . terbilang($number - 100);

                case $number < 1000:
                    return terbilang($number / 100) . ' ratus ' . terbilang($number % 100);

                case $number < 2000:
                    return 'seribu ' . terbilang($number - 1000);

                case $number < 1000000:
                    return terbilang($number / 1000) . ' ribu ' . terbilang($number % 1000);

                case $number < 1000000000:
                    return terbilang($number / 1000000) . ' juta ' . terbilang($number % 1000000);

                case $number < 1000000000000:
                    return terbilang($number / 1000000000) . ' milyar ' . terbilang($number % 1000000000);

                case $number < 1000000000000000:
                    return terbilang($number / 1000000000000) . ' trilyun ' . terbilang($number % 1000000000000);
            }
        });

        return trim(($value < 0 ? 'minus ' : '') . $result);
    }
}
