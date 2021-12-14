<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

          Edit Category <b> </b>
          
        </h2>
    </x-slot>

            <div class="py-12"> 
             <div class="container">
                 <div class="row">
                      

 
             {{-- add category area  --}}
             <div class="col-md-8"> 
                <div class="card">

                  
                    <div class="card-header">All Category </div>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                {{-- ater maddome token genrate hoi  --}}
                                @csrf
                                <div class="form-group ">
                                    <label for="cateId">Update Category Name</label>
                                    <input type="text" class="form-control m-1"
                                    name="category_name" id="cateId" value="{{ $categories->category_name }}" />

                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror  
                                </div>
                                <button class="btn btn-primary m-1" >Update Categoty</button>
                            </form>


                        </div>      
                   </div> 
              </div>
         </div> 
    </div>
     
</div>  
</x-app-layout>
