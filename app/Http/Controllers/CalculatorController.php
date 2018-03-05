<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    private $dummywords;

    public function __construct ()
    {
        $this->dummywords = ['kosong','satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh',
                             'sebelas','dua belas','tiga belas','empat belas','lima belas','enam belas','tujuh belas',
                             'delapan belas','sembilan belas','dua puluh'];
    }

    public function index ()
    {
        $returnVal = '';
        return view('welcome',compact('returnVal'));
    }

    public function count (Request $request)
    {
        $operator = $request->input('operator');
        $val1 = $request->input('val1');
        $val2 = $request->input('val2');

        $val1 = $this->convertToInt($val1);
        $val2 = $this->convertToInt($val2);
        switch ($operator) {
            case 'tambah':
                $returnVal = $val1 + $val2;
                break;
            case 'kurang':
                $returnVal = $val1 - $val2;
                break;
            case 'kali':
                $returnVal = $val1 * $val2;
                break;

            default:
                return "Sorry No command found";
        }

        $data = [
            'val1' => $this->converToWord($val1),
            'val2' => $this->converToWord($val2),
            'operator' => $operator
        ];

        $returnVal = $this->converToWord($returnVal);
        return view('welcome',compact('returnVal','data'));
    }


    private function convertToInt ($val)
    {
        foreach ($this->dummywords as $key => $dummyword) {
            if ($dummyword == $val) {
                return $key;
            }
        }
    }

    private function converToWord ($val)
    {

        foreach ($this->dummywords as $key => $dummyword) {
            if ($key == $val) {
                return $dummyword;
            }
        }
    }
}