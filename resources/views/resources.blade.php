@extends('layouts.mainlayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            tr td:nth-child(1){
            white-space: nowrap;
            }
            tr td:nth-child(3){
                white-space: nowrap;
            }
            tr td:nth-child(5){
                white-space: nowrap;
            }
            tr td:nth-child(7){
                white-space: nowrap;
            }
            tr th:nth-child(6){
                white-space: nowrap;
            }
        </style>
        
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">

            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Resources</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">ANCSSC Resources Area</h1>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <table id="resources" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Uploaded By</th>
                                <th>Language</th>                             
                                <th>SDGs</th>
                                <th>Upload Date</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Save Water</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td>Garrett Winters</td>
                                <td>English</td>
                                <td>6,14</td>
                                <td>2021/11/25</td>
                                <td><u>Download Link</u></td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Well Building Guide</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td>Michael Bruce</td>
                                <td>French</td>
                                <td>3, 7, 11</td>
                                <td>2019/04/13</td>
                                <td><u>Download Link</u></td>
                            </tr>
                            <tr>
                                <td>Protect Environment</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td>Jonas Alexander</td>
                                <td>English</td>
                                <td>15</td>
                                <td>2020/03/14</td>
                                <td><u>Download Link</u></td>
                            </tr>
                            <tr>
                                <td>Eradicate Poverty</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                                <td>Cara Stevens</td>
                                <td>Arabic</td>
                                <td>1, 8</td>
                                <td>2022/02/08</td>
                                <td><u>Download Link</u></td>
                            </tr>
                        </tbody>
                        <tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Uploaded By</th>
                                <th>Language</th>                             
                                <th>SDGs</th>
                                <th>Upload Date</th>
                                <th>Download</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
            
        </main>
       
    </body>
</html>
@endsection