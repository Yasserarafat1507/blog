<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
    background: url(https://i.pinimg.com/564x/2f/33/71/2f337177bd046a050deabeb6defbe4b0.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center
}
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <title>Blog</title>
</head>


<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">BLOG</span>
            </a>
        </div>
    </nav>
    <div class="container mx-auto p-auto text-center mt-4">
        <a href="{{ route('blog.create') }}" type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add Blog
        </a>


        <div class="flex flex-wrap justify-center mt-4">
            <!-- Card 1 -->
            @forelse($blog as $b)
                   
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-4">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ Storage::url($b->image) }}" alt="" />


                </a>
                <div class="p-5">


                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $b->title }}</h5>


                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $b->discripstion }}</p>
                    <a href="{{ route('blog.show',$b->id) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                    <!-- Tombol Edit -->
                    <a href="{{ route('blog.edit', $b->id) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600 mt-2">
                        Edit
                        <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 16 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 12h8M2 10V4a2 2 0 0 1 2-2h4l4 4v4a2 2 0 0 1-2 2h-4L2 10Z" />
                        </svg>
                    </a>
                    <!-- Tombol Delete -->
                    <form action="{{ route('blog.destroy', $b->id) }}" method="POST" class="inline-block mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Delete
                            <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 16 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M2 2l12 12M2 14l12-12" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <p class="text-5xl"> Data Tidak tersedia</p>
            @endforelse ($blog as $b)
     
        </div>
    </div>


</body>


</html>
