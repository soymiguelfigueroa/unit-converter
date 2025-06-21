<?php
    $value = filter_input(type: INPUT_POST, var_name: 'value');
    $from = filter_input(type: INPUT_POST, var_name: 'from');
    $to = filter_input(type: INPUT_POST, var_name: 'to');
    $result = null;
    switch ($from) {
        case 'mm':
            $equivalent = [
                'mm' => 1,
                'cm' => 10,
                'm' => 1000,
                'km' => 1e+6,
                'in' => 25.4,
                'ft' => 304.8,
                'yd' => 914.4,
                'mi' => 1.609e+6,
            ];
            $result = $value / $equivalent[$to];
            break;

        case 'cm':
            $equivalent = [
                'mm' => 10,
                'cm' => 1,
                'm' => 100,
                'km' => 100000,
                'in' => 2.54,
                'ft' => 30.48,
                'yd' => 91.44,
                'mi' => 160900,
            ];
            $result = ($to == 'mm') ? $value * $equivalent[$to] : $value / $equivalent[$to];
            break;

        case 'm':
            $equivalent = [
                'mm' => 1000,
                'cm' => 100,
                'm' => 1,
                'km' => 1000,
                'in' => 39.37,
                'ft' => 3.281,
                'yd' => 1.094,
                'mi' => 1609,
            ];
            $result = (in_array($to, ['mm', 'cm', 'in', 'ft', 'yd'])) ? $value * $equivalent[$to] : $value / $equivalent[$to];
            break;

        case 'km':
            $equivalent = [
                'mm' => 1e+6,
                'cm' => 100000,
                'm' => 1000,
                'km' => 1,
                'in' => 39370,
                'ft' => 3281,
                'yd' => 1094,
                'mi' => 1.609,
            ];
            $result = (in_array($to, ['mm', 'cm', 'm', 'in', 'ft', 'yd'])) ? $value * $equivalent[$to] : $value / $equivalent;
            break;

        case 'in':
            $equivalent = [
                'mm' => 25.4,
                'cm' => 2.54,
                'm' => 39.37,
                'km' => 39370,
                'in' => 1,
                'ft' => 12,
                'yd' => 36,
                'mi' => 1.57828e-5,
            ];
            $result = (in_array($to, ['mm', 'cm', 'm', 'in'])) ? $value * $equivalent[$to] : $value / $equivalent;
            break;

        case 'ft':
            $equivalent = [
                'mm' => 304.8,
                'cm' => 30.48,
                'm' => 3.281,
                'km' => 3281,
                'in' => 12,
                'ft' => 12,
                'yd' => 36,
                'mi' => 63360,
            ];
            $result = (in_array($to, ['mm', 'cm', 'in'])) ? $value * $equivalent[$to] : $value / $equivalent;
            break;

        case 'yd':
            $equivalent = [
                'mm' => 914.4,
                'cm' => 91.44,
                'm' => 1.094,
                'km' => 1094,
                'in' => 36,
                'ft' => 3,
                'yd' => 1,
                'mi' => 1760,
            ];
            $result = (in_array($to, ['mm', 'cm', 'in', 'ft'])) ? $value * $equivalent[$to] : $value / $equivalent;
            break;

        case 'mi':
            $equivalent = [
                'mm' => 1.609e+6,
                'cm' => 160900,
                'm' => 1609,
                'km' => 1.609,
                'in' => 63360,
                'ft' => 5280,
                'yd' => 1760,
                'mi' => 1,
            ];
            $result = (in_array($to, ['mm', 'cm', 'm', 'km', 'in', 'ft', 'yd'])) ? $value * $equivalent[$to] : $value / $equivalent;
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Converter</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="max-w-lg border-2 my-4 mx-auto p-4 rounded-sm">
        <h1 class="text-2xl font-bold">Unit converter</h1>

        <div class="text-sm font-medium text-center text-black-500 border-b border-black-200 dark:text-black-400 dark:border-black-700">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <a href="#" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg dark:text-blue-500 dark:border-blue-500">Length</a>
                </li>
                <li class="me-2">
                    <a href="weight.php" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-black-600 hover:border-black-300 dark:hover:text-black-300" aria-current="page">Weight</a>
                </li>
                <li class="me-2">
                    <a href="temperature.php" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-black-600 hover:border-black-300 dark:hover:text-black-300">Temperature</a>
                </li>
            </ul>
        </div>

        <?php if ($result) : ?>
            <h2 class="text-xl font-semibold block my-4">Result of your calculation</h2>
            <span class="block text-2xl font-bold my-4"><?= sprintf("%d %s = %f %s", $value, $from, $result, $to); ?></span>
            <a href="index.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset</a>
        <?php else: ?>
            <div>
                <form action="index.php" method="post">
                    <div class="my-4">
                        <label for="value" class="block mb-2 text-sm font-medium text-gray-900">Enter the value to convert</label>
                        <input type="text" id="value" name="value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                    </div>

                    <div class="my-4">
                        <label for="from" class="block mb-2 text-sm font-medium text-gray-900">Unit to convert from</label>
                        <select id="from" name="from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option selected></option>
                            <option value="mm">millimeter</option>
                            <option value="cm">centimeter</option>
                            <option value="m">meter</option>
                            <option value="km">kilometer</option>
                            <option value="in">inch</option>
                            <option value="ft">foot</option>
                            <option value="yd">yard</option>
                            <option value="mi">mile</option>
                        </select>
                    </div>

                    <div class="my-4">
                        <label for="to" class="block mb-2 text-sm font-medium text-gray-900">Unit to convert to</label>
                        <select id="to" name="to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option selected></option>
                            <option value="mm">millimeter</option>
                            <option value="cm">centimeter</option>
                            <option value="m">meter</option>
                            <option value="km">kilometer</option>
                            <option value="in">inch</option>
                            <option value="ft">foot</option>
                            <option value="yd">yard</option>
                            <option value="mi">mile</option>
                        </select>
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Convert</button>
                </form>
            </div>
        <?php endif ?>
    </div>
</body>
</html>