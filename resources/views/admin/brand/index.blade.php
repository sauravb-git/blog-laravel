<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

          All Brand  <b> </b>

        </h2>
    </x-slot>

            <div class="py-12">
             <div class="container">
                 <div class="row">
                     <div class="col-md-8">
                 <div class="card">

                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif

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








     {{-- Trashed area --}}


    {{-- <div class="row">
      <div class="col-md-8">
  <div class="card">



      <div class="card-header">Trash List</div>
      <table class="table">
         <thead>
           <tr>
             <th scope="col">SL No</th>
             <th scope="col">Category Name</th>
             <th scope="col">User</th>
             <th scope="col">Created At</th>
             <th scope="col">Action</th>
           </tr>
         </thead>
         <tbody>


       @foreach ($trachCat as $category)

           <tr>
             <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
             <td>{{ $category->category_name }}</td>
             <td>{{ $category->user->name }}</td>

             <td>
               @if ( $category->created_at == NULL)
               <span class="text-danger" >Don't Date Set</span>
                @else
                {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
               @endif
             </td>
             <td>
               <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-primary">Restore</a>
               <a href="{{ url('category/pdelete/'.$category->id) }}" class="btn btn-danger">P Delete</a>
             </td>

           </tr>
       @endforeach


         </tbody>
       </table>


       {{  $categories->links() }}
  </div>
</div>

</div>






 --}}





</div>

</div>
</x-app-layout>
