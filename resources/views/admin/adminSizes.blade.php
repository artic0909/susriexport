<x-adminheader />
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Add Sizes &nbsp;( {{$sizes->total()}} )</p>

                        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addnewModal">
                            Add New
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="addnewModal" tabindex="-1" aria-labelledby="addnewmodalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addnewmodalLabel">Add New Size</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('addNewSize')}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <label for="product_size">Size</label>
                                            <input type="text" name="product_size[]" class="form-control mb-2">

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
                                        <th>Size</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($sizes as $item)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>


                                        <td>{{$item->product_size}}</td>

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
                                                            <form action="{{route('editnewsize')}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <label for="product_size">product_size</label>
                                                                <input type="text" id="product_size" value="{{$item->product_size}}" name="product_size" class="form-control mb-2">

                                                                <input type="hidden" name="id" value="{{$item->id}}" id="">

                                                                <input type="submit" name="save" class="btn btn-success rounded" value="Save Changes">
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{route('delete.size', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>

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
                        @if ($sizes->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">&laquo;</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $sizes->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @endif

                        <!-- Pagination Elements -->
                        @for ($i = 1; $i <= $sizes->lastPage(); $i++)
                            <li class="page-item {{ $sizes->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $sizes->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor

                            <!-- Next Page Link -->
                            @if ($sizes->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $sizes->nextPageUrl() }}" aria-label="Next">
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