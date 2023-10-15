<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Happily purchase with Us..!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div >
                        <select name="filter"  id="filter" class="form-select-color form-select-sm mb-3" aria-label="Default select example">
                            <option selected>Search as category</option>
                            <option value="all">Choose option</option>
                            @foreach($categories as $category)
                            <option value="{{$category}}">{{$category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="selector">
                @include('user.userProductView',compact('products'));
                </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('#filter').change(function(){
                let filter = $(this).val();
                $.ajax({
                    url:'/filter',
                    type:'post',
                    data:'filter='+filter+'&_token={{csrf_token()}}',
                    success:function(response){
                    $('.selector').html(response);
                    }
                    
                
                    
                });
            });
        });
    </script>
</body>
</html>
