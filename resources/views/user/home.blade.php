@extends('layouts.mainlayout-logged-in')


@section('content')
<div class="container">
    <br><br><br>
 <!-- Welcome Message -->
     <section class="bg-light py-5">
         <div class="container px-5 my-5">
        <div class="text-center mb-5">
      <h1 class="fw-bolder">Welcome <?php echo Auth::user()->name ?>!</h1>
      <p class="lead fw-normal text-muted mb-0"></p>
     </div>
    <div class="ro
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
         
                <div class="card-body">
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <div class="d-grid">
                            <a class="btn btn-primary" href="user-profile">Edit my profile</a>
                        </div>
                    </div>
                <br>

                         <div class="Welcome" role="alert">
                        </div>
              
                    

                        </div>
                    
                        <div class="col-md-15 text-centre">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

