@extends('admin.admin_master')

@section('admin')




<div class="col-lg-12">
    <div class="card card-default">


        <div class="card-header card-header-border-bottom">
            <h2>Create  Contact</h2>
        </div>
        <div class="card-body">
            <form
            action="{{ url('update/contact/'.$contacts->id) }}"
            method="POST"    enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Address</label>
                    <input type="name" name="address" class="form-control"
                     id="exampleFormControlInput1" placeholder="Slider Title"
                     value={{ $contacts->address }} >
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Email</label>
                    <input type="name" name="email" class="form-control"
                     id="exampleFormControlInput1" placeholder="Slider Title"
                     value={{ $contacts->email }} >
                </div>


                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Phone</label>
                    <input type="name" name="phone" class="form-control"
                     id="exampleFormControlInput1" placeholder="Slider Title"
                     value={{ $contacts->phone }} >
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
