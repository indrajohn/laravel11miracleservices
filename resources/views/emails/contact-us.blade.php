<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Us Message</title>
    <style>
        /* Import Tailwind CSS */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css');
        /* Import Montserrat Font */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body class="bg-gray-800">
    <div class="container mx-auto max-w-lg bg-white shadow-md p-6 mt-10">
        <div class="header bg-blue-500 text-white text-center p-4 rounded-t">
            <h2 class="text-2xl font-bold">Contact Us Message</h2>
        </div>
        <div class="content p-6">
            <p class="text-lg">Dear Admin,</p>
            <p class="text-lg">We have received a new submission through the Contact Us form on our website. Here are the details:</p>
            <p class="text-lg"><span class="font-bold">Name:</span> {{ $data['firstname'] }}</p>
            <p class="text-lg"><span class="font-bold">Email:</span> {{ $data['email'] }}</p>
            <p class="text-lg"><span class="font-bold">Phone Number:</span> {{ $data['phone'] }}</p>
            <p class="text-lg"><span class="font-bold">Subject:</span> {{ $data['subject'] }}</p>
            <p class="text-lg"><span class="font-bold">Message:</span><br> {{ $data['message'] }}</p>
        </div>
        <div class="footer text-center p-4 text-gray-600">
            <p>&copy; 2024 GBIMSSYDNEY. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
