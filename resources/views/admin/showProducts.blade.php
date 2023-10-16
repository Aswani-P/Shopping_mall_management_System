<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('view product Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <a class="btn btn-dark" href="" role="button">EXPORT</a>
                <a class="btn btn-dark" href="{{route('product_list')}}" role="button">Douwnload as PDF</a>
                <x-auth-session-status class="mb-4" :status="session('message')" />
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SI.NO</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Option</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                     
                        @foreach($products as $product)
                        
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->option}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('productForm',$product->id)}}" role="button">Add Products</a>
                                 <a class="btn btn-primary" href="{{route('adminEdit',$product->id)}}" role="button">Edit Products</a>
                                <a class="btn btn-danger" href="{{route('delete',$product->id)}}"  role="button">Delete</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
</html>
