<?php
class CCommon
{
    public function __construct()
    {
    }
    //Number To Word Converter
    public function NumberToWord($number)
    {
        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' taka ';
        $paisa     = ' paisa ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            100000              => 'lac',
            10000000            => 'crore'
        );
        if (!is_numeric($number))
        {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX)
        {
            // overflow
            trigger_error('convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, cE_USER_WARNING);
            return false;
        }

        if ($number < 0)
        {
            return $negative . NumberToWord(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false)
        {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true)
        {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units)
                {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder)
                {
                    $string .= ' ' .$this->NumberToWord($remainder);
                }
                break;
            case $number < 100000:
                $thousand  = $number / 1000;
                $remainder = $number % 1000;
                $string =$this->NumberToWord((int)$thousand). ' ' . $dictionary[1000];
                if ($remainder)
                {
                    $string .= ' '.$this->NumberToWord($remainder);
                }
                break;
            case $number < 10000000:
                $lac  = $number / 100000;
                $remainder = $number % 100000;
                $string = $this->NumberToWord((int)$lac). ' ' . $dictionary[100000];
                if ($remainder)
                {
                    $string .= ' ' .$this->NumberToWord($remainder);
                }
                break;
            case $number > 10000000:
                $crore  = $number / 10000000;
                $remainder = $number % 10000000;
                $string = $this->NumberToWord((int)$crore). ' ' . $dictionary[10000000];
                if ($remainder)
                {
                    $string .= ' ' .$this->NumberToWord($remainder);
                }
                break;
            default:
                $baseUnit = pow(10000000, floor(log($number, 10000000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->NumberToWord($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder)
                {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->NumberToWord($remainder);
                }
                break;
        }

        if (is_numeric($fraction))
        {
            $string .= $decimal;

            $words =$this->NumberToWord((int)$fraction);

            $string .= $conjunction . $words . $paisa;
        }
        return $string;
    }

    function makecomma($input)
    {
        if(strlen($input)<=2)
        {
            return $input;
        }
        $length=substr($input,0,strlen($input)-2);
        $formatted_input = $this->makecomma($length).",".substr($input,-2);
        return $formatted_input;
    }

    function number_format($num)
    {
        return number_format($num,2,'.',',');
    }



    public function ReadAllSemester($Value,$Display,$Selected)
    {
        $oAccount=new CAccount();
        $sql="SELECT * FROM semister WHERE IsActive=1 ORDER BY Name";
        $oResult=$oAccount->SqlQuery($sql);
        if($oResult->IsSucess)
        {
            for($i=0;$i<$oResult->num_rows;$i++)
            {
                if($oResult->rows[$i][$Value]==$Selected)
                    echo "<option value=\"".$oResult->rows[$i][$Value]."\" selected=\"selected\">".$oResult->rows[$i][$Display]."</option>";
                else echo "<option value=\"".$oResult->rows[$i][$Value]."\">".$oResult->rows[$i][$Display]."</option>";
            }
        }
    }

    public function ReadAllProgram($Value,$Display,$Selected)
    {
        $oAccount=new CAccount();
        $sql="SELECT * FROM program ORDER BY Name";
        $oResult=$oAccount->SqlQuery($sql);
        if($oResult->IsSucess)
        {
            for($i=0;$i<$oResult->num_rows;$i++)
            {
                if($oResult->rows[$i][$Value]==$Selected)
                    echo "<option value=\"".$oResult->rows[$i][$Value]."\" selected=\"selected\">".$oResult->rows[$i][$Display]."</option>";
                else echo "<option value=\"".$oResult->rows[$i][$Value]."\">".$oResult->rows[$i][$Display]."</option>";
            }
        }
    }

    public function ReadAllSelectedOption($Sql,$Value,$Display,$Selected)
    {
        $disp = explode("^",$Display);
        $oAccount=new CAccount();
        $oResult=$oAccount->SqlQuery($Sql);
        if($oResult->IsSucess)
        {
            for($i=0;$i<$oResult->num_rows;$i++)
            {
                if($oResult->rows[$i][$Value]==$Selected)
                {
                    echo "<option value='".$oResult->rows[$i][$Value]."' selected='selected'>";
                    for($j=0;$j<count($disp);$j++)
                    {
                        if($j) echo "-";
                        echo $oResult->rows[$i][$disp[$j]];
                    }
                    echo"</option>";
                }
                else
                {
                    echo "<option value='".$oResult->rows[$i][$Value]."'>";
                    for($j=0;$j<count($disp);$j++)
                    {
                        if($j) echo "-";
                        echo $oResult->rows[$i][$disp[$j]];
                    }
                    echo"</option>";
                }
            }
        }
    }



  

};

?>