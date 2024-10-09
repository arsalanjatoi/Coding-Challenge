<?php
class Solution
{

    function __construct()
    {
?>
        <style>
            input {
                height: 40px;
                font-size: 20px;
                width: 70%;
            }

            button {
                height: 40px;
                margin: 0;
                border: none;
                background: pink;
                color: black;
                font-size: 20px;
                font-weight: 600;
                cursor: pointer;
            }

            .green {
                color: lightgreen;
            }
            .red{
                color: red;
            }
        </style>
<?php
        echo '<div class="main">
        <h1>Bracket Validator</h1>
    <p>Please Enter the brackets in way so that it can be checked for invalid 
        or valid this will check for the opening and closing brackets pair.
        </p>
         <p>
      Example: ()()[]{} for valid
        </p>
          <p>
        Example: ()()[ for in-valid
    
        </p>
        <form action="" method="post">
        <input type="text" name="string_of_brackets" value="' . $_REQUEST['string_of_brackets'] . '" placeholder="{()}{{[]}}">
        <button type="submit">Check Valid/In-Valid</button>
    </form></div>';
    }

    function is_valid($s)
    {

        if (strlen($s) >= 1 and strlen($s) < 104) {
            $arr = str_split($s);
            return ($this->check_count($arr) ? $this->check_positions($arr) : false);
        }
    } //is_valid method end

    public function check_count($arr)
    {


        $co = 0;
        $cc = 0;
        $mo = 0;
        $mc = 0;
        $bo = 0;
        $bc = 0;
        foreach ($arr as $char) {
            switch ($char) {

                case "(":
                    $co++;
                    break;

                case ")":
                    $cc++;
                    break;

                case "{":
                    $mo++;
                    break;

                case "}":
                    $mc++;
                    break;

                case "[":
                    $bo++;
                    break;

                case "]":
                    $bc++;
                    break;
            } //switch-end

        } //foreach-end

        if ($co == $cc and $mo == $mc and $bo == $bc) {
            return true;
        } else {
            return false;
        }
    } //check-case1 method-end



    public function check_positions($arr)
    {
        $total_pair = count($arr) / 2;
        $tmp = [];
        foreach ($arr as $i => $chr) {
            switch ($chr) {

                case "(":
                    $this->check_for_closing_postion($arr, $tmp, $total_pair, $i, ')', $chr);
                    break;

                case "{":
                    $this->check_for_closing_postion($arr, $tmp, $total_pair, $i, '}', $chr);
                    break;

                case "[":
                    $this->check_for_closing_postion($arr, $tmp, $total_pair, $i, ']', $chr);
                    break;
            } //switch-end

        } //foreach end

        $findDuplicate = array_diff_assoc($tmp, array_unique($tmp));

        if ($total_pair == 0 and count($findDuplicate) == 0) {
            return true;
        } else {
            return false;
        }
    } //check_positions end


    public function check_for_closing_postion($arr, &$tmp, &$total_pair, &$i, $chr, $chr_case)
    {

        $fs = 0;
        foreach ($arr as $s => $sub_chr) {
            if ($sub_chr == $chr_case and $s != $i and $s > $i) {
                $fs++;
            }

            if ($sub_chr == $chr and $s > $i) {

                if ($fs == 0) {
                    $v = $s - $i;
                    if ($v % 2 != 0) {
                        $total_pair--;
                        array_push($tmp, $s);
                        break;
                    } //if-end
                } else {
                    $fs--;
                } //if-end

            } //if-end
        } //foreach-sub end

    } // method check_for_closing_postion end

}

$so = new Solution();
// $str = "{}{[}{}[]]";
if ($_REQUEST['string_of_brackets'] != '') {
    $str = $_REQUEST['string_of_brackets'];
    echo $so->is_valid($str) ? '<h2 class="green">Valid</h2>' : '<h2 class="red" >In_Valid</h2>';
}
