<!-- TODO: 
1. Get filtering to work for projects table
2. After filtering is working, copy-paste projects table section and change columns + contents for reports -->
@extends('layouts.mainlayout-admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column h-100">
    <div class="container">
        <main class="flex-shrink-0">
            
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center mb-5">
                        <h1 class="fw-bolder">Analytics</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
 

                         <!-- Google Analytics -->
                        <iframe width="600" height="450" src="https://datastudio.google.com/embed/reporting/119cc50a-5f86-4cd5-a396-6c4c88105278/page/Av8pC" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <!-- Google Analytics -->
            </section>
</main>
</div>
</body>
</html>
                                
@endsection