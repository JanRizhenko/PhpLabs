<?php
function func($x,$y)
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $x = floatval($_POST["x"]);
        $y = floatval($_POST["y"]);

        function factorial($n)
        {
            if ($n < 0) return "Невизначено";
            if ($n == 0) return 1;
            $fact = 1;
            for ($i = 1; $i <= $n; $i++) {
                $fact *= $i;
            }
            return $fact;
        }

        function my_tg($x)
        {
            return sin($x) / cos($x);
        }

        $xy = pow($x, $y);
        $x_factorial = factorial($x);
        $my_tg_x = number_format(my_tg($x), 3);
        $sin_x = number_format(sin($x), 3);
        $cos_x = number_format(cos($x), 3);
        $tg_x = number_format(tan($x), 3);

        echo "<table>
            <tr>
                <th>x^y</th>
                <th>x!</th>
                <th>my_tg(x)</th>
                <th>sin(x)</th>
                <th>cos(x)</th>
                <th>tg(x)</th>
            </tr>
            <tr>
                <td>$xy</td>
                <td>$x_factorial</td>
                <td>$my_tg_x</td>
                <td>$sin_x</td>
                <td>$cos_x</td>
                <td>$tg_x</td>
            </tr>
          </table>";
    }
}
?>
