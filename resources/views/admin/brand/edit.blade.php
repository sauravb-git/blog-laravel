<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

          Edit Brand <b> </b>

        </h2>
    </x-slot>

            <div class="py-12">
             <div class="container">
                 <div class="row">



             {{-- add category area  --}}
             <div class="col-md-8">
                <div class="card">
                    @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif


                    <div class="card-header">All Brand </div>
                        <div class="card-body">
                            <form action="{{ url('brand/update/'.$brands->id) }}"
                                method="POST" enctype="multipart/form-data">
                                {{-- ater maddome token genrate hoi  --}}
                                @csrf
                                <input type="hidden" name="old_image"
                                value="{{ $brands->brand_image }}" />
                                <div class="form-group ">
                                    <label for="cateId">Update Brand Name</label>
                                    <input type="text" class="form-control m-1"
                                    name="brand_name" id="cateId" value="{{ $brands->brand_name }}" />

                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group ">
                                    <label for="cateIds">Update Brand Image </label>
                                    <input type="file" class="form-control m-1"
                                    name="brand_image" id="cateIds" value="{{ $brands->brand_image }}" />

                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            <div class="form-group">
                                <img src="{{ asset($brands->brand_image) }}"
                                style="height: 100px; width:100px; "
                                alt="" />
                            </div>
                                <button class="btn btn-primary m-1" >Update Brand</button>
                            </form>


                        </div>
                   </div>
              </div>
         </div>
    </div>

</div>
</x-app-layout>
