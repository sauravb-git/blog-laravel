<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

          Multiple Images  <b> </b>

        </h2>
    </x-slot>

            <div class="py-12">
             <div class="container">
                 <div class="row">
                     <div class="col-md-8">

                        <div class="card-group">
                            @foreach ($images as $multi)
                            <div class="col-md-4 mt-5">
                                <div class="card">
                                    <img src="{{ asset($multi->image) }}"  alt=""/>
                                </div>
                            </div>
                            @endforeach

                        </div>

                     </div>



             {{-- add category area  --}}
             <div class="col-md-4">
                <div class="card">

                    @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif


                    <div class="card-header">Multiple Images </div>
                        <div class="card-body">
                            <form action="{{ route('store.image') }}" method="POST"
                            enctype="multipart/form-data">

                                {{-- ater maddome token genrate hoi  --}}

                                @csrf

                                <div class="form-group ">
                                    <label for="formFileMultiples">Multiple Image </label>
                                    <input class="form-control" name="image[]" type="file"
                                     id="formFileMultiples" multiple="" >

                                    @error('image')
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
</x-app-layout>
