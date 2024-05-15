<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkShare</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">LinkShare</h1>
            <div>
                <a href="#" class="text-blue-500 hover:text-blue-600 mr-4">Home</a>
                <a href="#" class="text-blue-500 hover:text-blue-600 mr-4">Profile</a>
                <a href="#" class="text-red-500 hover:text-red-600">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Share Your Links</h2>

        <!-- Link Form -->
        <form action="#" method="POST" class="mb-6">
            <div class="flex flex-col md:flex-row md:space-x-4">
                <input type="text" placeholder="Enter URL" class="w-full md:w-2/3 px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500">
                <button type="submit" class="w-full md:w-auto px-4 py-3 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add Link</button>
            </div>
        </form>

        <!-- Links List -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Sample Link Item -->
            <div class="bg-white rounded-lg border border-gray-300 p-4">
                <h3 class="text-lg font-semibold text-gray-800">Link Title</h3>
                <p class="text-gray-600 mb-2">https://example.com</p>
                <div class="flex items-center justify-between">
                    <a href="#" class="text-blue-500 hover:text-blue-600">Edit</a>
                    <button class="text-red-500 hover:text-red-600">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; 2024 LinkShare. All rights reserved.
    </footer>
</body>

</html>



