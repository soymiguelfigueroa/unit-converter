<?php
    $value = filter_input(type: INPUT_POST, var_name: 'value');
    $from = filter_input(type: INPUT_POST, var_name: 'from');
    $to = filter_input(type: INPUT_POST, var_name: 'to');
    $result = null;
    switch ($from) {
        case 'mg':
            $equivalent = [
                'mg' => 1,
                'g' => 1000,
                'kg' => 1e+6,
                'oz' => 28350,
                'lb' => 453600,
            ];
            $result = $value / $equivalent[$to];
            break;

        case 'g':
            $equivalent = [
                'mg' => 1000,
                'g' => 1,
                'kg' => 1000,
                'oz' => 28.35,
                'lb' => 453.6,
            ];
            $result = ($to == 'mg') ? $value * $equivalent[$to] : $value / $equivalent[$to];
            break;

        case 'kg':
            $equivalent = [
                'mg' => 1e+6,
                'g' => 1000,
                'kg' => 1,
                'oz' => 35.274,
                'lb' => 2.205,
            ];
            $result = (in_array($to, ['mg', 'g', 'oz', 'lb'])) ? $value * $equivalent[$to] : $value / $equivalent[$to];
            break;

        case 'oz':
            $equivalent = [
                'mg' => 28350,
                'g' => 28.35,
                'kg' => 35.274,
                'oz' => 1,
                'lb' => 16,
            ];
            $result = (in_array($to, ['mg', 'g'])) ? $value * $equivalent[$to] : $value / $equivalent;
            break;

        case 'lb':
            $equivalent = [
                'mg' => 453600,
                'g' => 453.6,
                'kg' => 2.205,
                'oz' => 16,
                'lb' => 1,
            ];
            $result = (in_array($to, ['mg', 'g', 'oz'])) ? $value * $equivalent[$to] : $value / $equivalent;
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
                    <a href="index.php" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-black-600 hover:border-black-300 dark:hover:text-black-300">Length</a>
                </li>
                <li class="me-2">
                    <a href="#" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg dark:text-blue-500 dark:border-blue-500" aria-current="page">Weight</a>
                </li>
                <li class="me-2">
                    <a href="temperature.php" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-black-600 hover:border-black-300 dark:hover:text-black-300">Temperature</a>
                </li>
            </ul>
        </div>

        <?php if ($result) : ?>
            <h2 class="text-xl font-semibold block my-4">Result of your calculation</h2>
            <span class="block text-2xl font-bold my-4"><?= sprintf("%d %s = %f %s", $value, $from, $result, $to); ?></span>
            <a href="weight.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset</a>
        <?php else: ?>
            <div>
                <form action="weight.php" method="post">
                    <div class="my-4">
                        <label for="value" class="block mb-2 text-sm font-medium text-gray-900">Enter the weight to convert</label>
                        <input type="text" id="value" name="value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                    </div>

                    <div class="my-4">
                        <label for="from" class="block mb-2 text-sm font-medium text-gray-900">Unit to convert from</label>
                        <select id="from" name="from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option selected></option>
                            <option value="mg">milligram</option>
                            <option value="g">gram</option>
                            <option value="kg">kilogram</option>
                            <option value="oz">ounce</option>
                            <option value="lb">pound</option>
                        </select>
                    </div>

                    <div class="my-4">
                        <label for="to" class="block mb-2 text-sm font-medium text-gray-900">Unit to convert to</label>
                        <select id="to" name="to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option selected></option>
                            <option value="mg">milligram</option>
                            <option value="g">gram</option>
                            <option value="kg">kilogram</option>
                            <option value="oz">ounce</option>
                            <option value="lb">pound</option>
                        </select>
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Convert</button>
                </form>
            </div>
        <?php endif ?>
    </div>
</body>
</html>