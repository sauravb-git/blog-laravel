@extends('admin.admin_master')

@section('admin')




<div class="col-lg-12">
    <div class="card card-default">

      


        <div class="card-header card-header-border-bottom">
            <h2>Create Slider</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.slider') }}" method="POST"    enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="name" name="title" class="form-control"
                     id="exampleFormControlInput1" placeholder="Slider Title">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" name="description"
                    id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input name="image" type="file" class="form-control-file"
                     id="exampleFormControlFile1">
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>

            </form>
        </div>
    </div>




</div>




@endsection
