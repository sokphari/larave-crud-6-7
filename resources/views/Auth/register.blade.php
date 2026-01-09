<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <!-- Add Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Optional: Add custom styles for better form appearance -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        input:focus {
            outline: none;
            ring: 2px solid #3b82f6;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center p-4">
    <form action="{{ route('register.post') }}" method="post" class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 space-y-6 border border-gray-200">
        @csrf
        
        <!-- Form Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h1>
            <p class="text-gray-600">Please fill in the form to register</p>
        </div>

        <!-- Name Input -->
        <div class="space-y-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="w-full px-4 py-3.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 text-gray-800 placeholder-gray-500 text-base"
                placeholder="Enter your full name"
            >
        </div>

        <!-- Email Input -->
        <div class="space-y-2">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="w-full px-4 py-3.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 text-gray-800 placeholder-gray-500 text-base"
                placeholder="Enter your email address"
            >
        </div>

        <!-- Password Input -->
        <div class="space-y-2">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                class="w-full px-4 py-3.5 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 bg-gray-50 text-gray-800 placeholder-gray-500 text-base"
                placeholder="Create a secure password"
            >
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3.5 px-4 rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-base"
        >
            Register Now
        </button>

       
    </form>

    <!-- Optional: Add some hover effects with JavaScript -->
   
</body>
</html>