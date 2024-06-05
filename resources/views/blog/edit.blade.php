
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir dengan Flowbite</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
</head>
<body class="font-sans antialiased">


    <div class="container mx-auto p-8">
        <form  action="{{ route('blog.update' , $blog->id)}}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
            <!-- Input Gambar -->
            @csrf
            @method('put')
            <div>
                <label for="image" class="block text-gray-700 ">Gambar</label>
                <input type="file" id="image" name="image" value="{{ $blog->image }}" class="block  w-full mt-1" requireds>
            </div>


            <!-- Input Judul -->
            <div>
                <label for="title" class="block text-gray-700">Judul</label>
                <input type="text" id="title" name="title" value="{{ $blog->title }}" class="block w-full mt-1" required>
            </div>


            <!-- Input Deskripsi -->
            <div>
                <label for="discripstion" class="block text-gray-700">Deskripsi</label>
                <textarea id="discripstion" name="discripstion" class="block w-full mt-1">{{ $blog->discripstion }}</textarea>
            </div>


            <!-- Input Konten -->
            <div>
                <label for="content" class="block text-gray-700">Konten</label>
                <textarea id="content" name="content" class="block w-full mt-1">{{ $blog->content }}</textarea>
            </div>


            <!-- Tombol Submit -->
            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add</button>
            </div>
        </form>
    </div>


</body>
</html>
