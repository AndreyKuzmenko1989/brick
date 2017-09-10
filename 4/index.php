<html>
<link href="../css/main.css" rel="stylesheet">
<title>Задание №4</title>
<body>
<div class="container">
    <p class="formula">
        a*x<sup>2</sup> + b*x + c = 0
    </p>
    <form>
        <p class="variable">
            <input id="a" required><span> a </span>
        </p>
        <p class="variable">
            <input id="b" required><span> b </span>
        </p>
        <p class="variable">
            <input id="c" required><span> c </span>
        </p>
        <p class="variable">
            <button id="button" type="button">Высчитать</button>
        </p>
    </form>
    <p class="variable">
        <span id="result-span">
        <span id="x1" class="x">x<sub>1</sub> = <span id="x1-result"></span> </span><br>
        <span id="x2" class="x">x<sub>2</sub> =<span id="x2-result"></span> </span><br>
        </span>
        <span class="error"></span>
    </p>
</div>
</body>
</html>
<script>
    button.onclick = function () {
        a = document.getElementById('a').value;
        b = document.getElementById('b').value;
        c = document.getElementById('c').value;
        error = document.getElementsByClassName('error');
        error = error[0];
        error.innerText = "";
        resultSpan = document.getElementById('result-span');
        resultSpan.style.display = 'none';
        if (a != '' && b != '' && c != '') {
            if(/[^-?[0-9]/.test(a)){
                error.innerText = "введите в переменную A число пожалуйста";
                return;
            }
            if(/[^-?[0-9]/.test(b)){
                error.innerText = "введите в переменную B число пожалуйста";
                return;
            }
            if(/[^-?[0-9]/.test(c)){
                error.innerText = "введите в переменную C число пожалуйста";
                return;
            }
            if (a == 0 && b == 0) {
                error.innerText = "Х может быть любым числом!";
                return;
            }
            if ((b * b - 4 * a * c) < 0) {
                error.innerText = "Дескрименант меньше 0 ,решений нет!";
                return;
            }
            x1Span = document.getElementById('x1-result');
            x2Span = document.getElementById('x2-result');
            resultSpan.style.display = 'block';
            if (a == 0) {
                x1 = -c / b;
                x1Span.innerHTML = x1;
                x2Span.innerHTML = x1;
                return;
            }
            x1 = (-b + Math.sqrt(b * b - 4 * a * c)) / (2 * a);
            x2 = (-b - Math.sqrt(b * b - 4 * a * c)) / (2 * a);
            x1Span = document.getElementById('x1-result');
            x2Span = document.getElementById('x2-result');
            if (x1 == x2) {
                x1Span.innerHTML = x1;
                x2Span.innerHTML = x1;
                resultSpan.style.display = 'block';
                return;
             }
            else {
                x1Span = document.getElementById('x1-result');
                x2Span = document.getElementById('x2-result');
                x1Span.innerHTML = x1;
                x2Span.innerHTML = x2;
                resultSpan.style.display = 'block';
                return;
            }

        }
        error.innerText = "введите значения для всех переменных";
    };
</script>
