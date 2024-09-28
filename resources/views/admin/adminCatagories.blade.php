<x-adminheader />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Add Categories &nbsp;( {{$categories->total()}} )</p>

                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addnewModal">
                            Add New
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="addnewModal" tabindex="-1" aria-labelledby="addnewmodalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addnewmodalLabel">Add New Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('addNewCategory')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="title">Title</label>
                                            <input type="text" name="title" placeholder="Enter the title" class="form-control mb-2">
                                            <label for="image">Image</label>
                                            <input type="file" name="images[]" multiple accept="image/*" class="form-control mb-2">

                                            <input type="submit" name="save" class="btn btn-success rounded" value="Save Now">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-borderless mt-2">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Updated-at</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($categories as $item)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td class="font-weight-bold">{{$item->title}}</td>
                                        <td>
                                            @if(!empty($item->image))
                                            <img src="{{ asset($item->image[0]) }}" width="200px" alt="img">
                                            @endif
                                        </td>

                                        <td>{{$item->updated_at}}</td>

                                        <td class="font-weight-medium">
                                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#editBtn{{$i}}">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="editBtn{{$i}}" tabindex="-1" aria-labelledby="editbtnLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editbtnLabel">Edit Your Category</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action={{route('editnewcategory')}} method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <label for="title">Title</label>
                                                                <input type="text" name="title" value="{{$item->title}}" placeholder="Enter Product Name" class="form-control mb-2">
                                                                <label for="image">Image</label>
                                                                <input type="file" name="images[]" multiple accept="image/*" class="form-control mb-2">

                                                                <input type="hidden" name="id" value="{{$item->id}}" id="">
                                                                <div class="row">
                                                                    @if(!empty($item->image))
                                                                    @foreach($item->image as $image)

                                                                    <img class="uploaded-images" src="{{ asset($image) }}" width="200px" alt="img">

                                                                    @endforeach
                                                                    @endif
                                                                </div>
                                                                <input type="submit" name="save" class="btn btn-success rounded" value="Save Changes">
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{ route('delete.category.with.products', ['category' => $item]) }}" class="btn btn-danger">Delete</a>

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
                        @if ($categories->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">&laquo;</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $categories->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @endif

                        <!-- Pagination Elements -->
                        @for ($i = 1; $i <= $categories->lastPage(); $i++)
                            <li class="page-item {{ $categories->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor

                            <!-- Next Page Link -->
                            @if ($categories->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $categories->nextPageUrl() }}" aria-label="Next">
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