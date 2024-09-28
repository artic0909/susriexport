<!-- <style>
    img.uploaded-images {
        width: 80px !important;
        height: 60px !important;
        margin: 4%;
        border: 1px solid black;
        border-radius: 4px !important;
        padding: 5px;
    }
</style> -->

<x-adminheader />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Top Products &nbsp;( {{$products->total()}} )</p>

                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addnewModal">
                            Add New
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="addnewModal" tabindex="-1" aria-labelledby="addnewmodalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addnewmodalLabel">Add New Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('addnewproduct') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" id="name" placeholder="Enter Product Name" class="form-control mb-2">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" id="description" placeholder="Enter Description" class="form-control mb-2">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" id="price" placeholder="Enter Price" class="form-control mb-2">
                                            <label for="image">Image</label>
                                            <input type="file" name="images[]" id="images" multiple accept="image/*" class="form-control mb-2">

                                            <label for="specification" class="form-label">Specification</label>
                                            <textarea name="specification" class="form-control" id="specification" rows="3"></textarea>

                                            <!-- <select id="size" name="size_id[]" class="selectpicker mb-3 mt-3" multiple aria-label="size 3 select example" style="width: 100%;">
                                                <option>Select Size</option>
                                                @foreach($sizesOfProducts as $size)
                                                <option value="{{ $size->id }}">{{ $size->product_size }}</option>
                                                @endforeach
                                            </select> -->

                                            <select class="form-select mb-3 mt-3" aria-label="Default select example" name="minimum_size_id" id="minimum_size_id">
                                                <option selected>Select Minumum Size</option>
                                                @foreach($sizesOfProducts as $size)
                                                <option value="{{ $size->id }}">{{ $size->product_size }}</option>
                                                @endforeach
                                            </select>

                                            <select class="form-select mb-3 mt-3" aria-label="Default select example" name="maximum_size_id" id="maximum_size_id">
                                                <option selected>Select Maximum Size</option>
                                                @foreach($sizesOfProducts as $size)
                                                <option value="{{ $size->id }}">{{ $size->product_size }}</option>
                                                @endforeach
                                            </select>

                                            <select class="form-select mb-3 mt-3" aria-label="Default select example" name="category_id" id="category_id">
                                                <option selected>Select Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>

                                            <input type="submit" name="save" id="save" class="btn btn-success rounded" value="Save Now">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped table-borderless mt-2">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Size</th>
                                        <th>Category</th>
                                        <th>Specification</th>
                                        <th>Image</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($products as $item)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>


                                        <td class="font-weight-bold">{{$item->name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td class="font-weight-bold">₹ {{$item->price}}</td>
                                        <td class="font-weight-bold">{{ optional($item->minimumSize)->product_size }} - {{ optional($item->maximumSize)->product_size }}</td>
                                        <td>{{optional($item->categoryy)->title}}</td>

                                        <!-- <td class="font-weight-medium">
                                            <div class="badge badge-success">Updated</div>
                                        </td> -->
                                        <td class="font-weight-medium">
                                            <div class="font-weight-bold tdd" style="width: 350px; overflow-x:auto;overflow-y:hidden;">{{$item->specification}}</div>
                                        </td>
                                        <td>
                                            @if(!empty($item->image))
                                            <img src="{{ asset($item->image[0]) }}" width="200px" alt="img">
                                            @endif
                                        </td>

                                        <td class="font-weight-medium">
                                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#editBtn{{$i}}">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="editBtn{{$i}}" tabindex="-1" aria-labelledby="editbtnLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editbtnLabel">Edit Your Product</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('editnewproduct')}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <label for="name">Product Name</label>
                                                                <input type="text" name="name" id="name" value="{{$item->name}}" placeholder="Enter Product Name" class="form-control mb-2">
                                                                <label for="description">Description</label>
                                                                <input type="text" name="description" id="description" value="{{$item->description}}" placeholder="Enter Description" class="form-control mb-2">
                                                                <label for="price">Price</label>
                                                                <input type="number" name="price" id="price" value="{{$item->price}}" placeholder="Enter Price" class="form-control mb-2">
                                                                <label for="image">Image</label>
                                                                <input type="file" name="images[]" id="images" multiple accept="image/*" class="form-control mb-2">

                                                                <label for="specification" class="form-label">Specification</label>
                                                                <textarea name="specification" class="form-control mb-3" id="specification" rows="3">{{$item->specification}}</textarea>

                                                                <!-- <label for="size" class="form-label">Size</label>
                                                                <select id="size" name="size_id[]" class="selectpicker mb-3 mt-3" multiple aria-label="size 3 select example" style="width: 100%;">
                                                                    @foreach($sizesOfProducts as $size)
                                                                    <option value="{{$size->id}}" {{$size->id == $item->size_id?'selected':''}}>{{$size->product_size}}</option>
                                                                    @endforeach
                                                                </select> -->

                                                                <label for="minimum_size_id" class="form-label">Select Minimum Size</label>
                                                                <select class="form-select mb-3 mt-3" aria-label="Default select example" name="minimum_size_id" id="minimum_size_id">
                                                                    @foreach($sizesOfProducts as $size)
                                                                    <option value="{{ $size->id }}" {{$size->id == $item->minimum_size_id?'selected':''}}>{{ $size->product_size }}</option>
                                                                    @endforeach
                                                                </select>

                                                                <label for="maximum_size_id" class="form-label">Select Maximun Size</label>
                                                                <select class="form-select mb-3 mt-3" aria-label="Default select example" name="maximum_size_id" id="maximum_size_id">
                                                                    @foreach($sizesOfProducts as $size)
                                                                    <option value="{{ $size->id }}" {{$size->id == $item->maximum_size_id?'selected':''}}>{{ $size->product_size }}</option>
                                                                    @endforeach
                                                                </select>


                                                                <select class="form-select mb-3" aria-label="Default select example" name="category_id" id="category_id">
                                                                    
                                                                    @foreach($categories as $category)
                                                                    <option value="{{$category->id}}" {{$category->id == $item->category_id?'selected':''}}>{{$category->title}}</option>
                                                                    @endforeach
                                                                </select>

                                                                <input type="hidden" name="id" value="{{$item->id}}" id="">
                                                                <div class="row">
                                                                    @if(!empty($item->image))
                                                                    @foreach($item->image as $image)

                                                                    <img class="uploaded-images" src="{{ asset($image) }}" width="200px" alt="img">

                                                                    @endforeach
                                                                    @endif
                                                                </div>
                                                                <input type="submit" name="save" id="save" class="btn btn-success rounded" value="Save Changes">
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{ route('delete.product', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <!-- Previous Page Link -->
                        @if ($products->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">&laquo;</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @endif

                        <!-- Pagination Elements -->
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor

                            <!-- Next Page Link -->
                            @if ($products->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <span class="page-link" aria-hidden="true">&raquo;</span>
                            </li>
                            @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->




    <x-adminfooter />