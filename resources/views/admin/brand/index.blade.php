@extends('admin.admin_master')

@section('admin')

            <div class="py-12">
             <div class="container">
                 <div class="row">
                     <div class="col-md-8">
                 <div class="card">

                   

                     <div class="card-header">All Brand </div>
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">User</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                      {{-- @php($i = 1)  --}}

                      @foreach ($brands as $brand)

                          <tr>
                            <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                            <td>{{ $brand->brand_name }}</td>
                            <td> <img src="{{ asset($brand->brand_image) }}"
                                style="height: 100px; width:100px; "
                                alt="" /> </td>

                            <td>
                              @if ( $brand->created_at == NULL)
                              <span class="text-danger" >Don't Date Set</span>
                               @else
                               {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                              @endif
                            </td>
                            <td>
                              <a href="{{ url('brand/edit/'.$brand->id) }}"
                                class="btn btn-primary">Edit</a>
                              <a href="{{ url('brand/delete/'.$brand->id) }}"
                                class="btn btn-danger">Delete</a>
                            </td>

                          </tr>
                      @endforeach


                        </tbody>
                      </table>


                      {{  $brands->links() }}
                 </div>
             </div>



             {{-- add category area  --}}
             <div class="col-md-4">
                <div class="card">


                    <div class="card-header">All Brand </div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST"
                            enctype="multipart/form-data">
                                {{-- ater maddome token genrate hoi  --}}
                                @csrf
                                <div class="form-group ">
                                    <label for="cateId">Brand Add</label>
                                     <input type="text" class="form-control m-1"
                                    name="brand_name" id="cateId" />

                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <label for="formFileMultiple">Brand Image </label>
                                    <input class="form-control" name="brand_image" type="file"
                                     id="formFileMultiple" >

                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary m-1" >Add Brand</button>
                            </form>


                        </div>
                   </div>
              </div>
         </div>




</div>

</div>

@endsection
