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
                    return self::jumlah($number - 10) . ' belas';

                case $number < 100:
                    return self::jumlah($number / 10) . ' puluh ' . self::jumlah($number % 10);

                case $number < 200:
                    return 'seratus ' . self::jumlah($number - 100);

                case $number < 1000:
                    return self::jumlah($number / 100) . ' ratus ' . self::jumlah($number % 100);

                case $number < 2000:
                    return 'seribu ' . self::jumlah($number - 1000);

                case $number < 1000000:
                    return self::jumlah($number / 1000) . ' ribu ' . self::jumlah($number % 1000);

                case $number < 1000000000:
                    return self::jumlah($number / 1000000) . ' juta ' . self::jumlah($number % 1000000);

                case $number < 1000000000000:
                    return self::jumlah($number / 1000000000) . ' milyar ' . self::jumlah($number % 1000000000);

                case $number < 1000000000000000:
                    return self::jumlah($number / 1000000000000) . ' trilyun ' . self::jumlah($number % 1000000000000);
            }
        });

        return trim(($value < 0 ? 'minus ' : '') . $result);
    }
}
