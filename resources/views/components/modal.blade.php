<a data-bs-toggle="modal" data-bs-target="#exampleModalMessage" class="btn btn-vancis btn-sm myCustomButton">Add New<div class="ripple-container"></div></a>
<!-- <button type="button" class="btn bg-gradient-dark btn-vancis mb-3" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">Add New</button>                          -->
<div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessage" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
    <div class="modal-body p-0">
        <div class="card card-plain">
        <div class="card-header pb-0 text-center">
            <h5 class="">{{ $title }}</h5>
            <p class="mb-0"></p>
        </div>
        <div class="card-body">
            <form role="form text-left" autocomplete="off"  method="POST" action="{{ $action }}" enctype="multipart/form-data">
            @csrf    
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
            </div>
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Amount</label>
                <input type="number" name="total" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
            </div>
            <div class="input-group input-group-outline my-3">                
                <input type="file" name="dubaiPath" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
            </div>                
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />                                    
            <div class="text-center">
            <button type="submit" class="btn btn-round bg-gradient-dark btn-vancis w-100 mt-4 mb-0">Save</button>
            </div>
            </form>                                    
        </div>                                
        </div>
    </div>
    </div>
</div>
</div>