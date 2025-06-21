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

        <div>
            <form action="weight.php" method="post">
                <div class="my-4">
                    <label for="weight" class="block mb-2 text-sm font-medium text-gray-900">Enter the weight to convert</label>
                    <input type="text" id="weight" name="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>

                <div class="my-4">
                    <label for="from" class="block mb-2 text-sm font-medium text-gray-900">Unit to convert from</label>
                    <select id="from" name="from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option selected></option>
                        <option value="mg">milligram</option>
                        <option value="g">gram</option>
                        <option value="kg">kilogram</option>
                        <option value="km">kilometer</option>
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
                        <option value="km">kilometer</option>
                        <option value="oz">ounce</option>
                        <option value="lb">pound</option>
                    </select>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Convert</button>
            </form>
        </div>
    </div>
</body>
</html>