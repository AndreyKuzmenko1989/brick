<html>
<title>Задание №2</title>
<body>
<form method="post">
    <input name="string" required>
    <button type="submit">Проверить</button>

</form>
</body>
</html>
<?php
if (isset($_POST['string'])) {
    echo check($_POST['string']) ? 'true' : 'false';
}
function check($string)
{
    $len = strlen($string);
    $stack = [];
    for ($i = 0; $i < $len; $i++) {
        $simbol = $string[$i];
        if ($simbol == '{' || $simbol == '(' || $simbol == '[') {
            $stack[] = $simbol;
        } elseif ($simbol == '}' || $simbol == ')' || $simbol == ']') {
            if (!$last = array_pop($stack))
                return false;
            if ($simbol == '}' && $last != '{') {
                return false;
            } elseif ($simbol === ')' && $last != '(') {
                return false;
            } elseif ($simbol === ']' && $last != '[') {
                return false;
            }
        }
    }
    return count($stack) === 0;
}