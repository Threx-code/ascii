<?php

namespace App\Services;

class AsciiService
{

    public static function ascii_converter($string)
    {
        return self::split_string($string);
    }

    // split the string passed and passed it to convert_to_binary
    /**
     * split_string
     *
     * @param  mixed $string
     * @return void
     */
    private static function split_string($string)
    {
        $strings = str_split(($string));
        $concat = $splitted = "";
        $six = 6;

        foreach ($strings as $str) {
            $concat .= self::convert_to_binary($str);
        }

        $data = str_split($concat, 6);

        foreach ($data as $d) {
            switch (strlen($d)) {
                case 5:
                    $d = $d . "0";
                    break;
                case 4:
                    $d = $d . "00";
                    break;
                case 3:
                    $d = $d . "000";
                    break;
                case 2:
                    $d = $d . "0000";
                    break;
                case 1:
                    $d = $d . "00000";
                    break;
                default:
                    $d = $d;
            }

            $splitted .= self::decimal_to_base64(self::binaray_to_decimal($d));
        }
        return $splitted;
    }


    /**
     * convert_to_binary
     *
     * @param  mixed $value
     * @return void
     */
    private static function convert_to_binary($value)
    {
        $array = [
            "NUL" => "00000000", "SOH" => "00000001", "STX" => "00000010", "ETX" => "00000011", "EOT" => "00000100", "ENQ" => "00000101", "ACK" => "00000110", "BEL" => "00000111", "BS"  => "00001000", "HT"  => "00001001", "LF"  => "00001010", "VT" => "00001011", "FF" => "00001100", "CR" => "00001101", "SO" => "00001110", "SI" => "00001111", "DLE" => "00010000", "DC1" => "00010001", "DC2" => "00010010", "DC3" => "00010011", "DC4" => "00010100", "NAK" => "00010101", "SYN" => "00010110", "ETB" => "00010111", "CAN" => "00011000", "EM" => "00011001", "SUB" => "00011010", "ESC" => "00011011", "FS" => "00011100", "GS" => "00011101", "RS" => "00011110", "US" => "00011111", "!" => "00100001", " "  => "00100000", "\"" => "00100010", "#" => "00100011", "$" => "00100100", "%" => "00100101", "&" => "00100110", "'" => "00100111", "(" => "00101000", ")" => "00101001", "*" => "00101010", "+" => "00101011", "," => "00101100", "-" => "00101101", "." => "00101110", "/" => "00101111", "0" => "00110000", "1" => "00110001", "2" => "00110010", "3" => "00110011", "4" => "00110100", "5" => "00110101", "6" => "00110110", "7" => "00110111", "8" => "00111000", "9" => "00111001", ":" => "00111010", ";" => "00111011", "<" => "00111100", "=" => "00111101", ">" => "00111110", "?" => "00111111", "@" => "01000000", "A" => "01000001", "B" => "01000010", "C" => "01000011", "D" => "01000100", "E" => "01000101", "F" => "01000110", "G" => "01000111", "H" => "01001000", "I" => "01001001", "J" => "01001010", "K" => "01001011", "L" => "01001100", "M" => "01001101", "N" => "01001110", "O" => "01001111", "P" => "01010000", "Q" => "01010001", "R" => "01010010", "S" => "01010011", "T" => "01010100", "U" => "01010101", "V" => "01010110", "W" => "01010111", "X" => "01011000", "Y" => "01011001", "Z" => "01011010", "[" => "01011011", "\\" => "01011100", "]" => "01011101", "^" => "01011110", "_" => "01011111", "`" => "01100000", "a" => "01100001", "b" => "01100010", "c" => "01100011", "d" => "01100100", "e" => "01100101", "f" => "01100110", "g" => "01100111", "h" => "01101000", "i" => "01101001", "j" => "01101010", "k" => "01101011", "l" => "01101100", "m" => "01101101", "n" => "01101110", "o" => "01101111", "p" => "01110000", "q" => "01110001", "r" => "01110010", "s" => "01110011", "t" => "01110100", "u" => "01110101", "v" => "01110110", "w" => "01110111", "x" => "01111000", "y" => "01111001", "z" => "01111010", "{" => "01111011", "|" => "01111100", "}" => "01111101", "~" => "01111110", "DEL" =>  "01111111", "???" => "10000000", "???" => "10000010", "??" => "10000011", "???" => "10000100", "???" => "10000101", "???" => "10000110", "???" => "10000111", "??" => "10001000", "???" => "10001001", "??" => "10001010", "???" => "10001011", "??" => "10001100", "??" => "10001110", "???" => "10010001", "???" => "10010010", "???" => "10010011", "???" => "10010100", "???" => "10010101", "???" => "10010110", "???" => "10010111", "??" => "10011000", "???" => "10011001", "??" => "10011010", "???" => "10011011", "??" => "10011100", "??" => "10011110", "??" => "10011111", "??" => "10100001", "??" => "10100010", "??" => "10100011", "??" => "10100100", "??" => "10100101", "??" => "10100110", "??" => "10100111", "??" => "10101000", "??" => "10101001", "??" => "10101010", "??" => "10101011", "??" => "10101100", "??" => "10101110", "??" => "10101111", "??" => "10110000", "??" => "10110001", "??" => "10110010", "??" => "10110011", "??" => "10110100", "??" => "10110101", "??" => "10110110", "??" => "10110111", "??" => "10111000", "??" => "10111001", "??" => "10111010", "??" => "10111011", "??" => "10111100", "??" => "10111101", "??" => "10111110", "??" => "10111111", "??" => "11000000", "??" => "11000001", "??" => "11000010", "??" => "11000011", "??" => "11000100", "??" => "11000101", "??" => "11000110", "??" => "11000111", "??" => "11001000", "??" => "11001001", "??" => "11001010", "??" => "11001011", "??" => "11001100", "??" => "11001101", "??" => "11001110", "??" => "11001111", "??" => "11010000", "??" => "11010001", "??" => "11010010", "??" => "11010011", "??" => "11010100", "??" => "11010101", "??" => "11010110", "??" => "11010111", "??" => "11011000", "??" => "11011001", "??" => "11011010", "??" => "11011011", "??" => "11011100", "??" => "11011101", "??" => "11011110", "??" => "11011111", "??" => "11100000", "??" => "11100001", "??" => "11100010", "??" => "11100011", "??" => "11100100", "??" => "11100101", "??" => "11100110", "??" => "11100111", "??" => "11101000", "??" => "11101001", "??" => "11101010", "??" => "11101011", "??" => "11101100", "??" => "11101101", "??" => "11101110", "??" => "11101111", "??" => "11110000", "??" => "11110001", "??" => "11110010", "??" => "11110011", "??" => "11110100", "??" => "11110101", "??" => "11110110", "??" => "11110111", "??" => "11111000", "??" => "11111001", "??" =>  "11111010", "??" =>  "11111011", "??" =>  "11111100", "??" =>  "11111101", "??" =>  "11111110", "??" =>  "11111111",
        ];

        if (array_key_exists($value, $array)) {
            return str_replace($value, $array[$value], $value);
        }
    }




    /**
     * binaray_to_decimal
     *
     * @param  mixed $binary
     * @return void
     */
    private static function binaray_to_decimal($binary)
    {
        $array = [
            "000000" => "0", "000001" => "1", "000010" => "2", "000011" => "3", "000100" => "4", "000101" => "5", "000110" => "6", "000111" => "7", "001000" => "8", "001001" => "9", "001010" => "10", "001011" => "11", "001100" => "12", "001101" => "13", "001110" => "14", "001111" => "15", "010000" => "16", "010001" => "17", "010010" => "18", "010011" => "19", "010100" => "20", "010101" => "21", "010110" => "22", "010111" => "23", "011000" => "24", "011001" => "25", "011010" => "26", "011011" => "27", "011100" => "28", "011101" => "29", "011110" => "30", "011111" => "31", "100000" => "32", "100001" => "33", "100010" => "34", "100011" => "35", "100100" => "36", "100101" => "37", "100110" => "38", "100111" => "39", "101000" => "40", "101001" => "41", "101010" => "42", "101011" => "43", "101100" => "44", "101101" => "45", "101110" => "46", "101111" => "47", "110000" => "48", "110001" => "49", "110010" => "50", "110011" => "51", "110100" => "52", "110101" => "53", "110110" => "54", "110111" => "55", "111000" => "56", "111001" => "57", "111010" => "58", "111011" => "59", "111100" => "60", "111101" => "61", "111110" => "62", "111111" => "63",
        ];

        if (array_key_exists($binary, $array)) {
            return str_replace($binary, $array[$binary], $binary);
        }
    }



    /**
     * decimal_to_base64
     *
     * @param  mixed $decimal
     * @return void
     */
    private static function decimal_to_base64($decimal)
    {
        $array = [
            "0"    => "A", "1"    => "B", "2"    => "C", "3"    => "D", "4"    => "E", "5"    => "F", "6"    => "G", "7"    => "H", "8"    => "I", "9"    => "J", "10" =>    "K", "11" =>    "L", "12" =>    "M", "13" =>    "N", "14" =>    "O", "15" =>    "P", "16" =>    "Q", "17" =>    "R", "18" =>    "S", "19" =>    "T", "20" =>    "U", "21" =>    "V", "22" =>    "W", "23" =>    "X", "24" =>    "Y", "25" =>    "Z", "26" =>    "a", "27" =>    "b", "28" =>    "c", "29" =>    "d", "30" =>    "e", "31" =>    "f", "32" =>    "g", "33" =>    "h", "34" =>    "i", "35" =>    "j", "36" =>    "k", "37" =>    "l", "38" =>    "m", "39" =>    "n", "40" =>    "o", "41" =>    "p", "42" =>    "q", "43" =>    "r", "44" =>    "s", "45" =>    "t", "46" =>    "u", "47" =>    "v", "48" =>    "w", "49" =>    "x", "50" =>    "y", "51" =>    "z", "52" =>    "0", "53" =>    "1", "54" =>    "2", "55" =>    "3", "56" =>    "4", "57" =>    "5", "58" =>    "6", "59" =>    "7", "60" =>    "8", "61" =>    "9", "62" =>    "+", "63" =>    "/",
        ];

        if (array_key_exists($decimal, $array)) {
            return str_replace($decimal, $array[$decimal], $decimal);
        }
    }
}
