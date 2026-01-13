@extends('admin.layouts.theme')

@section('body')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Products List</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Products</li>
                <li>-</li>
                <li class="fw-medium">Create</li>
            </ul>
        </div>

        <div class="card basic-data-table">
            <div class="card-header">
                <h5 class="card-title mb-0">All Products</h5>
            </div>
            {{-- name
            description
            price
            cost
            stock_quantity
            is_active
            category_id --}}
            <div class="row gy-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.products.store') }}" method="post">
                                @csrf

                                <div class="row gy-3">
                                    <div class="col-12">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Product Name" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <input type="text" name="description" class="form-control"
                                            placeholder="Enter Description" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control"
                                            placeholder="Enter Price" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Cost</label>
                                        <input type="number" name="cost" class="form-control"
                                            placeholder="Enter Cost" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Stock Quantity</label>
                                        <input type="number" name="stock_quantity" class="form-control"
                                            placeholder="Enter Stock Quantity" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Is Active</label>
                                        <select name="is_active" class="form-select">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Category</label>
                                        <select name="category_id" class="form-select">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary-600">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
