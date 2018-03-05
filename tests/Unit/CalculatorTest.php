<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CalculatorTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/');
        $response->assertViewIs('welcome');
    }

    public function testTambah ()
    {
        $operator = 'tambah';
        $val1 = 'dua';
        $val2 = 'sebelas';

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

        $returnVal = $this->converToWord($returnVal);
        dd($returnVal);

    }

    private function convertToInt ($val)
    {
        $dummywords = ['kosong','satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh',
                             'sebelas','dua belas','tiga belas','empat belas','lima belas','enam belas','tujuh belas',
                             'delapan belas','sembilan belas','dua puluh'];
        foreach ($dummywords as $key => $dummyword) {
            if ($dummyword == $val) {
                return $key;
            }
        }
    }

    private function converToWord ($val)
    {
        $dummywords = ['kosong','satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh',
                       'sebelas','dua belas','tiga belas','empat belas','lima belas','enam belas','tujuh belas',
                       'delapan belas','sembilan belas','dua puluh'];
        foreach ($dummywords as $key => $dummyword) {
            if ($key == $val) {
                return $dummyword;
            }
        }
    }
}
