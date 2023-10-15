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
                            <td> <a class="btn btn-primary"  role="button">Buy</a>
                           
                        </tr>
                      @endforeach
                    </tbody>
                    </table>